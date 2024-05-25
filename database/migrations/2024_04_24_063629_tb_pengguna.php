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
        Schema::create("tb_pengguna", function (Blueprint $table) {
            $table->id('id_pengguna');
            $table->foreignId('id_pegawai');
            $table->string('email');
            $table->string('username');
            $table->string('password');
            $table->string('hak_akses');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("tb_pengguna");
    }
};
