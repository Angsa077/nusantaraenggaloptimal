<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use App\Models\User;
use App\Models\Barang;
use App\Models\Penjualan;
use App\Models\Pengembalian;

class BarangTerjual extends Model
{
    use HasFactory;
    protected $table = "barangterjual";
    protected $fillable =
    [
        'id_barang',
        'kd_barang',
        'kd_penjualan',
        'kd_pengembalian',
        'jumlah',
        'masa_garansi',
        'tgl_barangterjual',
    ];

    // public function user()
    // {
    //     return $this->belongsTo(User::class, 'id_staf', 'id');
    // }

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'id_barang', 'id_barang');
    }

    public function penjualan()
    {
        return $this->belongsTo(Penjualan::class, 'kd_penjualan', 'kd_penjualan');
    }

    public function pengembalian()
    {
        return $this->belongsTo(Pengembalian::class, 'kd_pengembalian', 'kd_pengembalian');
    }
}
