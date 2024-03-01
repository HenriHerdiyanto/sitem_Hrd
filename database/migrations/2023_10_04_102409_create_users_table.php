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
        Schema::create('users', function (Blueprint $table) {

            $table->id();
            $table->unsignedBigInteger('divisi_id')->default(0);
            $table->bigInteger('nomor_induk')->nullable();
            $table->string('name');
            $table->enum('jenis_kelamin', ['laki-laki', 'perempuan'])->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('alamat_ktp')->nullable();
            $table->string('alamat_domisili')->nullable();
            $table->string('no_hp')->nullable();
            $table->string('no_ktp')->nullable();
            $table->string('agama')->nullable();
            $table->string('gol_darah')->nullable();
            $table->string('status_pernikahan')->nullable();
            $table->enum('status_karyawan', ['aktif', 'nonaktif'])->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->tinyInteger('type')->default(0);
            /* Users: 0=>User, 1=>Admin, 2=>Manager */
            $table->string('foto_karyawan')->nullable();
            $table->bigInteger('gaji')->nullable();
            $table->bigInteger('uang_makan')->nullable();
            $table->bigInteger('uang_transport')->nullable();
            $table->date('mulai_kerja')->nullable();
            $table->date('akhir_kerja')->nullable();
            $table->string('kontrak_kerja')->nullable();
            $table->rememberToken();
            $table->timestamps();

            // $table->foreign('divisi_id')->references('id')->on('divisis');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
