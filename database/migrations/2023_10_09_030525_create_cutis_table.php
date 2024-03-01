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
        Schema::create('cutis', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('divisi_id');
            $table->integer('type');
            $table->integer('hak_cuti');
            $table->integer('ambil_cuti');
            $table->integer('sisa_cuti');
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->string('alasan_cuti');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cutis');
    }
};
