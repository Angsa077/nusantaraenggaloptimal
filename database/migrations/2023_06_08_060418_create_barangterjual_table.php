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
        Schema::create('barangterjual', function (Blueprint $table) {
            $table->id('id_barang');
            $table->string('kd_barang', 100)->nullable();
            $table->bigInteger('kd_penjualan')->nullable();
            $table->bigInteger('kd_pengembalian')->nullable();
            $table->bigInteger('jumlah')->nullable();
            $table->string('masa_garansi', 20)->nullable();
            $table->date('tgl_barangterjual')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barangterjual');
    }
};
