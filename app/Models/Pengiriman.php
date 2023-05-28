<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Penjualan;

class Pengiriman extends Model
{
    use HasFactory;

    protected $table ="pengiriman";
    protected $fillable = 
    [
        'kd_pengiriman',
        'kd_penjualan',
        'tgl_pengiriman',
        'tgl_sampai',
        'nama_penerima',
        'bukti_pengiriman',
        'status_persetujuan',
        'catatan',
        'id_staf'
    ];

    public function penjualan()
    {
        return $this->hasMany(Penjualan::class);
    }
}
