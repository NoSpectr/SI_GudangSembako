<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelBarang extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_kategori',
        'nama_barang',
        'nama_kategori',
        'satuan_barang',
        'harga_beli',
        'harga_jual',
    ];
    protected $table = "tb_barang"; // Nama tabel

    public function ModelKategori(){
        return $this->belongsTo(ModelKategori::class, 'id_kategori');
    }
}
