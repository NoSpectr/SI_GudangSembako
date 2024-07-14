<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelKategori extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_kategori',
        'nama_kategori',
    ];
    protected $table = "tb_kategori"; // Nama tabel
}
