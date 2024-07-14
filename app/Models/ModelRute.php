<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelRute extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_gudang',
        'nama_gudang',
        'daftar_titik',
    ];
    protected $table = "tb_rute"; // Nama tabel

    public function modelGudang(){
        return $this->belongsTo(ModelGudang::class, 'id_gudang');
    }
}
