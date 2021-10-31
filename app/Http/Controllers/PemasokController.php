<?php

namespace App\Http\Controllers;

use App\Models\Pemasok;
use Illuminate\Http\Request;

class PemasokController extends Controller
{
    public function __construct()
    {
        $this->Pemasok = new Pemasok();
    }

    public function index()
    {
        $pemasok = Pemasok::get();
        return view('admin.pemasok.index', compact('pemasok'));
    }

    public function store(Request $r)
    {
        $this->Pemasok->storePemasok($r);
        return response()->json(array('success' => true));
    }

    public function update(Request $r)
    {
        Pemasok::findOrFail($r->id)->update($r->all());
        return back()->with('success', 'Pemasok Sudah Diupdate!!');
    }

    public function destroy(Request $r)
    {
        if ($r->ajax()) {
            $pemasok = Pemasok::findOrFail($r->id);
            if ($pemasok) {
                $pemasok->delete();
                return response()->json(array('success' => true));
            }
        }
    }
}
