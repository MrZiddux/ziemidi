<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
