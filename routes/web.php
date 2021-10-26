<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\PembelianController;
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

Route::get('pembelian', [PembelianController::class, 'index']);