<?php

namespace App\Models;

use App\Models\User;
use App\Models\Barang;
use App\Models\BarangTerjual;
use App\Models\Customer;
use App\Models\Pembayaran;
use App\Models\Pengembalian;
use App\Models\Pengiriman;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    use HasFactory;

    protected $table = "penjualan";
    protected $fillable =
    [
        'kd_penjualan',
        'kd_customer',
        'jumlah_barang',
        'total_bayar',
        'total_harga',
        'tgl_penjualan',
        'status_pembayaran',
        'status_pengiriman',
        'status_pengembalian',
        'status_persetujuan',
        'catatan',
        'id_staf',
        'id_admin',
        'id_spv',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_staf', 'id');
    }

    public function admin()
    {
        return $this->belongsTo(User::class, 'id_admin', 'id');
    }

    public function spv()
    {
        return $this->belongsTo(User::class, 'id_spv', 'id');
    }

    public function barangterjual()
    {
        return $this->belongsTo(BarangTerjual::class, 'kd_penjualan', 'kd_penjualan');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'kd_customer', 'kd_customer');
    }

    public function pembayaran()
    {
        return $this->belongsTo(Pembayaran::class, 'kd_penjualan', 'kd_penjualan');
    }

    public function pengembalian()
    {
        return $this->belongsTo(Pengembalian::class, 'kd_penjualan', 'kd_penjualan');
    }

    public function pengiriman()
    {
        return $this->belongsTo(Pengiriman::class, 'kd_penjualan', 'kd_penjualan');
    }

    // public function pembayaran()
    // {
    //     return $this->hasMany(Pembayaran::class);
    // }

    // public function pengembalian()
    // {
    //     return $this->hasMany(Pengembalian::class);
    // }

    // public function pengiriman()
    // {
    //     return $this->hasMany(Pengiriman::class);
    // }
}
