<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Penjualan;
use App\Models\User;

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
        'bukti_penerimaan',
        'catatan',
        'id_staf'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_staf', 'id');
    }
    
    public function penjualan()
    {
        return $this->belongsTo(Penjualan::class, 'kd_penjualan', 'kd_penjualan');
    }
}
