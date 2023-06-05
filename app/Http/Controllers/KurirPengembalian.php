<?php

namespace App\Http\Controllers;

use App\Models\Pengembalian;
use App\Models\Pengiriman;
use App\Models\Penjualan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class KurirPengembalian extends Controller
{
    public function index()
    {
        $penjualan = Penjualan::with(['barang', 'customer', 'user'])->get();
        $data = Pengembalian::with('penjualan')->get();
        return view('kurir.pengembalian.index', ['data' => $data, 'penjualan' => $penjualan]);
    }

    public function create()
    {
        $penjualan = Penjualan::with(['barang', 'customer', 'user'])->get();
        $data = Pengembalian::with('penjualan')->get();
        return view('kurir.pengembalian.create', ['data' => $data, 'penjualan' => $penjualan]);
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
        return redirect()->route('kurirpengembalian.index')->with('success', 'Berhasil Mengisi Pengajuan Pengembalian');
    }

    public function edit(string $id)
    {
        $user = User::all();
        $spv = User::all();
        $pengiriman = Pengiriman::all();
        $penjualan = Penjualan::with(['barang', 'customer', 'user'])->first();
        $data = Pengembalian::where('kd_pengembalian', $id)->first();
        return view('kurir.pengembalian.edit', [
            'data' => $data, 'user' => $user, 'spv' => $spv, 'pengiriman' => $pengiriman, 'penjualan' => $penjualan
        ]);
    }

    public function update(Request $request, string $id)
    {
        Session::flash('bukti_pengembalian', $request->bukti_pengembalian);

        $request->validate(
            [
                'bukti_pengembalian' => 'required|mimes:jpeg,jpg,png,gif|max:1024',
            ],
            [
                'bukti_pengembalian.required' => 'Bukti Pengembalian Wajib Diisi',
                'bukti_pengembalian.mimes' => 'Bukti Pengembalian Yang Diperbolehkan Hanya Berektensi JPEG, JPG, PNG, GIF',
                'bukti_pengembalian.max' => 'Bukti Pengembalian Yang Diperbolehkan Maksimal 1MB',
            ]
        );

        if ($request->hasFile('bukti_pengembalian')) {
            $foto_file = $request->file('bukti_pengembalian');
            if ($foto_file != null) {
                $foto_ekstensi = $foto_file->extension();
                $foto_nama = date('ymdhis') . "." . $foto_ekstensi;
                $foto_file->move(public_path('bukti_pengembalian'), $foto_nama);
                Session::flash('bukti_pengembalian', 'bukti_pengembalian/' . $foto_nama); // Menyimpan path file dalam sesi
            } else {
                $foto_nama = null;
            }
        }        

        $pengembalian = Pengembalian::where('kd_pengembalian', $id)->first();

        $data_penjualan = [];
        $data_pengembalian = [];

        if ($request->simpan == 'Penjemputan') {
            $data_penjualan = [
                'status_pengembalian' => 'penjemputan',
            ];
            $data_pengembalian = [
                'bukti_pengembalian' => $foto_nama,
                'tgl_penjemputan' => date('Y-m-d H:i:s', strtotime('now')),
            ];
        } elseif ($request->simpan == 'Selesai') {
            $data_penjualan = [
                'status_pengembalian' => 'selesai',
            ];
            $data_pengembalian = [
                'tgl_selesai' => date('Y-m-d H:i:s', strtotime('now')),
            ];
        }

        Pengembalian::where('kd_pengembalian', $id)->update($data_pengembalian);
        Penjualan::where('kd_penjualan', $pengembalian->kd_penjualan)->update($data_penjualan);
        return redirect()->route('kurirpengembalian.index')->with('success', 'Berhasil Mengisi Pengajuan Pengembalian');
    }

    public function destroy(string $id)
    {
        Pengembalian::where('kd_pengembalian', $id)->delete();
        return redirect()->route('kurirpengembalian.index')->with('success', 'Berhasil Menghapus Pengajuan Pengembalian');
    }
}
