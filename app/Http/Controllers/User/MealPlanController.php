<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\MealPlan;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MealPlanController extends Controller
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
        $todayDayName = strtolower($now->format('l'));

        $todayMeals = $patient
            ->mealPlans()
            ->where(function ($q) use ($today, $todayDayName) {
                $q->where('day', $today)->orWhere('day', $todayDayName);
            })
            ->orderBy('meal_time', 'asc')
            ->get();

        $weekMeals = $patient
            ->mealPlans()
            ->orderBy('day', 'asc')
            ->orderBy('meal_time', 'asc')
            ->get()
            ->groupBy('day');

        $completedCount = $todayMeals->where('status', 'completed')->count();
        $skippedCount = $todayMeals->where('status', 'skipped')->count();
        $totalCount = $todayMeals->count();
        $adherence = $totalCount > 0 ? (int) round(($completedCount / $totalCount) * 100) : 0;

        return view('user.meal-plan', [
            'patient' => $patient,
            'todayMeals' => $todayMeals,
            'weekMeals' => $weekMeals,
            'stats' => [
                'completed' => $completedCount,
                'skipped' => $skippedCount,
                'total' => $totalCount,
                'adherence' => $adherence,
            ],
            'now' => $now,
            'today' => $today,
            'todayDayName' => $todayDayName,
        ]);
    }

    public function takeMeal(Request $request, MealPlan $mealPlan)
    {
        $userId = (int) session()->get('auth_user_id');
        if (! $userId) {
            return response()->json(['message' => 'Unauthenticated'], 401);
        }

        $patient = User::query()->findOrFail($userId);

        if ((int) $mealPlan->patient_id !== (int) $patient->id) {
            return response()->json(['message' => 'Forbidden'], 403);
        }

        $validated = $request->validate([
            'status' => ['required', 'string', 'in:completed,skipped'],
        ]);

        $mealPlan->status = $validated['status'];
        $mealPlan->save();

        return response()->json([
            'ok' => true,
            'status' => $mealPlan->status,
        ]);
    }
}
