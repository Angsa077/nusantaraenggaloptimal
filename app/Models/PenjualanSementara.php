<?php

namespace App\Models;
use App\Models\Barang;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenjualanSementara extends Model
{
    use HasFactory;

    protected $table ="penjualansementara";
    protected $fillable = 
    [
        'kd_penjualansementara',
        'kd_penjualan',
        'kd_barang',
        'kd_customer',
        'jumlah_barang',
        'total_harga',
        'masa_garansi',
        'id_staf',
    ];

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'kd_barang', 'kd_barang');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'kd_customer', 'kd_customer');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_staf', 'id');
    }
}
