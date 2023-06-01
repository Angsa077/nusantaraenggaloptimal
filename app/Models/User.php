<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Customer;
use App\Models\Barang;
use App\Models\Penjualan;
use App\Models\Pembayaran;
use App\Models\Pengiriman;
use App\Models\Pengembalian;
use App\Models\PenjualanSementara;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'level',
        'nik',
        'npwp',
        'nip',
        'no_hp',
        'alamat',
        'tg_lahir',
        'tp_lahir',
        'jk',
        'tgl_masuk',
        'tgl_keluar',
        'status_akun',
        'id_admin',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function customer()
    {
        return $this->hasMany(Customer::class);
    }

    public function barang()
    {
        return $this->hasMany(Barang::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_admin', 'id');
    }

    public function penjualan()
    {
        return $this->hasMany(Penjualan::class);
    }

    public function pembayaran()
    {
        return $this->hasMany(Pembayaran::class);
    }
    
    public function pengembalian()
    {
        return $this->hasMany(Pengembalian::class);
    }

    public function pengiriman()
    {
        return $this->hasMany(Pengiriman::class);
    }

    public function penjualansementara()
    {
        return $this->hasMany(PenjualanSementara::class);
    }
}
