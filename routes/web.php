<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProgramDonasiController;
use App\Http\Controllers\DonasiController;
use App\Http\Controllers\PenerimaController;
use App\Http\Controllers\PenyaluranController;
use App\Http\Middleware\RoleMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/dashboard');
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth'])->name('dashboard');

// ============================================================
// PROGRAM DONASI
// ============================================================
// ROUTE STATIS (create) HARUS di atas route wildcard {program}
Route::middleware(['auth', RoleMiddleware::class . ':admin'])->group(function () {
    Route::get('/programs/create', [ProgramDonasiController::class, 'create'])->name('programs.create');
    Route::post('/programs', [ProgramDonasiController::class, 'store'])->name('programs.store');
});

// Route index & show (bisa diakses semua user yang login)
Route::middleware(['auth'])->group(function () {
    Route::get('/programs', [ProgramDonasiController::class, 'index'])->name('programs.index');
    Route::get('/programs/{program}', [ProgramDonasiController::class, 'show'])->name('programs.show');
});

// Route edit, update, delete (hanya admin)
Route::middleware(['auth', RoleMiddleware::class . ':admin'])->group(function () {
    Route::get('/programs/{program}/edit', [ProgramDonasiController::class, 'edit'])->name('programs.edit');
    Route::put('/programs/{program}', [ProgramDonasiController::class, 'update'])->name('programs.update');
    Route::delete('/programs/{program}', [ProgramDonasiController::class, 'destroy'])->name('programs.destroy');
});

// ============================================================
// DONASI
// ============================================================
// Route create, store, index, show, delete (bisa user biasa)
Route::middleware(['auth'])->group(function () {
    Route::get('/donations', [DonasiController::class, 'index'])->name('donations.index');
    Route::get('/donations/create', [DonasiController::class, 'create'])->name('donations.create');
    Route::post('/donations', [DonasiController::class, 'store'])->name('donations.store');
    Route::get('/donations/{donation}', [DonasiController::class, 'show'])->name('donations.show');
    Route::delete('/donations/{donation}', [DonasiController::class, 'destroy'])->name('donations.destroy');
});

// Route edit & update (hanya admin)
Route::middleware(['auth', RoleMiddleware::class . ':admin'])->group(function () {
    Route::get('/donations/{donation}/edit', [DonasiController::class, 'edit'])->name('donations.edit');
    Route::put('/donations/{donation}', [DonasiController::class, 'update'])->name('donations.update');
});

// ============================================================
// PENERIMA BANTUAN (hanya admin)
// ============================================================
Route::middleware(['auth', RoleMiddleware::class . ':admin'])->group(function () {
    Route::get('/recipients', [PenerimaController::class, 'index'])->name('recipients.index');
    Route::get('/recipients/create', [PenerimaController::class, 'create'])->name('recipients.create');
    Route::post('/recipients', [PenerimaController::class, 'store'])->name('recipients.store');
    Route::get('/recipients/{recipient}', [PenerimaController::class, 'show'])->name('recipients.show');
    Route::get('/recipients/{recipient}/edit', [PenerimaController::class, 'edit'])->name('recipients.edit');
    Route::put('/recipients/{recipient}', [PenerimaController::class, 'update'])->name('recipients.update');
    Route::delete('/recipients/{recipient}', [PenerimaController::class, 'destroy'])->name('recipients.destroy');
});

// ============================================================
// PENYALURAN BANTUAN (hanya admin)
// ============================================================
Route::middleware(['auth', RoleMiddleware::class . ':admin'])->group(function () {
    Route::get('/distributions', [PenyaluranController::class, 'index'])->name('distributions.index');
    Route::get('/distributions/create', [PenyaluranController::class, 'create'])->name('distributions.create');
    Route::post('/distributions', [PenyaluranController::class, 'store'])->name('distributions.store');
    Route::get('/distributions/{distribution}', [PenyaluranController::class, 'show'])->name('distributions.show');
    Route::get('/distributions/{distribution}/edit', [PenyaluranController::class, 'edit'])->name('distributions.edit');
    Route::put('/distributions/{distribution}', [PenyaluranController::class, 'update'])->name('distributions.update');
    Route::delete('/distributions/{distribution}', [PenyaluranController::class, 'destroy'])->name('distributions.destroy');
});

// ============================================================
// PROFILE
// ============================================================
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// ============================================================
// TENTANG KAMI
// ============================================================
Route::get('/about', function () {
    return view('about');
})->name('about');

// Breeze auth routes
require __DIR__.'/auth.php';