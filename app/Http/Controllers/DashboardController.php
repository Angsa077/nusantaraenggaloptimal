<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\BarangTerjual;
use App\Models\Pembayaran;
use App\Models\Pengembalian;
use App\Models\Pengiriman;
use App\Models\Penjualan;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $now = Carbon::now('Asia/Jakarta');
        $barangterjual = BarangTerjual::all();
        $barang = Barang::all();
        $pengiriman = Pengiriman::whereDate('tgl_pengiriman', $now->format('Y-m-d'))->orderBy('kd_pengiriman', 'desc')->get();
        $pembayaran = Pembayaran::whereDate('tgl_pembayaran', $now->format('Y-m-d'))->orderBy('kd_pembayaran', 'desc')->get();
        $pengembalian = Pengembalian::whereDate('tgl_pengembalian', $now->format('Y-m-d'))->orderBy('kd_pengembalian', 'desc')->get();
        $user = User::all();
        $penjualan = Penjualan::whereDate('tgl_penjualan', $now->format('Y-m-d'))->orderBy('kd_penjualan', 'desc')->get();
        
        return view('dashboard', [
            'barangterjual' => $barangterjual,
            'barang' => $barang,
            'pengiriman' => $pengiriman,
            'pembayaran' => $pembayaran,
            'pengembalian' => $pengembalian,
            'user' => $user,
            'penjualan' => $penjualan
        ]);
    }
}
