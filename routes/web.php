<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\PenjualanController;

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    Route::get('/barang', [BarangController::class, 'barang'])->name('barang');
    Route::post('/tambah-barang', [BarangController::class, 'tambah'])->name('barang.tambah');
    Route::delete('/hapus-barang/{id_barang}', [BarangController::class, 'hapus'])->name('barang.hapus');
    Route::post('/edit-barang/{id_barang}', [BarangController::class, 'edit'])->name('barang.edit');
    Route::get('/penjualan', [PenjualanController::class, 'penjualan'])->name('penjualan');
    Route::post('/pilih-barang', [PenjualanController::class, 'pilihBarang'])->name('penjualan.pilih-barang');
    Route::get('/modal-pilih-barang', [PenjualanController::class, 'modalPilihBarang'])->name('penjualan.modal-pilih-barang');
    Route::post('/tambah-barang-penjualan', [PenjualanController::class, 'tambahBarangkePenjualan'])->name('penjualan.tambah-barang');
    Route::post('/hapus-barang-penjualan', [PenjualanController::class, 'hapusBarang'])->name('penjualan.hapus-barang');
    Route::post('/transaksi', [PenjualanController::class, 'transaksi'])->name('penjualan.transaksi');
    Route::get('/riwayat-penjualan', [PenjualanController::class, 'riwayatPenjualan'])->name('penjualan.riwayat');
    Route::get('/detail-riwayat-penjualan', [PenjualanController::class, 'detailPenjualan'])->name('penjualan.detail-riwayat');
    Route::get('/detail-riwayat-penjualan/{id}', [PenjualanController::class, 'detailPenjualan']);
});
