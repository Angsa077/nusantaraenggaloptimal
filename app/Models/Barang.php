<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\BarangRusak;
use App\Models\BarangTerjual;
use App\Models\Penjualan;
use App\Models\PenjualanSementara;

class Barang extends Model
{
    use HasFactory;
    protected $table = "barang";
    protected $fillable = ['id_barang', 'kd_barang', 'nama', 'merek', 'harga_beli', 'harga_jual', 'jumlah', 'expired', 'status_barang', 'gambar', 'catatan', 'id_staf', 'id_spv'];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_staf', 'id');
    }

    public function spv()
    {
        return $this->belongsTo(User::class, 'id_spv', 'id');
    }

    public function penjualan()
    {
        return $this->hasMany(Penjualan::class);
    }

    public function barangrusak()
    {
        return $this->hasMany(BarangRusak::class);
    }

    public function barangterjual()
    {
        return $this->hasMany(BarangTerjual::class);
    }

    public function penjualanbarang()
    {
        return $this->belongsTo(Penjualan::class, 'kd_barang', 'kd_barang');
    }

    public function penjualansementara()
    {
        return $this->hasMany(PenjualanSementara::class);
    }
}
