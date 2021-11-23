<?php

namespace App\Http\Controllers;

use App\Models\Pembelian;
use App\Models\Barang;
use App\Models\Pemasok;
use Illuminate\Http\Request;

class PembelianController extends Controller
{
	public function index()
	{
		$barang = Barang::get();
		$pemasok = Pemasok::get();
		return view('admin.pembelian.index', compact('barang', 'pemasok'));
	}
}
