<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Penjualan;

class Pembayaran extends Model
{
    use HasFactory;

    protected $table ="pembayaran";
    protected $fillable = 
    [
        'kd_pembayaran',
        'kd_penjualan',
        'tgl_pembayaran',
        'total_bayar',
        'sisa_bayar',
        'bukti_pembayaran',
        'status_persetujuan',
        'catatan',
        'id_staf'
    ];

    public function penjualan()
    {
        return $this->hasMany(Penjualan::class);
    }
}
