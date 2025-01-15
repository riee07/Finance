<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            $kelas = Auth::user()->kelas;

            switch ($usertype) {
                case 'siswa':
                    if ($kelas === 'kelas_x') {
                        return redirect()->route('kelas.x.dashboard');
                    } elseif ($kelas === 'kelas_xi') {
                        return redirect()->route('kelas.xi.dashboard');
                    } elseif ($kelas === 'kelas_xii') {
                        return redirect()->route('kelas.xii.dashboard');
                    } else {
                        return redirect('/login'); // Jika kelas tidak valid
                    }

                case 'admin':
                    return redirect()->route('admin.dashboard');
                case 'super_admin':
                    return redirect()->route('superadmin.dashboard');
                default:
                    return redirect('/login'); // Jika usertype tidak valid
            }
        }

        return $next($request);
    }
}
