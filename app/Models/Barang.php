<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Penjualan;

class Barang extends Model
{
    use HasFactory;
    protected $table ="barang";
    protected $fillable = ['kd_barang','nama','kategori','merek','harga_beli','harga_jual','kondisi','berat','jumlah','expired','status_barang','gambar','catatan','id_staf'];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_staf', 'id');
    }

    public function penjualan()
    {
        return $this->hasMany(Penjualan::class);
    }
}
