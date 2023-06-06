<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\BarangRusak;
use App\Models\Pengembalian;
use App\Models\Pengiriman;
use App\Models\Penjualan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class SalesPengembalian extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $penjualan = Penjualan::with(['barang', 'customer', 'user'])->get();
        $data = Pengembalian::with('penjualan')->get();
        return view('sales.pengembalian.index', ['data' => $data, 'penjualan' => $penjualan]);
    }

    public function create()
    {
        $penjualan = Penjualan::with(['barang', 'customer', 'user'])->get();
        $data = Pengembalian::with('penjualan')->get();
        return view('sales.pengembalian.create', ['data' => $data, 'penjualan' => $penjualan]);
    }

    public function store(Request $request)
    {
        Session::flash('kd_penjualan', $request->kd_penjualan);
        Session::flash('jumlah_barang', $request->jumlah_barang);
        Session::flash('catatan', $request->catatan);

        $penjualan = Penjualan::where('kd_penjualan', $request->kd_penjualan)->first();
        $jumlah_barang = $penjualan->jumlah_barang;

        $request->validate(
            [
                'kd_penjualan' => 'required',
                'jumlah_barang' => 'required|numeric|max:' . $jumlah_barang,
                'catatan' => 'required',
            ],
            [
                'kd_penjualan.required' => 'Kode Penjualan Wajib Diisi',
                'jumlah_barang.required' => 'Jumlah Barang Wajib Diisi',
                'jumlah_barang.numeric' => 'Jumlah Barang harus berupa angka',
                'jumlah_barang.max' => 'Jumlah Barang tidak boleh lebih dari Harga Total',
               
                'catatan.required' => 'Alasan Pengembalian Wajib Diisi',
            ]
        );

        $data_penjualan = [
            'status_pengembalian' => 'proses',
        ];

        $data_pengembalian = [
            'kd_penjualan' => $request->kd_penjualan,
            'tgl_pengembalian' => date('Y-m-d H:i:s', strtotime('now')),
            'jumlah_barang' => $request->jumlah_barang,
            'status_persetujuan'  => 'proses',
            'id_staf' => Auth::user()->id,
            'catatan' => $request->catatan,
        ];

        Penjualan::where('kd_penjualan', $request->kd_penjualan)->update($data_penjualan);
        Pengembalian::create($data_pengembalian);
        return redirect()->route('salespengembalian.index')->with('success', 'Berhasil Mengisi Pengajuan Pengembalian');
    }

    public function show(string $id)
    {
        $user = User::all();
        $kurir = User::all();
        $spv = User::all();
        $admin = User::all();
        $pengiriman = Pengiriman::all();
        $penjualan = Penjualan::with(['barang', 'customer', 'user'])->first();
        $data = Pengembalian::where('kd_pengembalian', $id)->first();
        return view('sales.pengembalian.show', [
            'data' => $data, 'user' => $user, 'kurir' => $kurir, 'spv' => $spv, 'admin' => $admin, 'pengiriman' => $pengiriman, 'penjualan' => $penjualan
        ]);
    }

    public function destroy(string $id)
    {
        Pengembalian::where('kd_pengembalian', $id)->delete();
        return redirect()->route('salespengembalian.index')->with('success', 'Berhasil Menghapus Pengajuan Pengembalian');
    }
}
