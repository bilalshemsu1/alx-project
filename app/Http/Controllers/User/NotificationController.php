<?php

namespace App\Http\Controllers\User;

use App\Models\SystemAlert;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;

class NotificationController
{
    public function index(Request $request)
    {
        $userId = (int) session()->get('auth_user_id');
        if (! $userId) {
            return response()->json(['message' => 'Unauthenticated.'], 401);
        }

        $unreadCount = SystemAlert::query()
            ->where('user_id', $userId)
            ->whereNull('read_at')
            ->count();

        $alerts = SystemAlert::query()
            ->where('user_id', $userId)
            ->orderByDesc('created_at')
            ->limit(25)
            ->get(['id', 'type', 'message', 'created_at', 'read_at'])
            ->map(function (SystemAlert $a) {
                return [
                    'id' => $a->id,
                    'type' => $a->type,
                    'message' => $a->message,
                    'created_at' => optional($a->created_at)->toISOString(),
                    'read_at' => optional($a->read_at)->toISOString(),
                ];
            });

        return response()->json([
            'alerts_count_unread' => $unreadCount,
            'alerts' => $alerts,
        ]);
    }

    public function markAllRead(Request $request)
    {
        $userId = (int) session()->get('auth_user_id');
        if (! $userId) {
            return response()->json(['message' => 'Unauthenticated.'], 401);
        }

        Validator::make($request->all(), [])->validate();

        SystemAlert::query()
            ->where('user_id', $userId)
            ->whereNull('read_at')
            ->update(['read_at' => Carbon::now()]);

        return response()->json(['ok' => true]);
    }
}

