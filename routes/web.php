<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AkunController;
use App\Http\Controllers\Admin\AnggotaRumahTanggaController;
use App\Http\Controllers\Admin\CetakController;
use App\Http\Controllers\Admin\KeluhanController;
use App\Http\Controllers\Admin\KetAset;
use App\Http\Controllers\Admin\KetAsetController;
use App\Http\Controllers\Admin\KetPerumahan;
use App\Http\Controllers\Admin\KetPerumahanController as AdminKetPerumahanController;
use App\Http\Controllers\Admin\PelangganController;
use App\Http\Controllers\Admin\PenerimaPKHController;
use App\Http\Controllers\Admin\TanggapanController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\KetPerumahanController;
use App\Http\Controllers\User\Penerima;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::redirect('/', 'dashboard/ecommerce');

// User
// Route::resource('/', UserController::class)->except(['create', 'store', 'update', 'edit', 'destroy']);
Route::resource('/', UserController::class);
Route::get('/kontak', [UserController::class, 'kontak'])->name('kontak');
Route::get('/informasi', [UserController::class, 'informasi'])->name('informasi');
Route::get('/statistik', [UserController::class, 'statistik'])->name('statistik');
Route::resource('/permintaan', Penerima::class)->except(['edit', 'update', 'destroy']);
Route::get('/permintaan/show', [Penerima::class, 'show'])->name('permintaan.cek');


Route::prefix('admin')->middleware('auth')->group(function () {
// Route::prefix('admin')->group(function () {
    
    Route::get('/', [AdminController::class, 'index'])->name('dashboard');

    // Route::get('/statistik', [AdminController::class, 'statistik'])->name('admin.statistik');
    
    Route::get('/rekap', [AdminController::class, 'rekap'])->name('admin.rekap');
    Route::post('/cetak-rekap', [AdminController::class, 'cetak_rekap'])->name('admin.cetak-rekap');
    // Route::resource('/admin', AdminController::class);
    
    Route::resource('/akun', AkunController::class);
    Route::get('/akun/edit/{id}', [AkunController::class, 'edit'])->name('akun.edit');
    Route::post('/akun/update', [AkunController::class, 'update'])->name('akun.update');

    // Route::get('/akun/{akun}/edit', [AkunController::class, 'edit'])->name('akun.edit');
    
    // Keluhan
    Route::prefix('/keluhan')->group(function () {
        Route::get('/', [KeluhanController::class, 'index'])->name('keluhan.index');
        Route::get('/tambah', [KeluhanController::class, 'tambah'])->name('keluhan.tambah');
        Route::post('/tambah', [KeluhanController::class, 'store'])->name('keluhan.store');
        Route::get('/edit/{id}', [KeluhanController::class, 'edit'])->name('keluhan.edit');
        Route::post('/update', [KeluhanController::class, 'update'])->name('keluhan.update');
        Route::delete('/{id}', [KeluhanController::class, 'delete'])->name('keluhan.delete');
    });
    
    // Tanggapan
    Route::prefix('/tanggapan')->group(function () {
        Route::get('/', [TanggapanController::class, 'index'])->name('tanggapan.index');
        Route::get('/tambah', [TanggapanController::class, 'tambah'])->name('tanggapan.tambah');
        Route::post('/tambah', [TanggapanController::class, 'store'])->name('tanggapan.store');
        Route::get('/edit/{id}', [TanggapanController::class, 'edit'])->name('tanggapan.edit');
        Route::post('/update', [TanggapanController::class, 'update'])->name('tanggapan.update');
        Route::delete('/{id}', [TanggapanController::class, 'delete'])->name('tanggapan.delete');
    });
    
    // Pelanggan
    Route::prefix('/pelanggan')->group(function () {
        Route::get('/', [PelangganController::class, 'index'])->name('pelanggan.index');
        Route::get('/tambah', [PelangganController::class, 'tambah'])->name('pelanggan.tambah');
        Route::post('/tambah', [PelangganController::class, 'store'])->name('pelanggan.store');
        Route::get('/edit/{id}', [PelangganController::class, 'edit'])->name('pelanggan.edit');
        Route::post('/update', [PelangganController::class, 'update'])->name('pelanggan.update');
        Route::delete('/{id}', [PelangganController::class, 'delete'])->name('pelanggan.delete');
    });
    
    // Cetak
    Route::prefix('/cetak')->group(function () {
        Route::get('/', [CetakController::class, 'index'])->name('cetak.index');
        Route::post('/laporan', [CetakController::class, 'laporan'])->name('cetak.laporan');
        Route::post('/tambah', [CetakController::class, 'store'])->name('cetak.store');
        Route::get('/edit/{id}', [CetakController::class, 'edit'])->name('cetak.edit');
        Route::post('/update', [CetakController::class, 'update'])->name('cetak.update');
        Route::delete('/{id}', [CetakController::class, 'delete'])->name('cetak.delete');
    });


});

Route::prefix('auth')->group(function () {
    
    Route::get('/login-user', [AuthController::class, 'login_user'])->name('auth.login-user');
    Route::post('/login-user', [AuthController::class, 'cek_login_user'])->name('auth.login.cek_user');

    Route::get('/login', [AuthController::class, 'login'])->name('auth.login');
    Route::post('/login', [AuthController::class, 'cek_login'])->name('auth.login.cek');
    
    Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');


    // Route::get('login', function () {
    //     return view('pages.auth.login', ['menu' => 'auth']);
    // })->name('auth.login');
    
});

