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
        // ubah nama kolom
        // Schema::table('payrolls', function (Blueprint $table) {
        //     $table->renameColumn('lain-lain', 'lain_lain')->change();
        // });
        // update kolom
        // Schema::table('payrolls', function (Blueprint $table) {
        //     $table->integer('lain-lain')->change();
        // });
        // tambah kolom
        // Schema::table('payrolls', function (Blueprint $table) {
        //     $table->integer('lain_lain')->after('tunjangan_pulsa');
        // });
        // //hapus kolom
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('no_ktp');
            $table->dropColumn('group_karyawan');
            $table->dropColumn('tempat_bekerja');
        });
        // tambah kolom
        Schema::table('users', function (Blueprint $table) {
            $table->bigInteger('tunjangan_lain')->nullable()->after('tunjangan_pendidikan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('update_users');
    }
};
