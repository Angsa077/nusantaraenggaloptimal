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
        Schema::create('penjualansementara', function (Blueprint $table) {
            $table->id('kd_penjualan');
            $table->string('kd_barang', 20)->nullable();
            $table->string('kd_customer', 20)->nullable();
            $table->bigInteger('jumlah_barang')->nullable();
            $table->double('total_harga')->nullable();
            $table->string('masa_garansi', 20)->nullable();
            $table->bigInteger('id_staf')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penjualansementara');
    }
};
