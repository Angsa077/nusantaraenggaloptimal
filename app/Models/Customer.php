<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Province;
use App\Models\Regency;
use App\Models\District;
use App\Models\Village;
use App\Models\User;
use App\Models\Penjualan;
use App\Models\PenjualanSementara;

class Customer extends Model
{
    use HasFactory;
    protected $table ="customer";
    protected $fillable = ['kd_customer','nama_toko','nama_pemilik','no_hp','alamat','provinsi','kabupaten','kecamatan','desa','utang','gambar','catatan','id_staf'];

    public function provinces()
    {
        return $this->belongsTo(Province::class, 'provinsi', 'id');
    }

    public function regencys()
    {
        return $this->belongsTo(Regency::class, 'kabupaten', 'id');
    }

    public function districs()
    {
        return $this->belongsTo(District::class, 'kecamatan', 'id');
    }

    public function villages()
    {
        return $this->belongsTo(Village::class, 'desa', 'id');
    }

        public function user()
    {
        return $this->belongsTo(User::class, 'id_staf', 'id');
    }

    public function penjualan()
    {
        return $this->hasMany(Penjualan::class);
    }

    public function penjualansementara()
    {
        return $this->hasMany(PenjualanSementara::class);
    }
}