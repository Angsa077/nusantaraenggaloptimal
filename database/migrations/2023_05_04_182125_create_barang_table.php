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
        Schema::create('barang', function (Blueprint $table) {
            $table->string('kd_barang', 100)->nullable();
            $table->string('nama', 100)->nullable();
            $table->string('kategori', 100)->nullable();
            $table->string('merek', 100)->nullable();
            $table->double('harga_beli')->nullable();
            $table->double('harga_jual')->nullable();
            $table->string('kondisi', 100)->nullable();
            $table->double('berat')->nullable();
            $table->date('expired')->nullable();
            $table->bigInteger('jumlah')->nullable();
            $table->string('status_barang', 100)->nullable();
            $table->string('gambar')->nullable();
            $table->string('catatan')->nullable();
            $table->bigInteger('id_staf')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barang');
    }
};
