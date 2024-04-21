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
        Schema::create('table_product', function (Blueprint $table) {
            $table->bigIncrements('kode_product');
            $table->String('nama_product',100)->nullable(false);
            $table->text('deskripsi');
            $table->enum('stock_product', ['tersedia','habis'])->nullable(false);
            $table->integer('harga_product')->nullable(false);
            $table->enum('jenis_product', ['snack','makanan','steak','minuman'])->nullable(false);
            $table->String('gambar_product')->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_product');
    }
};
