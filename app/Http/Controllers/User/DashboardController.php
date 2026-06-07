<?php

namespace App\Http\Controllers\User;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Carbon;


class DashboardController
{
    public function index(Request $request)
    {
        $userId = (int) session()->get('auth_user_id');
        if (! $userId) {
            return redirect()->to('/login');
        }

        /** @var User $patient */
        $patient = User::query()->findOrFail($userId);

        $now = Carbon::now();

        $doneStatusValues = ['completed', 'done', 'finished'];

        $baseTasks = Task::query()->where('patient_id', $patient->id);

        $tasksToday = (clone $now)->startOfDay();
        $tasksTomorrow = (clone $now)->endOfDay();

        $doneTasksTodayQuery = (clone $baseTasks)
            ->whereBetween('due_datetime', [$tasksToday, $tasksTomorrow])
            ->where(function ($q) use ($doneStatusValues) {
                $q->whereIn('status', $doneStatusValues)
                    ->orWhereNotNull('completed_at');
            });

        $doneTasksTodayCount = (clone $doneTasksTodayQuery)->count();

        $lateTasksTodayCount = (clone $doneTasksTodayQuery)
            ->whereNotNull('completed_at')
            ->whereRaw("completed_at > date(due_datetime) || completed_at > datetime(due_datetime, '+30 minutes')")
            ->count();



        $missedTasksTodayCount = (clone $baseTasks)
            ->whereBetween('due_datetime', [$tasksToday, $tasksTomorrow])
            ->where('due_datetime', '<', $now)
            ->where(function ($q) use ($doneStatusValues) {
                $q->whereNotIn('status', $doneStatusValues)
                    ->whereNull('completed_at');
            })
            ->count();

        $taskItems = (clone $baseTasks)
            ->whereBetween('due_datetime', [$tasksToday, $tasksTomorrow])
            ->orderBy('due_datetime', 'asc')
            ->limit(4)
            ->get(['id', 'title', 'due_datetime', 'status', 'completed_at']);

        $patientMedicinesDueTodayQuery = $patient
            ->patientMedicines()
            ->where(function ($q) use ($now) {
                $q->whereNull('start_date')
                    ->orWhere('start_date', '<=', $now->toDateString());
            })
            ->where(function ($q) use ($now) {
                $q->whereNull('end_date')
                    ->orWhere('end_date', '>=', $now->toDateString());
            });

        $patientMedicineDueTodayCount = (clone $patientMedicinesDueTodayQuery)->count();

        $medicineItems = (clone $patientMedicinesDueTodayQuery)
            ->with('medicine')
            ->orderBy('time_to_take', 'asc')
            ->limit(3)
            ->get(['id', 'medicine_id', 'time_to_take', 'before_after_food', 'start_date', 'end_date']);

        $nextAppointment = $patient
            ->appointmentsAsPatient()
            ->where('status', 'upcoming')
            ->where('appointment_date', '>=', $now)
            ->orderBy('appointment_date', 'asc')
            ->with('doctor')
            ->first();

        $alerts = $patient
            ->systemAlerts()
            ->orderByDesc('created_at')
            ->limit(3)
            ->get(['type', 'message']);

        $mealPlanItems = $patient
            ->mealPlans()
            ->where('day', $now->toDateString())
            ->orderBy('meal_time', 'asc')
            ->get(['meal_time', 'description']);

        return view('user.dashboard', [
            'patient' => $patient,
            'stats' => [
                'tasks_done_today' => $doneTasksTodayCount,
                'tasks_missed_today' => $missedTasksTodayCount,
                'tasks_late_today' => $lateTasksTodayCount,
                'medicines_due_today' => $patientMedicineDueTodayCount,
                'alerts_count' => $alerts->count(),
            ],
            'taskItems' => $taskItems,
            'medicineItems' => $medicineItems,
            'mealPlanItems' => $mealPlanItems,
            'nextAppointment' => $nextAppointment,
            'alerts' => $alerts,
            'now' => $now,
        ]);

    }
}

