<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\BarangTerjual;
use App\Models\Pengembalian;
use App\Models\Pengiriman;
use App\Models\Penjualan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class SupervisorPengembalian extends Controller
{
    public function index()
    {
        $penjualan = Penjualan::with(['barangterjual', 'customer', 'user'])->get();
        $data = Pengembalian::with('penjualan')->get();
        return view('supervisor.pengembalian.index', ['data' => $data, 'penjualan' => $penjualan]);
    }

    public function edit(string $id)
    {
        $user = User::all();
        $kurir = User::all();
        $spv = User::all();
        $admin = User::all();
        $pengiriman = Pengiriman::all();
        $penjualan = Penjualan::with(['barangterjual', 'customer', 'user'])->first();
        $data = Pengembalian::where('kd_pengembalian', $id)->first();
        $barangterjual = BarangTerjual::where('id_barangterjual', $data->id_barangterjual)->first();
        $barang = Barang::where('id_barang', $barangterjual->id_barang)->first();

        return view('supervisor.pengembalian.edit', [
            'data' => $data, 'barangterjual' => $barangterjual, 'barang' => $barang, 'user' => $user, 'kurir' => $kurir, 'spv' => $spv, 'admin' => $admin, 'pengiriman' => $pengiriman, 'penjualan' => $penjualan
        ]);
    }

    public function update(Request $request, string $id)
    {
        $pengembalian = Pengembalian::where('kd_pengembalian', $id)->first();

        $data_penjualan = [];
        $data_pengembalian = [];

        if ($request->simpan == 'Setujui') {
            $data_penjualan = [
                'status_pengembalian' => 'barangsiap',
            ];

            $data_pengembalian = [
                'status_persetujuan' => 'disetujui',
                'id_spv' => Auth::user()->id,
            ];
        } elseif ($request->simpan == 'Tolak') {
            $data_pengembalian = [
                'status_persetujuan' => 'ditolak',
                'id_spv' => Auth::user()->id,
            ];
        }

        Pengembalian::where('kd_pengembalian', $id)->update($data_pengembalian);
        Penjualan::where('kd_penjualan', $pengembalian->kd_penjualan)->update($data_penjualan);
        return redirect()->route('supervisorpengembalian.index')->with('success', 'Berhasil Mengisi Pengajuan Pengembalian');
    }
}
