<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;

use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TagihanControllerX;
use App\Http\Controllers\TagihanControllerXI;
use App\Http\Controllers\TagihanControllerXII;
use App\Http\Controllers\SuperAdminController;
use App\Http\Middleware\RedirectBasedOnRole;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
});

Route::middleware(['auth', 'role:super_admin'])->group(function () {
    Route::get('/superadmin/dashboard', [SuperAdminController::class, 'dashboard'])->name('superadmin.dashboard');
});


Route::middleware(['auth'])->group(function () {
    // Dashboard user berdasarkan kelas
    Route::get('/kelas-x/dashboard', [UserController::class, 'kelasXDashboard'])->name('siswa.X.tes');
    Route::get('/kelas-xi/dashboard', [UserController::class, 'kelasXIDashboard'])->name('kelas.xi.dashboard');
    Route::get('/kelas-xii/dashboard', [UserController::class, 'kelasXIIDashboard'])->name('kelas.xii.dashboard');

    // Admin & Super Admin
    Route::get('/admin/dasboard', [UserController::class, 'adminDashboard'])->name('admin.dashboard');
    Route::get('/superadmin/dasboard', [UserController::class, 'superAdminDashboard'])->name('superadmin.dashboard');
});

Route::resource('siswa', SiswaController::class);

Route::resource('admin', TagihanControllerX::class);
Route::resource('admin', TagihanControllerXI::class);
Route::resource('admin', TagihanControllerXII::class);

//tes
use App\Http\Controllers\SPpController;

Route::get('/siswa', [SppController::class, 'index']);

