<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelOutlet extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_outlet',
        'nama_outlet',
        'alamat_outlet',
        'no_telp',
    ];
    protected $table = "tb_outlet"; // Nama tabel
}
