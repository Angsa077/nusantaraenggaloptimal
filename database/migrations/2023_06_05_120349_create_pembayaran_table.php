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
        Schema::create('pembayaran', function (Blueprint $table) {
            $table->id('kd_pembayaran');
            $table->bigInteger('kd_penjualan')->nullable();
            $table->date('tgl_pembayaran')->nullable();
            $table->double('total_bayar')->nullable();
            $table->double('sisa_bayar')->nullable();
            $table->string('bukti_pembayaran')->nullable();
            $table->string('status_persetujuan', 20)->nullable();
            $table->string('catatan')->nullable();
	        $table->bigInteger('id_staf')->nullable();
            $table->bigInteger('id_spv')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayaran');
    }
};
