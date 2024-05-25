<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelStok extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_barang',
        'id_gudang',
        'nama_barang',
        'nama_gudang',
        'jumlah_stok',
        'tgl_masuk',
        'tgl_kadaluarsa',
    ];
    protected $table = 'tb_stokBarang'; // Mendefinisikan nama tabel

    public function barang()
    {
        return $this->belongsTo(ModelBarang::class, 'id_barang');
    }
    public function gudang()
    {
        return $this->belongsTo(ModelGudang::class, 'id_gudang');
    }
}
