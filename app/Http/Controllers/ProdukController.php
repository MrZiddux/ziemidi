<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function __construct()
    {
        $this->Produk = new Produk();
    }

    public function index()
    {
        $produk = Produk::get();
        return view('admin.produk.index', compact('produk'));
    }

    public function store(Request $r)
    {
        Produk::create($r->all());
        return response()->json(array('success' => true));
        // return back()->with('success', 'Produk Sudah Dibuat!!');
    }

    public function update(Request $r)
    {
        Produk::find($r->id)->update(['nama_produk' => $r->nama_produk]);
        return back()->with('success', 'Produk Sudah Diupdate!!');
    }

    public function destroy(Request $r)
    {
        // Produk::find($r->id)->delete();
        // return back()->with('success', 'Produk Sudah Dihapus!!');
        if ($r->ajax()) {
            $produk = Produk::findOrFail($r->id);
            if ($produk) {
                $produk->delete();
                return response()->json(array('success' => true));
            }
        }
    }
}
