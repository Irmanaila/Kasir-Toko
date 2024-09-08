<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    Route::get('/barang', [BarangController::class, 'barang'])->name('barang');
    Route::post('/tambah-barang', [BarangController::class, 'tambah'])->name('barang.tambah');
    Route::delete('/hapus-barang/{id_barang}', [BarangController::class, 'hapus'])->name('barang.hapus');
    Route::post('/edit-barang/{id_barang}', [BarangController::class, 'edit'])->name('barang.edit');
});
