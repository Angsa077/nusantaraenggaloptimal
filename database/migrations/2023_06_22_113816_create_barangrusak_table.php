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
        Schema::create('barangrusak', function (Blueprint $table) {
            $table->id('id_barangrusak');
            $table->string('id_barang', 100)->nullable();
            $table->string('kd_barang', 100)->nullable();
            $table->bigInteger('kd_penjualan')->nullable();
            $table->bigInteger('kd_pengembalian')->nullable();
            $table->bigInteger('jumlah')->nullable();
            $table->string('gambar')->nullable();
            $table->string('catatan')->nullable();
            $table->bigInteger('id_staf')->nullable();
            $table->string('status')->nullable();
            $table->date('tgl_barangpengembalian')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barangrusak');
    }
};
