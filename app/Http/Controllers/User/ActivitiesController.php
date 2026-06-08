<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\ActivityLog;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ActivitiesController extends Controller
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

        $activities = Activity::query()
            ->where('patient_id', $patient->id)
            ->where('status', 'active')
            ->orderBy('scheduled_time', 'asc')
            ->get();

        $todayLogs = ActivityLog::query()
            ->where('patient_id', $patient->id)
            ->where('date', $today)
            ->get()
            ->keyBy('activity_id');

        $todayItems = $activities->map(function ($activity) use ($todayLogs) {
            $log = $todayLogs->get($activity->id);

            return [
                'activity' => $activity,
                'log' => $log,
                'status' => $log?->status ?? 'pending',
            ];
        });

        $completedCount = $todayItems->where('status', 'completed')->count();
        $missedCount = $todayItems->where('status', 'missed')->count();
        $pendingCount = $todayItems->where('status', 'pending')->count();
        $proofsCount = $todayItems->filter(function ($item) {
            return $item['status'] === 'completed' && $item['log']?->proof_image;
        })->count();
        $totalCount = $todayItems->count();
        $consistency = $totalCount > 0 ? (int) round(($completedCount / $totalCount) * 100) : 0;

        $needsProofWarning = $todayItems->filter(function ($item) use ($now) {
            return $item['activity']->proof_required
                && $item['status'] === 'pending'
                && $item['activity']->scheduled_time
                && Carbon::parse($item['activity']->scheduled_time)->lt($now);
        });

        $weekLogs = ActivityLog::query()
            ->where('patient_id', $patient->id)
            ->where('date', '>=', $now->copy()->subDays(6)->toDateString())
            ->where('date', '<=', $today)
            ->get()
            ->groupBy('date');

        $weekDays = [];
        for ($i = 6; $i >= 0; $i--) {
            $date = $now->copy()->subDays($i);
            $dateStr = $date->toDateString();
            $dayLogs = $weekLogs->get($dateStr) ?? collect();
            $dayCompleted = $dayLogs->where('status', 'completed')->count();
            $dayMissed = $dayLogs->where('status', 'missed')->count();
            $dayProofs = $dayLogs->filter(function ($log) {
                return $log->status === 'completed' && $log->proof_image;
            })->count();
            $dayTotal = $dayLogs->count();

            $dayStatus = 'pending';
            if ($dayTotal > 0) {
                if ($dayCompleted === $dayTotal) {
                    $dayStatus = 'good';
                } elseif ($dayCompleted >= ($dayTotal / 2)) {
                    $dayStatus = 'average';
                } else {
                    $dayStatus = 'poor';
                }
            }

            $weekDays[] = [
                'date' => $dateStr,
                'day_name' => $date->format('l'),
                'is_today' => $dateStr === $today,
                'completed' => $dayCompleted,
                'missed' => $dayMissed,
                'proofs' => $dayProofs,
                'total' => $dayTotal,
                'status' => $dayStatus,
            ];
        }

        $currentStreak = $this->calculateStreak($patient->id, $today);

        return view('user.activities', [
            'patient' => $patient,
            'todayItems' => $todayItems,
            'needsProofWarning' => $needsProofWarning,
            'weekDays' => $weekDays,
            'stats' => [
                'completed' => $completedCount,
                'missed' => $missedCount,
                'pending' => $pendingCount,
                'proofs' => $proofsCount,
                'total' => $totalCount,
                'consistency' => $consistency,
                'current_streak' => $currentStreak,
            ],
            'now' => $now,
            'today' => $today,
        ]);
    }

    public function complete(Request $request, Activity $activity)
    {
        $userId = (int) session()->get('auth_user_id');
        if (! $userId) {
            return response()->json(['message' => 'Unauthenticated'], 401);
        }

        $patient = User::query()->findOrFail($userId);

        if ((int) $activity->patient_id !== (int) $patient->id) {
            return response()->json(['message' => 'Forbidden'], 403);
        }

        $validated = $request->validate([
            'status' => ['required', 'string', 'in:completed,missed'],
            'proof_image' => ['nullable', 'image', 'max:5120'],
        ]);

        $log = ActivityLog::updateOrCreate(
            [
                'patient_id' => $patient->id,
                'activity_id' => $activity->id,
                'date' => Carbon::now()->toDateString(),
            ],
            [
                'status' => $validated['status'],
            ]
        );

        if ($validated['status'] === 'completed') {
            $log->completed_at = Carbon::now();

            if ($request->hasFile('proof_image')) {
                $path = $request->file('proof_image')->store('activity_proofs', 'public');
                $log->proof_image = $path;
            }
        }

        $log->save();

        return response()->json([
            'ok' => true,
            'status' => $log->status,
        ]);
    }

    protected function calculateStreak(int $patientId, string $today): int
    {
        $streak = 0;
        $date = Carbon::parse($today);

        for ($i = 0; $i < 365; $i++) {
            $dateStr = $date->toDateString();
            $logs = ActivityLog::query()
                ->where('patient_id', $patientId)
                ->where('date', $dateStr)
                ->get();

            if ($logs->isEmpty()) {
                break;
            }

            $allCompleted = $logs->every(function ($log) {
                return $log->status === 'completed';
            });

            if (! $allCompleted) {
                break;
            }

            $streak++;
            $date->subDay();
        }

        return $streak;
    }
}
