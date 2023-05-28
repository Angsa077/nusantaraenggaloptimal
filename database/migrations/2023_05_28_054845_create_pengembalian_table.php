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
        Schema::create('pengembalian', function (Blueprint $table) {
            $table->id('kd_pengembalian');
            $table->bigInteger('kd_penjualan')->nullable();
            $table->date('tgl_pengembalian')->nullable();
            $table->bigInteger('jumlah_barang')->nullable();
            $table->string('bukti_pengembalian')->nullable();
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
        Schema::dropIfExists('pengembalian');
    }
};
