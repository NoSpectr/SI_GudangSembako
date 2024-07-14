<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelPegawai extends Model
{
    use HasFactory;

    protected $table = 'tb_pegawai';
    protected $fillable = [
        'nama_pegawai',
        'jabatan',
        'alamat_pegawai',
        'telp_pegawai',
    ];
    public function pengguna()
    {
        return $this->hasMany(ModelPengguna::class, 'id_pegawai');
    }
}
