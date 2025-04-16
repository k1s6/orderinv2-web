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
        Schema::table('detail_transaksi', function (Blueprint $table) {
            $table->unsignedBigInteger('kode_product'); // Add the column
            $table->foreign('kode_product')
                ->references('kode_product')
                ->on('table_product')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('detail_transaksi', function (Blueprint $table) {
            $table->dropForeign(['kode_product']); // Drop the foreign key first
            $table->dropColumn('kode_product'); // Then drop the column
        });
    }
};
