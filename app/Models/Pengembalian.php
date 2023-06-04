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
        'tgl_pengembalian',
        'jumlah_barang',
        'bukti_pengembalian',
        'status_persetujuan',
        'catatan',
        'id_staf'
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class, 'id_staf', 'id');
    }

    public function penjualan()
    {
        return $this->hasMany(Penjualan::class);
    }

    // public function penjualan()
    // {
    //     return $this->belongsTo(Penjualan::class, 'kd_penjualan', 'kd_penjualan');
    // }
}
