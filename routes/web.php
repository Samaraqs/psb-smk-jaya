<?php

use App\Http\Controllers\LandingController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| AUTH & LANDING (Akses Publik)
|--------------------------------------------------------------------------
*/
Route::get('/', [LandingController::class, 'index']);

Route::get('/register', [AuthController::class, 'register']);
Route::post('/register', [AuthController::class, 'store']);

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate']);

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth');

/*
|--------------------------------------------------------------------------
| ROUTE KHUSUS SISWA (Akses: Harus Login & Role Siswa)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'can:siswa'])->group(function () {

    Route::get('/dashboard-siswa', [SiswaController::class, 'dashboard']);

    // Form Pendaftaran
    Route::get('/form-pendaftaran', [SiswaController::class, 'form']);
    Route::post('/form-pendaftaran', [SiswaController::class, 'simpan']);
    Route::get('/form-pendaftaran/edit', [SiswaController::class, 'edit']);
    Route::post('/form-pendaftaran/update', [SiswaController::class, 'update']);

    // Berkas
    Route::get('/upload-berkas', [SiswaController::class, 'uploadForm']);
    Route::post('/upload-berkas', [SiswaController::class, 'uploadBerkas']);
    Route::post('/hapus-berkas/{id}', [SiswaController::class, 'hapusBerkas']);
});

/*
|--------------------------------------------------------------------------
| ROUTE KHUSUS ADMIN (Akses: Harus Login & Role Admin)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'can:admin'])->prefix('admin')->group(function () {

    // Dashboard
    Route::get('/dashboard', [AdminController::class, 'dashboard']);

    // Data Pendaftar
    Route::get('/pendaftar/pending', [AdminController::class, 'pending']);
    Route::get('/pendaftar/lulus', [AdminController::class, 'lulus']);
    Route::get('/pendaftar/cadangan', [AdminController::class, 'cadangan']);
    Route::get('/pendaftar/ditolak', [AdminController::class, 'ditolak']);

    Route::get('/pendaftar/{id}', [AdminController::class, 'detail']);
    Route::post('/verifikasi/{id}', [AdminController::class, 'verifikasi']);
    Route::post('/nilai', [AdminController::class, 'nilai']);

    // Laporan
    Route::get('/laporan', [AdminController::class, 'laporan']);
    Route::get('/laporan/cetak', [AdminController::class, 'cetakLaporan']);

    // Route parameter status (Paling Bawah)
    Route::get('/laporan/status/{status}', [AdminController::class, 'laporanStatus']);
});