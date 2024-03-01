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
        Schema::create('infrastrukturs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('nomor')->nullable();
            $table->date('tanggal')->nullable();
            $table->string('infrastruktur')->nullable();
            $table->string('ruangan')->nullable();
            $table->string('jenis_perbaikan')->nullable();
            $table->text('keterangan')->nullable();
            $table->string('prepared')->nullable();
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
        Schema::dropIfExists('infrastrukturs');
    }
};
