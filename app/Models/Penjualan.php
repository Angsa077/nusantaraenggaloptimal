<?php

namespace App\Models;
use App\Models\User;
use App\Models\Barang;
use App\Models\Customer;
use App\Models\Pembayaran;
use App\Models\Pengembalian;
use App\Models\Pengiriman;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    use HasFactory;

    protected $table ="penjualan";
    protected $fillable = 
    [
        'kd_penjualan',
        'kd_barang',
        'kd_customer',
        'jumlah_barang',
        'total_bayar',
        'total_harga',
        'masa_garansi',
        'tgl_penjualan',
        'status_pembayaran',
        'status_pengiriman',
        'status_pengembalian',
        'status_persetujuan',
        'catatan',
        'id_staf'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_staf', 'id');
    }

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'kd_barang', 'kd_barang');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'kd_customer', 'kd_customer');
    }

    public function pembayaran()
    {
        return $this->belongsTo(Pembayaran::class, 'id_aset', 'id_aset');
    }

    public function pengembalian()
    {
        return $this->belongsTo(Pengembalian::class, 'id_aset', 'id_aset');
    }

    public function pengiriman()
    {
        return $this->belongsTo(Pengiriman::class, 'id_aset', 'id_aset');
    }
}
