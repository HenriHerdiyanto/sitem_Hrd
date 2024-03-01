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
        Schema::create('perjalanan_dinas', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('divisi_id');
            // $table->string('name');
            $table->string('type');
            $table->string('project');
            $table->string('tujuan');
            $table->string('jumlah_personel');
            $table->string('nama_personel');
            $table->string('jenis_perjalanan');
            $table->string('kota_tujuan');
            $table->date('tanggal_berangkat');
            $table->date('tanggal_pulang');
            $table->date('kota_pulang');
            $table->string('transportasi');
            $table->string('hotel');
            $table->string('bagasi');
            $table->string('cash_advance');
            $table->string('keterangan')->nullable();
            $table->string('diminta_oleh')->nullable();
            $table->string('diketahui_oleh')->nullable();
            $table->string('disetujui_oleh')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perjalanan_dinas');
    }
};
