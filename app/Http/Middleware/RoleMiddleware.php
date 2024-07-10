<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        if (Auth::check()) {
            $user = Auth::user();
            foreach ($roles as $role) {
                if ($user->role === $role) {
                    return $next($request);
                }
            }
        }

        return response()->json(['error' => 'Unauthorized'], 403);
    }
}
