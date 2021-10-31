<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Pelanggan extends Model
{
    use HasFactory;

    protected $table = 'pelanggan';

    protected $fillable = ['kode_pelanggan', 'nama', 'alamat', 'no_telp', 'email'];

    public function storePelanggan($r)
    {
        $latest = Pelanggan::select('kode_pelanggan')->latest()->first();
        $noUrut = ($latest == null) ? "001" : (int)Str::substr($latest->kode_pelanggan, 10, Str::length($latest->kode_pelanggan)) + 1;
        $noUrutAfter = (Str::length($noUrut) < 3) ? str_repeat('0', 3 - Str::length($noUrut)) . $noUrut : $noUrut;
        $kodePelanggan = 'KP' . date('Ymd') . $noUrutAfter;

        $pelanggan = new Pelanggan();
        $pelanggan->kode_pelanggan = $kodePelanggan;
        $pelanggan->nama = $r->nama;
        $pelanggan->alamat = $r->alamat;
        $pelanggan->no_telp = $r->no_telp;
        $pelanggan->email = $r->email;
        $pelanggan->save();
    }
}
