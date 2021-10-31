<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Pemasok extends Model
{
    use HasFactory;

    protected $table = 'pemasok';

    protected $fillable = ['kode_pemasok', 'nama', 'alamat', 'kota', 'no_telp'];

    public function pembelian()
    {
        return $this->hasMany(Pembelian::class);
    }

    public function storePemasok($r)
    {
        $latest = Pemasok::select('kode_pemasok')->latest()->first();
        $noUrut = ($latest == null) ? "001" : (int)Str::substr($latest->kode_pemasok, 10, Str::length($latest->kode_pemasok)) + 1;
        $noUrutAfter = (Str::length($noUrut) < 3) ? str_repeat('0', 3 - Str::length($noUrut)) . $noUrut : $noUrut;
        $kodePemasok = 'KPM' . date('Ymd') . $noUrutAfter;

        $pemasok = new Pemasok();
        $pemasok->kode_pemasok = $kodePemasok;
        $pemasok->nama = $r->nama;
        $pemasok->alamat = $r->alamat;
        $pemasok->no_telp = $r->no_telp;
        $pemasok->kota = $r->kota;
        $pemasok->save();
    }
}
