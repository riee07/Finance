<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\SiswaController;
use App\Http\Controllers\Admin\TahunAjaranController;
use App\Http\Controllers\Admin\JenisTagihanController;
use App\Http\Controllers\Admin\TarifTagihanController;
use App\Http\Controllers\Admin\TagihanController;
use App\Http\Controllers\Admin\DetailTagihanController;
use App\Http\Controllers\Admin\PembayaranController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\UsersOrderController;

use App\Exports\PembayaranExport;
use App\Exports\TahunAjaranExport;

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
Route::resource('pembayaran', PembayaranController::class);

Route::resource('admin', AdminController::class);

//route untuk excel
Route::get('pembayaran.export', [PembayaranController::class, 'export'])->name('pembayaran.export');
Route::get('tahun-ajaran.export', [TahunAjaranController::class, 'export'])->name('tahun-ajaran.export');

// Route::middleware(['auth', 'role:siswa'])->group(function() {
// });

// Route::middleware(['auth', 'role:admin'])->group(function() {
// });

// Route::middleware(['auth', 'role:superadmin'])->group(function() {
// });

// buat users
Route::resource('UserOrder', [UsersOrderController::class]);


require __DIR__.'/auth.php';
