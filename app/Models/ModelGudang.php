<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelGudang extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_gudang',
        'nama_gudang',
        'alamat_gudang',
        'kapasitas_gudang',
    ];
    protected $table = "tb_gudang"; // Nama tabel
}
