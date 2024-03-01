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
        Schema::create('payrolls', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('pendidikan')->nullable();
            $table->string('status_ptkp')->nullable();
            $table->string('cabang')->nullable();
            $table->string('group')->nullable();
            $table->unsignedBigInteger('gaji_pokok')->nullable();
            $table->string('tempat_kerja')->nullable();
            $table->unsignedBigInteger('tunjangan_jabatan')->nullable();
            $table->unsignedBigInteger('tunjangan_pulsa')->nullable();
            $table->unsignedBigInteger('lain_lain')->nullable();
            $table->unsignedBigInteger('tunjangan_pendidikan')->nullable();
            $table->unsignedBigInteger('uang_makan')->nullable();
            $table->unsignedBigInteger('uang_transport')->nullable();
            $table->unsignedBigInteger('total_gaji')->nullable();
            $table->unsignedBigInteger('lembur')->nullable();
            $table->unsignedBigInteger('dinas')->nullable();
            $table->unsignedBigInteger('cuti_tahunan')->nullable();
            $table->unsignedBigInteger('thr')->nullable();
            $table->unsignedBigInteger('tunjanganpph21')->nullable();
            $table->unsignedBigInteger('potonganpph21')->nullable();
            $table->unsignedBigInteger('total_tunjangan')->nullable();
            $table->unsignedBigInteger('total_gaji_tunjangan')->nullable();
            $table->unsignedBigInteger('referal_client')->nullable();
            $table->unsignedBigInteger('insentif_kk')->nullable();
            $table->unsignedBigInteger('insentif_spv')->nullable();
            $table->unsignedBigInteger('insentif_staff')->nullable();
            $table->unsignedBigInteger('insentif_spt_op')->nullable();
            $table->unsignedBigInteger('insentif_spt_badan')->nullable();
            $table->unsignedBigInteger('insentif_spt')->nullable();
            $table->unsignedBigInteger('komisi_marketing')->nullable();
            $table->unsignedBigInteger('total_insentif')->nullable();
            $table->unsignedBigInteger('total_pendapatan')->nullable();
            $table->unsignedBigInteger('terlambat')->nullable();
            $table->unsignedBigInteger('cuti_bersama')->nullable();
            $table->unsignedBigInteger('cuti')->nullable();
            $table->unsignedBigInteger('sakit')->nullable();
            $table->unsignedBigInteger('izin')->nullable();
            $table->unsignedBigInteger('alpha')->nullable();
            $table->unsignedBigInteger('pinjaman')->nullable();
            $table->unsignedBigInteger('bpjs_perusahaan')->nullable();
            $table->unsignedBigInteger('bpjs_karyawan')->nullable();
            $table->unsignedBigInteger('jkk')->nullable();
            $table->unsignedBigInteger('jkm')->nullable();
            $table->unsignedBigInteger('jht_37')->nullable();
            $table->unsignedBigInteger('ditanggung_perusahaan')->nullable();
            $table->unsignedBigInteger('ditanggung_karyawan')->nullable();
            $table->unsignedBigInteger('total_pengurangan')->nullable();
            $table->unsignedBigInteger('total_gaji_bersih')->nullable();


            // Menambahkan foreign key constraint ke tabel users
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payrolls');
    }
};
