<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BukuController;
use App\Models\BukuModel;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

//Admin
Route::get('/admin/index', [AdminController::class, 'index'])->name('admin.index')->middleware('auth');

//BUKU
Route::get('/admin/buku', [BukuController::class, 'index'])->name('admin.buku')->middleware('auth');
Route::get('/admin/buku/create', [BukuController::class, 'create'])->name('admin.buku.create')->middleware('auth');
Route::post('/admin/buku/store', [BukuController::class, 'store'])->name('admin.buku.store')->middleware('auth');
Route::get('/admin/buku/edit/{id}', [BukuController::class, 'edit'])->name('admin.buku.edit');
Route::put('/admin/buku/update/{id}', [BukuController::class, 'update'])->name('admin.buku.update');
Route::post('/admin/buku/delete/{id}', [BukuController::class, 'delete'])->name('admin.buku.delete');
