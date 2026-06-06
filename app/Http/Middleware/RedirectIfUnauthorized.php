<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfUnauthorized
{
    public function handle(Request $request, Closure $next): Response
    {
        $userId = session()->get('auth_user_id');
        if (! $userId) {
            return redirect()->to('/login');
        }
        return $next($request);
    }
}

