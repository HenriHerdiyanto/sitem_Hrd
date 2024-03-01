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
        Schema::create('kpis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kategorikpi_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('nilai1')->nullable();
            $table->unsignedBigInteger('nilai2')->nullable();
            $table->unsignedBigInteger('nilai3')->nullable();
            $table->unsignedBigInteger('nilai4')->nullable();
            $table->unsignedBigInteger('nilai5')->nullable();
            $table->unsignedBigInteger('nilai6')->nullable();
            $table->unsignedBigInteger('nilai7')->nullable();
            $table->unsignedBigInteger('nilai8')->nullable();
            $table->unsignedBigInteger('nilai9')->nullable();
            $table->unsignedBigInteger('nilai10')->nullable();
            $table->unsignedBigInteger('nilai11')->nullable();
            $table->unsignedBigInteger('nilai12')->nullable();
            $table->unsignedBigInteger('total_nilai')->nullable();
            $table->unsignedBigInteger('nilai_akhir')->nullable();
            $table->string('adjustments')->nullable();
            $table->string('persen')->nullable();
            $table->timestamps();

            // Menambahkan foreign key constraint ke tabel users
            $table->foreign('user_id')->references('id')->on('users');
            // Menambahkan foreign key constraint ke tabel kategori_kpis
            $table->foreign('kategorikpi_id')->references('id')->on('kategori_kpis');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kpis');
    }
};
