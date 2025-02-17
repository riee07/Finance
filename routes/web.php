<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SiswaController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\TagihanController;
use App\Http\Controllers\Tagihan2Controller;
use App\Http\Controllers\CartIndekXController;
use App\Http\Controllers\SppController;

use App\Http\Controllers\SPPXController;
use App\Http\Controllers\SPPXIController;
use App\Http\Controllers\SPPXIIController;

use App\Http\Controllers\TagihanXController;
use App\Http\Controllers\TagihanXIController;
use App\Http\Controllers\TagihanXIIController;





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
    Route::get('/admin/x/dashboard', [AdminController::class, 'xIndex'])->name('admin.x.dashboard');
    Route::get('/admin/xi/dashboard', [AdminController::class, 'xiIndex'])->name('admin.xi.dashboard');
    Route::get('/admin/xii/dashboard', [AdminController::class, 'xiiIndex'])->name('admin.xii.dashboard');

    Route::get('/admin/x/spp/dashboard', [SPPXController::class, 'index'])->name('admin.x.spp.dashboard');
    Route::get('/admin/xi/spp/dashboard', [SPPXIController::class, 'index'])->name('admin.xI.spp.dashboard');
    Route::get('/admin/xii/spp/dashboard', [SPPXIIController::class, 'index'])->name('admin.xII.spp.dashboard');

    Route::get('/admin/x/tagihan/dashboard', [TagihanXController::class, 'index'])->name('admin.x.tagihan.dashboard');
    Route::get('/admin/xi/tagihan/dashboard', [TagihanXIController::class, 'index'])->name('admin.xi.tagihan.dashboard');
    Route::get('/admin/xii/tagihan/dashboard', [TagihanXIIController::class, 'index'])->name('admin.xii.tagihan.dashboard');

    Route::get('/admin/tagihan/X/index', [AdminController::class, 'index'])->name('admin.tagihan.X.index');
    Route::get('/admin/tagihan/XI/index', [TagihanXIController::class, 'index'])->name('admin.tagihan.XI.index');
    Route::get('/admin/tagihan/XII/index', [TagihanXIIController::class, 'index'])->name('admin.tagihan.XII.index');
    Route::resource('x', TagihanController::class);
    Route::resource('xi', TagihanXIController::class);
    Route::resource('xii', TagihanXIIController::class);
});

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
Route::post('/siswa/x/index', [Tagihan2Controller::class, 'add'])->name('cart.add');
Route::delete('/siswa/remove/{id}', [Tagihan2Controller::class, 'remove'])->name('cart.remove');




require __DIR__.'/auth.php';
