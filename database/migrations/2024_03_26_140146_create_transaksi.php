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
        Schema::create('transaksi', function (Blueprint $table) {
            $table->bigIncrements('kode_transaksi');
            $table->string('nama')->nullable(false);
            // $table->dateTime('waktu')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->enum('status', ['diterima', 'ditolak', 'dikonfirmasi', 'selesai'])->nullable(false);
            $table->integer('jumlah')->nullable(false);
            $table->bigInteger('total')->nullable(false);
            $table->String('catatan')->nullable(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi');
    }
};
