<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     * Cek apakah user yang login memiliki role yang sesuai
     */
    public function handle(Request $request, Closure $next, string ...$roles): Response
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        $user = Auth::user();

        // Cek apakah role user ada di dalam daftar roles yang diizinkan
        if (!in_array($user->role, $roles)) {
            // Redirect ke dashboard sesuai role user
            if ($user->role == 'admin') {
                return redirect('/dashboard/admin')->with('error', 'Anda tidak memiliki akses ke halaman tersebut!');
            } elseif ($user->role == 'staff') {
                return redirect('/dashboard/staff')->with('error', 'Anda tidak memiliki akses ke halaman tersebut!');
            } else {
                return redirect('/dashboard/customer')->with('error', 'Anda tidak memiliki akses ke halaman tersebut!');
            }
        }

        return $next($request);
    }
}
