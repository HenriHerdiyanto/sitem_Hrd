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
        Schema::create('kategori_kpis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('divisi_id')->nullable();
            $table->string('nama_kpi')->nullable();
            $table->string('pertanyaan1')->nullable();
            $table->string('pertanyaan2')->nullable();
            $table->string('pertanyaan3')->nullable();
            $table->string('pertanyaan4')->nullable();
            $table->string('pertanyaan5')->nullable();
            $table->string('pertanyaan6')->nullable();
            $table->string('pertanyaan7')->nullable();
            $table->string('pertanyaan8')->nullable();
            $table->string('pertanyaan9')->nullable();
            $table->string('pertanyaan10')->nullable();
            $table->string('pertanyaan11')->nullable();
            $table->string('pertanyaan12')->nullable();
            $table->timestamps();


            // Menambahkan foreign key constraint ke tabel divisis
            $table->foreign('divisi_id')->references('id')->on('divisis');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kategori_kpis');
    }
};
