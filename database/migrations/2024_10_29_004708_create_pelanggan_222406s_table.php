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
        Schema::create('pelanggan_222406s', function (Blueprint $table) {
            $table->id();
            $table->string('nama_222406');
            $table->string('email_222406');
            $table->string('telepon_222406');
            $table->string('alamat_222406');
            $table->string('jkl_222406');
            $table->date('tgl_terdaftar_222406');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pelanggan_222406s');
    }
};
