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
        Schema::create('tanggapan_222406s', function (Blueprint $table) {
            $table->id();
            $table->integer('id_keluhan_222406');
            $table->string('tanggapan_222406');
            $table->date('tgl_tanggapan_222406');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tanggapan_222406s');
    }
};
