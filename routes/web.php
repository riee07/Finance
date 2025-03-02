<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TahunAjaranController;
use App\Http\Controllers\TarifTagihanController;
use App\Http\Controllers\TagihanController;
use App\Http\Controllers\JenisTagihanController;
use App\Http\Controllers\DetailTagihanController;

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

Route::resource('siswa', SiswaController::class);
Route::resource('tahun-ajaran', TahunAjaranController::class);
Route::resource('jenis-tagihan', JenisTagihanController::class);
Route::resource('tarif-tagihan', TarifTagihanController::class);
Route::resource('tagihan', TagihanController::class);
Route::resource('detail-tagihan', DetailTagihanController::class);

Route::resource('admin', AdminController::class);

// Route::middleware(['auth', 'role:siswa'])->group(function() {
// });

// Route::middleware(['auth', 'role:admin'])->group(function() {
// });

// Route::middleware(['auth', 'role:superadmin'])->group(function() {
// });


require __DIR__.'/auth.php';
