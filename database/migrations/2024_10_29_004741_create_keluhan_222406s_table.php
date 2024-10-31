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
        Schema::create('keluhan_222406s', function (Blueprint $table) {
            $table->id();
            $table->integer('id_pelanggan_222406');
            $table->integer('id_kategori_222406');
            $table->text('keluhan_222406');
            $table->date('tgl_keluhan_222406');
            $table->enum('status_keluhan_222406', ['Pending', 'Diproses', 'Selesai']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('keluhan_222406s');
    }
};
