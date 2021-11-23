<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PemasokController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\PenjualanController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('admin.dashboard');
});

Route::get('produk', [ProdukController::class, 'index']);
Route::post('produk/tambah', [ProdukController::class, 'store'])->name('tambahproduk');
Route::post('produk/update', [ProdukController::class, 'update'])->name('editproduk');
Route::post('produk/delete', [ProdukController::class, 'destroy'])->name('deleteproduk');

Route::get('barang', [BarangController::class, 'index']);
Route::post('barang/tambah', [BarangController::class, 'store'])->name('tambahbarang');
Route::post('barang/update', [BarangController::class, 'update'])->name('editbarang');
Route::post('barang/delete', [BarangController::class, 'destroy'])->name('deletebarang');

Route::get('pelanggan', [PelangganController::class, 'index']);
Route::post('pelanggan/tambah', [PelangganController::class, 'store'])->name('tambahpelanggan');
Route::post('pelanggan/update', [PelangganController::class, 'update'])->name('editpelanggan');
Route::post('pelanggan/delete', [PelangganController::class, 'destroy'])->name('deletepelanggan');

Route::get('pemasok', [PemasokController::class, 'index']);
Route::post('pemasok/tambah', [PemasokController::class, 'store'])->name('tambahpemasok');
Route::post('pemasok/update', [PemasokController::class, 'update'])->name('editpemasok');
Route::post('pemasok/delete', [PemasokController::class, 'destroy'])->name('deletepemasok');

Route::get('transaksi', [PenjualanController::class, 'create']);
Route::get('pembelian', [PembelianController::class, 'index']);
