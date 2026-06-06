<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController
{
    public function login(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'identifier' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);

        $identifier = trim($validated['identifier']);

        $query = User::query();

        if (filter_var($identifier, FILTER_VALIDATE_EMAIL)) {
            $query->where('email', strtolower($identifier));
        } else {
            $query->where('phone', $identifier);
        }

        $user = $query->first();

        if (! $user || ! Hash::check($validated['password'], $user->password)) {
            return back()->withErrors(['identifier' => 'Invalid credentials.'])->withInput();
        }

        $role = $user->role;

        session()->put('auth_user_id', $user->id);
        session()->put('auth_user_role', $user->role);
        session()->put('auth_user_name', $user->name);

        return match ($role) {
            'admin' => redirect()->to('/admin/dashboard'),
            'doctor' => redirect()->to('/doctor/dashboard'),
            default => redirect()->to('/dashboard'),
        };
    }
}

