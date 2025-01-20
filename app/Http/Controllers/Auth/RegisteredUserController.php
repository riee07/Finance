<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
         // Validasi
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'required|in:siswa,admin,superadmin',
            'password' => 'required|string|confirmed|min:8',
            'kelas' => $request->role === 'siswa' ? 'required|in:x,xi,xii' : 'nullable',
            'jurusan' => $request->role === 'siswa' ? 'required|in:pplg,tkj,an' : 'nullable',
            'nisn' => $request->role === 'siswa' ? 'required|digits:10|unique:users,nisn' : 'nullable',
        ]);

        // Simpan data
        $user = User::create([
            'name' => $validated['name'],
            'role' => $validated['role'],
            'kelas' => $validated['kelas'] ?? null,
            'jurusan' => $validated['jurusan'] ?? null,
            'nisn' => $validated['nisn'] ?? null,
            'password' => bcrypt($validated['password']),
        ]);

        event(new Registered($user));

        Auth::login($user);

        // return redirect(route('dashboard', absolute: false));

        // Redirect berdasarkan role
        switch ($user->role) {
            case 'admin':
                return redirect('admin/dashboard');
            case 'superadmin':
                return redirect('superadmin/dashboard');
            case 'siswa':
                return redirect('siswa/'. $request->user()->kelas .'/dashboard');
            default:
                return redirect('dashboard');
        }
    }
}
