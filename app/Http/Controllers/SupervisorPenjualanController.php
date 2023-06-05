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
        $spv = User::all();
        $admin = User::all();
        $barang = Barang::all();
        $customer = Customer::all();
        $pembayaran = Pembayaran::all();
        $pengiriman = Pengiriman::all();
        $pengembalian = Pengembalian::all();
        $data = Penjualan::where('kd_penjualan', $id)->first();
        return view('supervisor.penjualan.edit', [
            'data' => $data, 'user' => $user, 'spv' => $spv, 'admin' => $admin, 'barang' => $barang, 'customer' => $customer,
            'pembayaran' => $pembayaran, 'pengiriman' => $pengiriman, 'pengembalian' => $pengembalian
        ]);
    }

    public function update(Request $request, string $id)
    {
        $penjualan = Penjualan::where('kd_penjualan', $id)->first();
        $id_barang = $penjualan->id_barang;
        $kd_customer = $penjualan->kd_customer;

        $barang = Barang::where('id_barang', $id_barang)->first();
        $customer = Customer::where('kd_customer', $kd_customer)->first();
        $pembayaran = Pembayaran::where('kd_penjualan', $id)->first();

        $data_penjualan = [];
        $data_pembayaran = [];
        $data_pengiriman = [];
        $data_barang = [];
        $data_customer = [];
    
        if ($request->simpan == 'Setujui') {
            $data_penjualan = [
                'status_persetujuan' => 'disetujui',
                'status_pengiriman' => 'barangsiap',
                'id_spv'  => Auth::user()->id,
            ];

            $data_pembayaran = [
                'status_persetujuan' => 'disetujui',
                'id_spv'  => Auth::user()->id,
            ];

            $data_pengiriman = [
                'kd_penjualan' => $penjualan->kd_penjualan,
            ];

            $data_pengiriman = [
                'kd_penjualan' => $penjualan->kd_penjualan,
            ];

            if ($barang->jumlah - $penjualan->jumlah_barang === 0) {
                $data_barang = [
                    'jumlah' => $barang->jumlah - $penjualan->jumlah_barang,
                    'status_barang' => 'habis',
                ];
            } else {
                $data_barang = [
                    'jumlah' => $barang->jumlah - $penjualan->jumlah_barang,
                ];
            }
            

            if (is_null($customer->utang)) {
                $data_customer = [
                    'utang' => $pembayaran->sisa_bayar,
                ];
            } else {
                $data_customer = [
                    'utang' => $customer->utang + $pembayaran->sisa_bayar,
                ];
            }

        } elseif ($request->simpan == 'Tolak') {
            $data_penjualan = [
                'status_persetujuan' => 'ditolak',
                'catatan' => $request->catatan,
            ];
        }
    
        Penjualan::where('kd_penjualan', $id)->update($data_penjualan);
        Pembayaran::where('kd_pembayaran', $pembayaran->kd_pembayaran)->update($data_pembayaran);
        Barang::where('id_barang', $penjualan->id_barang)->update($data_barang);
        Customer::where('kd_customer', $penjualan->kd_customer)->update($data_customer);
    
        if (!empty($data_pengiriman)) {
            Pengiriman::create($data_pengiriman);
        }
    
        return redirect()->route('supervisorpenjualan.index')->with('success', 'Barang Berhasil Di Checking');
    }
}
