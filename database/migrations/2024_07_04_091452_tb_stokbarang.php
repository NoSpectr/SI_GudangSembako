<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create("tb_stokbarang", function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_barang')->nullable();
            $table->unsignedBigInteger('id_gudang')->nullable();
            $table->string('nama_barang')->nullable();
            $table->string('nama_gudang')->nullable();
            $table->integer('jumlah_stok');
            $table->date('tgl_masuk');
            $table->date('tgl_kadaluarsa');
            $table->timestamps();

            $table->foreign('id_barang')->references('id')->on('tb_barang');
            $table->foreign('id_gudang')->references('id')->on('tb_gudang');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_stokbarang');
    }
};
