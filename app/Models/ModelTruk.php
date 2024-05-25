<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelTruk extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_truk',
        'nomor_plat',
        'kapasitas_truk',
        'kondisi_truk',
    ];
    protected $table = "tb_truk"; // Nama tabel
}
