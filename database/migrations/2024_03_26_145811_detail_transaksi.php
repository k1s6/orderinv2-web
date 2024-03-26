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
        Schema::create('detail_transaksi', function (Blueprint $table) {
            // Schema::create('detail_transaksi', function (Blueprint $table) {
                $table->unsignedBigInteger('kode_transaksi');
                $table->foreign('kode_transaksi')->references('kode_transaksi')->on('transaksi');
                $table->unsignedBigInteger('kode_product');
                $table->foreign('kode_product')->references('kode_product')->on('table_product');
                $table->integer('jumlah');
                $table->bigInteger('harga');
                $table->bigInteger('total');
            // });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_transaksi');
    }
};
