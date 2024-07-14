<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelSupir extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_rute',
        'nama_rute',
        'nama_supir',
        'alamat_supir',
        'telp_supir',
    ];
    protected $table = 'tb_supir'; // Mendefinisikan nama tabel
    public function rute()
    {
        return $this->belongsTo(ModelRute::class, 'id_rute');
    }
}
