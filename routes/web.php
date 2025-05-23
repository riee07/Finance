<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SiswaController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\TagihanController;
use App\Http\Controllers\SPPXController;
use App\Http\Controllers\SPPXIController;
use App\Http\Controllers\SPPXIIController;

use App\Http\Controllers\TagihanXController;
use App\Http\Controllers\TagihanXIController;
use App\Http\Controllers\TagihanXIIController;
use App\Models\Tagihanx;
use App\Http\Controllers\SppController;
use App\Http\Controllers\Tagihan2Controller;

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
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/X/index', [TagihanController::class, 'index'])->name('admin.X.index');
    Route::get('/admin/XI/index', [TagihanXIController::class, 'index'])->name('admin.XI.index');
    Route::get('/admin/XII/index', [TagihanXIIController::class, 'index'])->name('admin.XII.index');
    Route::resource('x', TagihanController::class);
    Route::resource('xi', TagihanXIController::class);
    Route::resource('xii', TagihanXIIController::class);

    Route::resource('sppx', SPPXController::class);
    Route::resource('sppxi', SPPXIController::class);
    Route::resource('sppxii', SPPXIIController::class);

});
// Route Admin End

Route::middleware(['auth', 'role:superadmin'])->group(function() {
    Route::get('/superadmin/dashboard', [SuperAdminController::class, 'dashboard'])->name('superadmin.dashboard');
});

Route::resource('siswa', SiswaController::class);

// Route::resource('admin', TagihanController::class);
// Route::get('/admin/dashboard', [TagihanController::class, 'dashboard'])->name('admin.dashboard');

// Route::resource('admin', TagihanXIController::class);
// Route::get('/admin/dashboard', [TagihanXIController::class, 'dashboard'])->name('admin.dashboard');


//1. Berikan pendapat Anda apa itu stress dalam belajar
//2. Ceritakan pengalaman Anda ketika mengalami stress dalam belajar(Ceritakan penyebabnya. kapan terjadinya, dan apa yang dirasakan)
//3. Apa yang dapat Anda lakukan untuk bertahan disituasi pada point 2 tersebut



// Route::resource('admin', TagihanControllerX::class);


//tes


Route::get('/siswa', [SppController::class, 'index']);

Route::get('/siswa/x/index', [Tagihan2Controller::class, 'index'])->name('cart.index');
// Route::post('/siswa/x/index', [Tagihan2Controller::class, 'add'])->name('cart.add');
// Route::delete('/siswa/remove/{id}', [Tagihan2Controller::class, 'remove'])->name('cart.remove');




require __DIR__.'/auth.php';
