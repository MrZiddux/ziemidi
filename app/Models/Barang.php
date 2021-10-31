<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Barang extends Model
{
    use HasFactory;

    protected $table = 'barang';

    protected $fillable = ['kode_barang', 'produk_id', 'nama_barang', 'satuan', 'diskon', 'harga_jual', 'stok'];

    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }

    public function pembelian()
    {
        return $this->hasMany(PembelianDetail::class);
    }

    public function penjual()
    {
        return $this->hasMany(PenjualanDetail::class);
    }

    public function storeBarang($r)
    {
        $latest = Barang::select('kode_barang')->latest()->first();
        $noUrut = ($latest == null) ? "001" : (int)Str::substr($latest->kode_barang, 10, Str::length($latest->kode_barang)) + 1;
        $noUrutAfter = (Str::length($noUrut) < 3) ? str_repeat('0', 3 - Str::length($noUrut)) . $noUrut : $noUrut;
        $kodeBarang = 'KB' . date('Ymd') . $noUrutAfter;

        $barang = new Barang();
        $barang->kode_barang = $kodeBarang;
        $barang->produk_id = $r->produk_id;
        $barang->nama_barang = $r->nama_barang;
        $barang->satuan = $r->satuan;
        $barang->diskon = $r->diskon;
        $barang->harga_jual = $r->harga_jual;
        $barang->stok = $r->stok;
        $barang->save();
    }
}
