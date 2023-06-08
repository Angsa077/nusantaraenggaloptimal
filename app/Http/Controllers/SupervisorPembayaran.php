<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Pembayaran;
use App\Models\Penjualan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class SupervisorPembayaran extends Controller
{

    public function index()
    {
        $penjualan = Penjualan::with(['barangterjual', 'customer', 'user'])->get();
        $data = Pembayaran::with('penjualan')->get()->groupBy('penjualan.kd_penjualan');
        return view('supervisor.pembayaran.index', ['data' => $data, 'penjualan' => $penjualan]);
    }

    public function show(string $id)
    {
        $user = User::all();
        $spv = User::all();
        $penjualan = Penjualan::with(['barangterjual', 'customer', 'user'])->first();
        $pembayaran = Pembayaran::all();
        $data = Pembayaran::where('kd_penjualan', $id)->first();
        return view('supervisor.pembayaran.show', [
            'data' => $data, 'pembayaran' => $pembayaran, 'user' => $user, 'spv' => $spv, 'penjualan' => $penjualan
        ]);
    }

    public function edit(string $id)
    {
        $user = User::all();
        $spv = User::all();
        $penjualan = Penjualan::with(['barangterjual', 'customer', 'user'])->first();
        $data = Pembayaran::where('kd_pembayaran', $id)->first();
        return view('supervisor.pembayaran.edit', [
            'data' => $data, 'user' => $user, 'spv' => $spv, 'penjualan' => $penjualan
        ]);
    }


    public function update(Request $request, string $id)
    {
        $pembayaran = Pembayaran::where('kd_pembayaran', $id)->first();
        $penjualan = Penjualan::where('kd_penjualan', $pembayaran->kd_penjualan)->first();
        $customer = Customer::where('kd_customer', $penjualan->kd_customer)->first();
        $total_bayar = $penjualan->total_bayar + $pembayaran->total_bayar;
        $sisa_bayar = $penjualan->total_harga - $total_bayar;

        if ($penjualan->total_harga  == $total_bayar) {
            $status_pembayaran = "lunas";
        } elseif ($penjualan->total_harga > $total_bayar) {
            $status_pembayaran = "utang";
        }

        $data_customer = [];
        $data_penjualan = [];
        $data_pembayaran = [];

        if ($request->simpan == 'Setujui') {
            $data_customer = [
                'utang' => $customer->utang - $pembayaran->total_bayar,
            ];

            $data_penjualan = [
                'status_pembayaran' => $status_pembayaran,
                'total_bayar'  => $total_bayar,
            ];

            $data_pembayaran = [
                'sisa_bayar'  => $sisa_bayar,
                'status_persetujuan'  => 'disetujui',
                'id_spv' => Auth::user()->id,
            ];
        } elseif ($request->simpan == 'Tolak') {
            $data_pembayaran = [
                'status_persetujuan' => 'ditolak',
                'id_spv' => Auth::user()->id,
            ];
        }

        Customer::where('kd_customer', $penjualan->kd_customer)->update($data_customer);
        Penjualan::where('kd_penjualan', $pembayaran->kd_penjualan)->update($data_penjualan);
        Pembayaran::where('kd_pembayaran', $id)->update($data_pembayaran);
        return redirect()->route('salespembayaran.index')->with('success', 'Berhasil memperbarui Data Pembayaran');
    }
}
