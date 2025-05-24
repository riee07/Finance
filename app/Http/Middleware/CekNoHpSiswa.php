<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CekNoHpSiswa
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check() && Auth::user()->role === 'siswa') {
            $siswa = Auth::user()->siswa;
            if (!$siswa || !$siswa->no_hp) {
                return redirect()->route('siswa.lengkapi.nohp');
            }
        }

        return $next($request);
    }
}
