<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\PinjamBukuController;

//Login
Route::get('/', [LoginController::class, 'login'])->name('login');
Route::post('actionLogin', [LoginController::class, 'actionLogin'])->name('actionLogin');

//Register
Route::get('register', [RegisterController::class,'register'])->name('register');
Route::post('register/action', [RegisterController::class, 'actionRegister'])->name('actionRegister');
Route::get('register/verify/{verify_key}', [RegisterController::class, 'verify'])->name('verify');

//Logout
Route::get('logout', [LoginController::class, 'actionLogout'])->name('actionLogout')->middleware('auth');

//Home Page
Route::get('home', [HomeController::class, 'index'])->name('home')->middleware('auth');

//Buku Page
Route::get('buku', [BukuController::class, 'index'])->name('buku.index')->middleware('auth');
Route::get('buku/create', [BukuController::class, 'create'])->name('buku.create')->middleware('auth');
Route::post('buku/store', [BukuController::class,'store'])->name('buku.store')->middleware('auth');
Route::get('buku/edit/{id_buku}', [BukuController::class, 'edit'])->name('buku.edit')->middleware('auth');
Route::put('buku/update/{id_buku}', [BukuController::class, 'update'])->name('buku.update')->middleware('auth');
Route::get('buku/delete/{id_buku}', [BukuController::class, 'delete'])->name('buku.delete')->middleware('auth');

//Pinjam Buku Page
Route::get('pinjam', [PinjamBukuController::class, 'index'])->name('pinjam.index')->middleware('auth');
Route::post('pinjam/create/{id_buku}', [PinjamBukuController::class, 'create'])->name('pinjam.create')->middleware('auth');

//Kembali Buku Page
Route::get('kembali', [PinjamBukuController::class, 'show'])->name('kembali')->middleware('auth');
Route::post('kembali/edit/{id_pinjam_buku}', [PinjamBukuController::class, 'edit'])->name('kembali.edit')->middleware('auth');
