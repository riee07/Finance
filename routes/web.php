<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;

use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Middleware\RedirectBasedOnRole;

Route::get('/', function () {
    return view('welcome');
});

<<<<<<< HEAD
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// Route::middleware(['auth'])->group(function () {
//     Route::get('/dashboard', function () {
//         return app(RedirectBasedOnRole::class)->handle(request(), function () {
//             return view('welcome');
//         });
//     })->name('dashboard'); // Untuk mengarahkan ke dashboard default
    
//     Route::get('/siswa/dashboard', [SiswaController::class, 'dashboard'])->name('siswa.dashboard');
//     Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
//     Route::get('/superadmin/dashboard', [SuperAdminController::class, 'dashboard'])->name('superadmin.dashboard');
// });

Route::middleware(['auth'])->group(function () {
    // Dashboard user berdasarkan kelas
    Route::get('/kelas-a/dashboard', [UserController::class, 'kelasADashboard'])->name('kelas.a.dashboard');
    Route::get('/kelas-b/dashboard', [UserController::class, 'kelasBDashboard'])->name('kelas.b.dashboard');
    Route::get('/kelas-c/dashboard', [UserController::class, 'kelasCDashboard'])->name('kelas.c.dashboard');

    // Admin & Super Admin
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/superadmin/dashboard', [SuperAdminController::class, 'dashboard'])->name('superadmin.dashboard');
});





=======
Route::resource('/siswa', SiswaController::class);
>>>>>>> 1aa6835d71618a6812234e4c5a014a2970ec5540
