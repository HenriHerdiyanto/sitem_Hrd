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
        Schema::create('pinjamen', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->date('mulai_kerja');
            $table->integer('jumlah_pinjam');
            $table->integer('jangka_pelunasan');
            $table->integer('jumlah_cicilan');
            $table->date('tanggal_pinjam');
            $table->date('pelunasan_terakhir');
            $table->date('gaji');
            $table->string('keperluan');
            $table->string('disetujui');
            $table->string('status');
            $table->timestamps();

            // $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pinjamen');
    }
};
