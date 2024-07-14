<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create("tb_pegawai", function (Blueprint $table) {
            $table->id();
            $table->string('nama_pegawai');
            $table->string('jabatan');
            $table->string('alamat_pegawai');
            $table->string('telp_pegawai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("tb_pegawai");
    }
};
