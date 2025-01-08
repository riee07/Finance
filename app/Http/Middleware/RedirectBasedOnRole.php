<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectBasedOnRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            $usertype = Auth::user()->usertype;

            switch ($usertype) {
                case 'siswa':
                    return redirect()->route('siswa.dashboard');
                case 'admin':
                    return redirect()->route('admin.dashboard');
                case 'super_admin':
                    return redirect()->route('superadmin.dashboard');
                default:
                    return redirect('/login'); // Redirect jika usertype tidak valid
            }
        }

        return $next($request);
    }
}
