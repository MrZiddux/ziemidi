<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Produk;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function __construct()
    {
        $this->Barang = new Barang();
    }

    public function index()
    {
        $produk = Produk::get();
        $barang = Barang::with('produk')->get();
        return view('admin.barang.index', compact('barang', 'produk'));
    }

    public function store(Request $r)
    {
        $this->Barang->storeBarang($r);
        return response()->json(array('success' => true));
    }

    public function update(Request $r)
    {
        Barang::find($r->id)->update($r->all());
        // return response()->json(array('success' => true));
        return back()->with('success', 'Barang Sudah Diupdate!!');
    }

    public function destroy(Request $r)
    {
        if ($r->ajax()) {
            $barang = Barang::findOrFail($r->id);
            if ($barang) {
                $barang->delete();
                return response()->json(array('success' => true));
            }
        }
    }
}
