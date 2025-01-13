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
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'usertype' => ['required', 'string'], // Validasi usertype
            'kelas' => ['nullable', 'string'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'usertype' => $request->usertype, // Simpan usertype
            'kelas' => $request->kelas,
        ]);

        event(new Registered($user));

        Auth::login($user);

        // Redirect sesuai role atau kelas
        switch ($user->usertype) {
            case 'kelas':
                if ($user->kelas === 'kelas_x') {
                    return redirect()->route('kelas.x.dashboard');
                } elseif ($user->kelas === 'kelas_xi') {
                    return redirect()->route('kelas.xi.dashboard');
                } elseif ($user->kelas === 'kelas_xii') {
                    return redirect()->route('kelas.c.dashboard');
                }
                break;
            case 'admin':
                return redirect()->route('admin.dashboard');
            case 'super_admin':
                return redirect()->route('superadmin.dashboard');
            default:
                return redirect('/login');
        }
    }

}
