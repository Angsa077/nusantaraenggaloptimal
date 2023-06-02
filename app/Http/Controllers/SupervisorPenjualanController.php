<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Customer;
use App\Models\Pembayaran;
use App\Models\Pengembalian;
use App\Models\Pengiriman;
use App\Models\Penjualan;
use App\Models\PenjualanSementara;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class SupervisorPenjualanController extends Controller
{

    public function index()
    {
        $data = Penjualan::with(['barang', 'customer', 'user'])->orderBy('kd_penjualan')->get();
        return view('supervisor.penjualan.index', ['data' => $data]);
    }

    public function edit(string $id)
    {
        $user = User::all();
        $barang = Barang::all();
        $customer = Customer::all();
        $pembayaran = Pembayaran::all();
        $pengiriman = Pengiriman::all();
        $pengembalian = Pengembalian::all();
        $data = Penjualan::where('kd_penjualan', $id)->first();
        return view('supervisor.penjualan.edit', [
            'data' => $data, 'user' => $user, 'barang' => $barang, 'customer' => $customer,
            'pembayaran' => $pembayaran, 'pengiriman' => $pengiriman, 'pengembalian' => $pengembalian
        ]);
    }

    public function update(Request $request, string $id)
    {
        $penjualan = Penjualan::where('kd_penjualan', $id)->first();
        $data_penjualan = [];
        $data_pengiriman = [];
    
        if ($request->simpan == 'Setujui') {
            $data_penjualan = [
                'status_persetujuan' => 'disetujui',
                'status_pengiriman' => 'barangsiap',
            ];
    
            $data_pengiriman = [
                'kd_penjualan' => $penjualan->kd_penjualan,
            ];
        } elseif ($request->simpan == 'Tolak') {
            $data_penjualan = [
                'status_persetujuan' => 'ditolak',
                'catatan' => $request->catatan,
            ];
        }
    
        Penjualan::where('kd_penjualan', $id)->update($data_penjualan);
    
        if (!empty($data_pengiriman)) {
            Pengiriman::create($data_pengiriman);
        }
    
        return redirect()->route('supervisorpenjualan.index')->with('success', 'Barang Berhasil Di Checking');
    }
    
}
