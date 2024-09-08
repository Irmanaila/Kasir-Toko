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
        Schema::create('detail_penjualan', function (Blueprint $table) {
            $table->string('id_detail_penjualan')->primary();
            $table->string('penjualan_id')->onDelete('cascade');
            $table->string('barang_id')->onDelete('cascade');
            $table->decimal('kuantitas');
            $table->decimal('harga_jual');
            $table->timestamps();
            
            $table->foreign('penjualan_id')->references('id_penjualan')->on('penjualan')->onDelete('cascade');
            $table->foreign('barang_id')->references('id_barang')->on('barang')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
