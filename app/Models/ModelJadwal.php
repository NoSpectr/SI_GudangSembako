<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelJadwal extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_outlet',
        'id_truk',
        'id_supir',
        'nama_outlet',
        'nomor_plat',
        'nama_supir',
        'jadwal',
    ];
    protected $table = 'tb_jadwal'; // Mendefinisikan nama tabel

    public function outlet()
    {
        return $this->belongsTo(ModelOutlet::class, 'id_outlet');
    }
    public function truk()
    {
        return $this->belongsTo(ModelTruk::class, 'id_truk');
    }
    public function supir()
    {
        return $this->belongsTo(ModelSupir::class, 'id_supir');
    }
}
