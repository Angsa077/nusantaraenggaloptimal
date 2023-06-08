<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Penjualan;
use App\Models\User;

class Pengembalian extends Model
{
    use HasFactory;

    protected $table ="pengembalian";
    protected $fillable = 
    [
        'kd_pengembalian',
        'kd_penjualan',
        'id_barangterjual',
        'tgl_pengembalian',
        'tgl_penjemputan',
        'tgl_selesai',
        'jumlah_barang',
        'bukti_pengembalian',
        'bukti_penyerahan',
        'status_persetujuan',
        'catatan',
        'id_staf',
        'id_kurir',
        'id_spv',
        'id_admin',
    ];

    public function barangterjual()
    {
        return $this->belongsTo(BarangTerjual::class, 'id_barangterjual', 'id_barangterjual');
    }
    
    public function user()
    {
        return $this->belongsTo(User::class, 'id_staf', 'id');
    }

    public function kurir()
    {
        return $this->belongsTo(User::class, 'id_kurir', 'id');
    }

    public function spv()
    {
        return $this->belongsTo(User::class, 'id_spv', 'id');
    }

    public function admin()
    {
        return $this->belongsTo(User::class, 'id_admin', 'id');
    }

    // public function penjualan()
    // {
    //     return $this->hasMany(Penjualan::class);
    // }

    public function penjualan()
    {
        return $this->belongsTo(Penjualan::class, 'kd_penjualan', 'kd_penjualan');
    }
}
