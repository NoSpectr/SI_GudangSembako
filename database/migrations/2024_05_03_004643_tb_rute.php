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
        Schema::create("tb_rute", function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_gudang')->nullable();
            $table->string('nama_gudang')->nullable();
            $table->string('daftar_titik');
            $table->timestamps();

            $table->foreign('id_gudang')->references('id')->on('tb_gudang');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_rute');
    }
};
