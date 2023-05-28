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
        Schema::create('pengiriman', function (Blueprint $table) {
            $table->id('kd_pengiriman');
            $table->bigInteger('kd_penjualan')->nullable();
            $table->date('tgl_pengiriman')->nullable();
            $table->date('tgl_sampai')->nullable();
            $table->string('nama_penerima', 20)->nullable();
            $table->string('bukti_pengiriman')->nullable();
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
        Schema::dropIfExists('pengiriman');
    }
};
