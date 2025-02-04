<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SiswaController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SuperAdminController;
<<<<<<< HEAD
use App\Http\Controllers\TagihanController;
use App\Http\Controllers\TagihanXIController;

=======
use App\Http\Controllers\TagihanControllerX;
>>>>>>> a1845f876ed9ded7af25847bf23191a537d41c03



Route::get('/', function () {
    return view('siswa/x/index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'role:siswa'])->group(function() {
    Route::get('/siswa/x/dashboard', function() {
        return view('siswa/x/dashboard');
    })->name('siswa.x.dashboard');

    Route::get('/siswa/xi/dashboard', function() {
        return view('siswa/xi/dashboard');
    })->name('siswa.xi.dashboard');

    Route::get('/siswa/xii/dashboard', function() {
        return view('siswa/xii/dashboard');
    })->name('siswa.xii.dashboard');
});

Route::middleware(['auth', 'role:admin'])->group(function() {
    Route::get('/admin/dashboard', [TagihanController::class, 'dashboard'])->name('admin.dashboard');
});

Route::middleware(['auth', 'role:superadmin'])->group(function() {
    Route::get('/superadmin/dashboard', [SuperAdminController::class, 'dashboard'])->name('superadmin.dashboard');
});

<<<<<<< HEAD
Route::resource('siswa', SiswaController::class);

Route::resource('admin', TagihanController::class);
Route::get('/admin/dashboard', [TagihanController::class, 'index'])->name('admin.dashboard');

Route::resource('admin', TagihanXIController::class);




=======
// Route::resource('siswa', SiswaController::class);
>>>>>>> a1845f876ed9ded7af25847bf23191a537d41c03

// Route::resource('admin', TagihanControllerX::class);


//tes
use App\Http\Controllers\SppController;

Route::get('/siswa', [SppController::class, 'index']);





require __DIR__.'/auth.php';
