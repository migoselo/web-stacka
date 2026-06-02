<?php

use Illuminate\Support\Facades\Route;
// 1. WAJIB IMPORT CONTROLLER DI SINI AGAR BERKAS ROUTE MENGENALINYA
use App\Http\Controllers\AdminController;

// Halaman Login Publik
Route::get('/', function () {
    return view('auth.login');
})->name('login');
// Proses Login
Route::post('/login', [AdminController::class, 'login'])->name('login.submit');

// Proses Logout
Route::post('/logout', [AdminController::class, 'logout'])->name('logout');

// Halaman Admin
Route::get('/admin/overview', [AdminController::class, 'overview'])->name('admin.overview');
Route::get('/admin/tables', [AdminController::class, 'tables'])->name('admin.tables');
Route::get('/admin/logs', [AdminController::class, 'logs'])->name('admin.logs');
Route::get('/admin/storage', [AdminController::class, 'storage'])->name('admin.storage');
