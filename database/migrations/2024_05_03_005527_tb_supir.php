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
        Schema::create("tb_supir", function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_rute')->nullable();
            $table->string('nama_rute');
            $table->string('nama_supir');
            $table->string('alamat_supir');
            $table->string('telp_supir');
            $table->timestamps();

            $table->foreign('id_rute')->references('id')->on('tb_rute');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_supir');
    }
};
