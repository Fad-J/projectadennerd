<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

Route::get('/', [BookController::class, 'landing']);

Route::get('/login', [BookController::class, 'awal']);

Route::get('/home', [BookController::class, 'home']);

Route::get('/admin', [BookController::class, 'admin'])
    ->middleware('admin');

Route::get('/user', [BookController::class, 'user'])
    ->middleware('user');

Route::get('/katalog', [BookController::class, 'katalog'])
    ->middleware('user');

Route::get('/search-buku',
    [BookController::class,'searchBuku'])
    ->middleware('user');

Route::get('/detail/{id}', [BookController::class, 'detail'])
    ->middleware('user');

Route::get('/search-admin',
    [BookController::class,'searchAdmin']);

Route::post('/pinjam/{id}', [BookController::class, 'pinjam'])
    ->middleware('user');

Route::get('/riwayat', [BookController::class, 'riwayat'])
    ->middleware('user');

Route::get('/admin/peminjaman',
    [BookController::class, 'datapeminjaman'])
    ->middleware('admin');

Route::get('/kembalikan/{id}',
    [BookController::class, 'kembalikan'])
    ->middleware('admin');

Route::get('/tabel', [BookController::class, 'index']);

Route::get('/cari/{id}', [BookController::class, 'cari']);

Route::post('/tambah', [BookController::class, 'tambah']);

Route::get('/hapus/{id}', [BookController::class, 'hapus']);

Route::get('/show/{id}', [BookController::class, 'show']);

Route::post('/edit/{id}', [BookController::class, 'edit']);

Route::get('/signin', [BookController::class, 'signin']);

Route::post('/registrasi', [BookController::class, 'registrasi']);

Route::post('/login', [BookController::class, 'login']);

Route::get('/logout', [BookController::class, 'logout']);

