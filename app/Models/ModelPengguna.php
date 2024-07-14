<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class ModelPengguna extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'tb_pengguna';

    protected $fillable = [
        'id_pegawai', 'email', 'username', 'password', 'hak_akses'
    ];

    public function pegawai()
    {
        return $this->belongsTo(ModelPegawai::class, 'id_pegawai');
    }
}
