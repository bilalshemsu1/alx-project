<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MedicinesController extends Controller
{
    public function index(Request $request)
    {
        $userId = (int) session()->get('auth_user_id');
        if (! $userId) {
            return redirect()->to('/login');
        }

        $patient = User::query()->findOrFail($userId);
        $now = Carbon::now();
        $today = $now->toDateString();

        $patientMedicines = $patient->patientMedicines()
            ->where(function ($q) use ($now) {
                $q->whereNull('start_date')->orWhere('start_date', '<=', $now->toDateString());
            })
            ->where(function ($q) use ($now) {
                $q->whereNull('end_date')->orWhere('end_date', '>=', $now->toDateString());
            })
            ->with(['medicine', 'instructions'])
            ->orderBy('time_to_take', 'asc')
            ->get();

        $scheduledDoses = $patientMedicines
            ->filter(fn ($pm) => !empty($pm->time_to_take))
            ->map(function ($pm) use ($patient, $today) {
                $scheduledAt = Carbon::parse($today.' '.$pm->time_to_take->format('H:i:s'));

                return [
                    'patient_id' => $patient->id,
                    'patient_medicine_id' => $pm->id,
                    'scheduled_at' => $scheduledAt,
                    'dosage' => $pm->dosage,
                    'before_after_food' => $pm->before_after_food,
                    'medicine_id' => $pm->medicine_id,
                    'medicine_name' => $pm->medicine?->name,
                    'medicine_description' => $pm->medicine?->description,
                    'time_to_take' => $pm->time_to_take,
                    'instructions' => $pm->instructions,
                    'patient_medicine' => $pm,
                ];
            })
            ->values();

        $doseIds = [];
        $doses = collect();

        foreach ($scheduledDoses as $sd) {
            $dose = \App\Models\PatientMedicineDose::query()->firstOrCreate(
                [
                    'patient_id' => $sd['patient_id'],
                    'patient_medicine_id' => $sd['patient_medicine_id'],
                    'scheduled_at' => $sd['scheduled_at'],
                ],
                [
                    'status' => 'pending',
                ]
            );
            $doses->push($dose);
            $doseIds[] = $dose->id;
        }

        $doses->each(function ($dose) use ($now) {
            if ($dose->status === 'pending' && $dose->scheduled_at->lt($now)) {
                $dose->status = 'missed';
                $dose->save();
            }
        });

        $compliance = $doses->count() ? ($doses->whereIn('status', ['on_time', 'late'])->count() / $doses->count()) * 100 : 0;

        $alerts = $doses
            ->filter(function ($dose) use ($now) {
                if ($dose->status !== 'missed') return false;
                return $dose->scheduled_at->diffInHours($now) >= 2;
            })
            ->sortByDesc('scheduled_at')
            ->values();

        $upcoming = $doses
            ->whereIn('status', ['pending'])
            ->sortBy('scheduled_at')
            ->values();

        $upcomingNext = $upcoming->first();

        $dosesTodayTable = $doses
            ->sortBy('scheduled_at')
            ->values();

        $nextDoseCountdownSeconds = null;
        if ($upcomingNext) {
            $diff = $upcomingNext->scheduled_at->diffInSeconds($now, false);
            $nextDoseCountdownSeconds = max(0, $diff);
        }

        $doctorInstructions = $patientMedicines
            ->pluck('instructions')
            ->flatten()
            ->filter()
            ->unique('id')
            ->values();

        return view('user.medications', [
            'patient' => $patient,
            'now' => $now,
            'patientMedicines' => $patientMedicines,
            'doses' => $doses,
            'alerts' => $alerts,
            'upcoming' => $upcoming,
            'dosesTodayTable' => $dosesTodayTable,
            'doctorInstructions' => $doctorInstructions,
            'compliancePct' => (int) round($compliance),
            'nextDoseCountdownSeconds' => $nextDoseCountdownSeconds,
        ]);
    }

    public function takeDose(Request $request, \App\Models\PatientMedicineDose $dose)
    {
        $userId = (int) session()->get('auth_user_id');
        if (! $userId) {
            return redirect()->to('/login');
        }

        $patient = User::query()->findOrFail($userId);

        if ((int) $dose->patient_id !== (int) $patient->id) {
            return response()->json(['message' => 'Forbidden'], 403);
        }

        $now = Carbon::now();

        if ($dose->taken_at) {
            return response()->json(['ok' => true, 'status' => $dose->status]);
        }

        $dose->taken_at = $now;

        $minutesLate = $dose->scheduled_at->diffInMinutes($now, false);
        if ($minutesLate <= 35 && $now->gte($dose->scheduled_at)) {
            $dose->status = 'on_time';
        } elseif ($now->lt($dose->scheduled_at)) {
            $dose->status = 'on_time';
        } else {
            $dose->status = 'late';
        }

        $dose->save();

        return response()->json([
            'ok' => true,
            'dose_id' => $dose->id,
            'status' => $dose->status,
            'taken_at' => $dose->taken_at?->toISOString(),
        ]);
    }
}
