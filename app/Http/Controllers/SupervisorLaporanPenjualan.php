<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use Illuminate\Http\Request;

class SupervisorLaporanPenjualan extends Controller
{
    public function index()
    {
        $data = Penjualan::with(['barang', 'customer', 'user'])->orderBy('kd_penjualan')->get();
        return view('supervisor.laporanpenjualan.index', ['data' => $data]);
    }

    public function show(string $id)
    {
        //
    }
}
