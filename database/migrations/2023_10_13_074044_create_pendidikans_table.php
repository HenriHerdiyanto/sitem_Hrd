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
        Schema::create('pendidikans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('jenjang_pendidikan')->nullable();
            $table->string('instansi_pendidikan')->nullable();
            $table->string('jurusan')->nullable();
            $table->string('tahun_masuk')->nullable();
            $table->string('tahun_keluar')->nullable();
            $table->integer('index_nilai')->nullable();
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
        Schema::dropIfExists('pendidikans');
    }
};
