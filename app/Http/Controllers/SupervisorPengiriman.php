<?php

namespace App\Http\Controllers;

use App\Models\BarangTerjual;
use App\Models\Pengiriman;
use App\Models\Penjualan;
use App\Models\User;
use Illuminate\Http\Request;

class SupervisorPengiriman extends Controller
{
    public function index()
    {
        $penjualan = Penjualan::with(['barangterjual', 'customer', 'user'])->get();
        $data = Pengiriman::with('penjualan')->get();

        return view('supervisor.pengiriman.index', ['data' => $data, 'penjualan' => $penjualan]);
    }

    public function show(string $id)
    {
        $user = User::all();
        $penjualan = Penjualan::with(['barangterjual', 'customer', 'user'])->first();
        $data = Pengiriman::where('kd_pengiriman', $id)->first();

        $barangterjual = BarangTerjual::where('kd_penjualan', $data->kd_penjualan)->get();
        return view('supervisor.pengiriman.show', ['data' => $data, 'barangterjual' => $barangterjual, 'user' => $user, 'penjualan' => $penjualan]);
    }
}
