<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleGate
{
    /**
     * Handle an incoming request.
     *
     * Usage:
     *   ->middleware('role:admin')
     *   ->middleware('role:doctor')
     *   ->middleware('role:patient')
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        $userRole = session()->get('auth_user_role');
        $userId = session()->get('auth_user_id');

        if (! $userId) {
            return redirect()->to('/login');
        }

        // Safety: only allow exact match of expected role.
        if ((string) $userRole !== (string) $role) {
            // Keep it understandable: send them to their own dashboard.
            return match ((string) $userRole) {
                'admin' => redirect()->to('/admin/dashboard'),
                'doctor' => redirect()->to('/doctor/dashboard'),
                default => redirect()->to('/dashboard'),
            };
        }

        return $next($request);
    }
}

