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
        Schema::create('penjualan', function (Blueprint $table) {
            $table->id('kd_penjualan');
            $table->string('kd_barang', 20)->nullable();
            $table->string('kd_customer', 20)->nullable();
            $table->bigInteger('jumlah_barang')->nullable();
            $table->double('total_bayar')->nullable();
            $table->double('total_harga')->nullable();
            $table->string('masa_garansi', 20)->nullable();
            $table->date('tgl_penjualan')->nullable();
            $table->string('status_pembayaran', 20)->nullable();
            $table->string('status_pengiriman', 20)->nullable();
            $table->string('status_pengembalian', 20)->nullable();
            $table->string('status_persetujuan', 20)->nullable();
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
        Schema::dropIfExists('penjualan');
    }
};
