<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    public function __construct()
    {
        $this->Pelanggan = new Pelanggan();
    }

    public function index()
    {
        $pelanggan = Pelanggan::get();
        return view('admin.pelanggan.index', compact('pelanggan'));
    }

    public function store(Request $r)
    {
        $this->Pelanggan->storePelanggan($r);
        return response()->json(array('success' => true));
    }

    public function update(Request $r)
    {
        Pelanggan::findOrFail($r->id)->update($r->all());
        return back()->with('success', 'Pelanggan Sudah Diupdate!!');
    }

    public function destroy(Request $r)
    {
        if ($r->ajax()) {
            $pelanggan = Pelanggan::findOrFail($r->id);
            if ($pelanggan) {
                $pelanggan->delete();
                return response()->json(array('success' => true));
            }
        }
    }
}
