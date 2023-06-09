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

class SalesPembayaran extends Controller
{

    public function index()
    {
        $penjualan = Penjualan::with(['barangterjual', 'customer', 'user'])->get();
        $data = Pembayaran::with('penjualan')->get()->groupBy('penjualan.kd_penjualan');
        return view('sales.pembayaran.index', ['data' => $data, 'penjualan' => $penjualan]);
    }

    public function create()
    {
        $penjualan = Penjualan::with(['barangterjual', 'customer', 'user'])->get();
        $data = Pembayaran::with('penjualan')->get();
        return view('sales.pembayaran.create', ['data' => $data, 'penjualan' => $penjualan]);
    }

    public function store(Request $request)
    {
        Session::flash('kd_penjualan', $request->kd_penjualan);
        Session::flash('total_bayar', $request->total_bayar);
        Session::flash('catatan', $request->catatan);

        $penjualan = Penjualan::where('kd_penjualan', $request->kd_penjualan)->first();
        $sisa_bayar = $penjualan->total_harga - $penjualan->total_bayar;

        $request->validate(
            [
                'kd_penjualan' => 'required',
                'total_bayar' => 'required|numeric|max:' . $sisa_bayar,
                'bukti_pembayaran' => 'required|mimes:jpeg,jpg,png,gif|max:1024',
                'catatan' => 'required',
            ],
            [
                'kd_penjualan.required' => 'Kode Penjualan Wajib Diisi',
                'total_bayar.required' => 'Total Pembayaran Wajib Diisi',
                'total_bayar.numeric' => 'Total Pembayaran harus berupa angka',
                'total_bayar.max' => 'Total Pembayarantidak boleh lebih dari Sisa Bayar',
                'bukti_pembayaran.required' => 'Bukti Pembayaran Wajib Diisi',
                'bukti_pembayaran.mimes' => 'Bukti Pembayaran Yang Diperbolehkan Hanya Berektensi JPEG, JPG, PNG, GIF',
                'bukti_pembayaran.max' => 'Bukti Pembayaran Yang Diperbolehkan Maksimal 1MB',
                'catatan.required' => 'Alasan Pengembalian Wajib Diisi',
            ]
        );

        if ($request->hasFile('bukti_pembayaran')) {
            $foto_file = $request->file('bukti_pembayaran');
            if ($foto_file != null) {
                $foto_ekstensi = $foto_file->extension();
                $foto_nama = date('ymdhis') . "." . $foto_ekstensi;
                $foto_file->move(public_path('bukti_pembayaran'), $foto_nama);
            } else {
                $foto_nama = null;
            }
        }

        $data_pembayaran = [
            'kd_penjualan' => $request->kd_penjualan,
            'tgl_pembayaran' => date('Y-m-d H:i:s', strtotime('now')),
            'total_bayar' => $request->total_bayar,
            'bukti_pembayaran' => $foto_nama,
            'status_persetujuan'  => 'proses',
            'id_staf' => Auth::user()->id,
            'catatan' => $request->catatan,
        ];

        Pembayaran::create($data_pembayaran);
        return redirect()->route('sales.pembayaran.index')->with('success', 'Berhasil Mengisi Pembayaran');
    }

    public function show(string $id)
    {
        $user = User::all();
        $spv = User::all();
        $penjualan = Penjualan::with(['barangterjual', 'customer', 'user'])->first();
        $pembayaran = Pembayaran::all();
        $data = Pembayaran::where('kd_penjualan', $id)->first();
        return view('sales.pembayaran.show', [
            'data' => $data, 'pembayaran' => $pembayaran, 'user' => $user, 'spv' => $spv, 'penjualan' => $penjualan
        ]);
    }

    public function edit(string $id)
    {
        $user = User::all();
        $spv = User::all();
        $penjualan = Penjualan::with(['barangterjual', 'customer', 'user'])->first();
        $data = Pembayaran::where('kd_pembayaran', $id)->first();
        return view('sales.pembayaran.edit', [
            'data' => $data, 'user' => $user, 'spv' => $spv, 'penjualan' => $penjualan
        ]);
    }

    public function destroy(string $id)
    {
        $data = Pembayaran::where('kd_pembayaran', $id)->first();
        File::delete(public_path('bukti_pembayaran') . '/' . $data->bukti_pembayaran);

        Pembayaran::where('kd_pembayaran', $id)->delete();
        return redirect()->route('sales.pembayaran.index')->with('error', 'Berhasil Menghapus Data Pembayaran');
    }
}
