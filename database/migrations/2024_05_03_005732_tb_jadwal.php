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
        Schema::create("tb_jadwal", function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_outlet')->nullable();
            $table->unsignedBigInteger('id_truk')->nullable();
            $table->unsignedBigInteger('id_supir')->nullable();
            $table->string('nama_outlet');
            $table->string('nomor_plat');
            $table->string('nama_supir');
            $table->string('jadwal');
            $table->timestamps();

            $table->foreign('id_outlet')->references('id')->on('tb_outlet');
            $table->foreign('id_truk')->references('id')->on('tb_truk');
            $table->foreign('id_supir')->references('id')->on('tb_supir');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_jadwal');
    }
};
