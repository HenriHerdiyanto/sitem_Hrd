<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
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
        // Schema::table('payrolls', function (Blueprint $table) {
        //     $table->dropColumn('lain-lain');
        // });
        // tambah kolom
        Schema::table('payrolls', function (Blueprint $table) {
            $table->timestamp('created_at')->nullable()->after('total_gaji_bersih');
            $table->timestamp('updated_at')->nullable()->after('created_at');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('update_payrol');
    }
};
