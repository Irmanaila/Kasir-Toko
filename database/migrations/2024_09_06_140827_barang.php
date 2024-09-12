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
        Schema::create('barang', function (Blueprint $table){
            $table->string('id_barang')->primary();
            $table->string('kode_barang');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('nama_barang');
            $table->string('foto');
            $table->decimal('harga_modal');
            $table->decimal('harga_jual');
            $table->timestamps();
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
