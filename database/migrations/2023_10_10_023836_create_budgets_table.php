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
        Schema::create('budgets', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('divisi_id');
            $table->string('jenis_item');
            $table->date('tanggal');
            $table->string('barang1')->nullable();
            $table->bigInteger('harga1')->nullable();
            $table->string('barang2')->nullable();
            $table->bigInteger('harga2')->nullable();
            $table->string('barang3')->nullable();
            $table->bigInteger('harga3')->nullable();
            $table->string('barang4')->nullable();
            $table->bigInteger('harga4')->nullable();
            $table->bigInteger('total_harga')->nullable();
            $table->string('diketahui')->nullable();
            $table->string('disetujui')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('budgets');
    }
};
