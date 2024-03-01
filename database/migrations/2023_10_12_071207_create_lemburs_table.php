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
        Schema::create('lemburs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('nama_project')->nullable();
            $table->date('tanggal')->nullable();
            $table->string('mulai_lembur')->nullable();
            $table->string('akhir_lembur')->nullable();
            $table->string('total_lembur')->nullable();
            $table->string('keterangan')->nullable();
            $table->string('mengetahui')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();


            // Menambahkan foreign key constraint ke tabel users
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lemburs');
    }
};
