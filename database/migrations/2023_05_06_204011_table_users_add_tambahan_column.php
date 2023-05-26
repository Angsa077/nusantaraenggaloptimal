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
        Schema::table('users', function (Blueprint $table) {
            $table->string('level')->nullable();
            $table->string('nik', 20)->unique()->nullable();
            $table->string('npwp', 20)->unique()->nullable();
            $table->string('nip', 20)->unique()->nullable();
            $table->string('no_hp', 20)->nullable();
            $table->string('alamat')->nullable();
            $table->string('tp_lahir')->nullable();
            $table->date('tg_lahir')->nullable();
            $table->string('jk', 20)->nullable();
            $table->date('tgl_masuk')->nullable();
            $table->date('tgl_keluar')->nullable();
            $table->string('status_akun', 20)->nullable();
            $table->bigInteger('id_admin')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
