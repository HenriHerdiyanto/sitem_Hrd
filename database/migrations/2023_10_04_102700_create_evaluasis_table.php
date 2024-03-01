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
        Schema::create('evaluasis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Menggunakan unsignedBigInteger
            $table->unsignedBigInteger('divisi_id'); // Menggunakan unsignedBigInteger
            $table->string('lama_percobaan');
            $table->string('nama_lengkap');
            $table->integer('type');
            $table->string('mulai_kerja');
            $table->string('faktor_penilaian');
            $table->string('catatan_atasan');
            $table->string('catatan_hrd')->nullable();
            $table->string('dievaluasi_oleh')->nullable();
            $table->string('disetujui_oleh')->nullable();
            $table->string('status_evaluasi')->nullable();
            $table->timestamps();

            // Menambahkan foreign key constraint ke tabel users
            $table->foreign('user_id')->references('id')->on('users');

            // Menambahkan foreign key constraint ke tabel divisis
            $table->foreign('divisi_id')->references('id')->on('divisis');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evaluasis');
    }
};
