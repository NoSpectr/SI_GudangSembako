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
        Schema::create("tb_barang", function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_kategori')->nullable();
            $table->string('nama_barang');
            $table->string('nama_kategori');
            $table->string('satuan_barang');
            $table->integer('harga_beli');
            $table->integer('harga_jual');
            $table->timestamps();

            $table->foreign('id_kategori')->references('id')->on('tb_kategori');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_barang');
    }
};
