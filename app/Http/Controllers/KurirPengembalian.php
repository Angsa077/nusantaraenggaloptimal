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
        $pengiriman = Pengiriman::with('penjualan')->get();
        $data = Pengembalian::with('pengembalian')->get();

        return view('kurir.pengembalian.index', ['data' => $data, 'pengiriman' => $pengiriman, 'penjualan' => $penjualan]);
    }

    public function create()
    {
        $penjualan = Penjualan::with(['barang', 'customer', 'user'])->get();
        $data = Pengembalian::with('pengembalian')->get();
        return view('kurir.pengembalian.create', ['data' => $data, 'penjualan' => $penjualan]);
    }

    public function store(Request $request)
    {
        Session::flash('kd_penjualan', $request->kd_penjualan);
        Session::flash('jumlah_barang', $request->jumlah_barang);
        Session::flash('bukti_pengembalian', $request->bukti_pengembalian);
        Session::flash('catatan', $request->catatan);

        $penjualan = Penjualan::where('kd_penjualan', $request->kd_penjualan)->first();
        $jumlah_barang = $penjualan->jumlah_barang;

        $request->validate(
            [
                'kd_penjualan' => 'required',
                'jumlah_barang' => 'required|numeric|max:' . $jumlah_barang,
                'bukti_pengembalian' => 'required|mimes:jpeg,jpg,png,gif|max:1024',
                'catatan' => 'required',
            ],
            [
                'kd_penjualan.required' => 'Kode Penjualan Wajib Diisi',
                'jumlah_barang.required' => 'Jumlah Barang Wajib Diisi',
                'jumlah_barang.numeric' => 'Jumlah Barang harus berupa angka',
                'jumlah_barang.max' => 'Jumlah Barang tidak boleh lebih dari Harga Total',
                'bukti_pengembalian.required' => 'Bukti Pengembalian Wajib Diisi',
                'bukti_pengembalian.mimes' => 'Bukti Pengembalian Yang Diperbolehkan Hanya Berektensi JPEG, JPG, PNG, GIF',
                'bukti_pengembalian.max' => 'Bukti Pengembalian Yang Diperbolehkan Maksimal 1MB',
                'catatan.required' => 'Alasan Pengembalian Wajib Diisi',
            ]
        );

        if ($request->hasFile('bukti_pengembalian')) {
            $foto_file = $request->file('bukti_pengembalian');
            if ($foto_file != null) {
                $foto_ekstensi = $foto_file->extension();
                $foto_nama = date('ymdhis') . "." . $foto_ekstensi;
                $foto_file->move(public_path('bukti_pengembalian'), $foto_nama);
            } else {
                $foto_nama = null;
            }
        }

        $data_penjualan = [
            'status_pengembalian' => 'proses',
        ];

        $data_pengembalian = [
            'kd_penjualan' => $request->kd_penjualan,
            'tgl_pembayaran' => date('Y-m-d H:i:s', strtotime('now')),
            'jumlah_barang' => $jumlah_barang,
            'bukti_pengembalian' => $foto_nama,
            'status_persetujuan'  => 'proses',
            'id_staf' => Auth::user()->id,
            'catatan' => $request->catatan,
        ];

        Penjualan::where('kd_penjualan', $request->kd_penjualan)->update($data_penjualan);
        Pengembalian::create($data_pengembalian);
        return redirect()->route('kurirpengembalian.index')->with('success', 'Berhasil Mengisi Pengajuan Pengembalian');
    }

    public function show(string $id)
    {
        $user = User::all();
        $pengiriman = Pengiriman::all();
        $penjualan = Penjualan::with(['barang', 'customer', 'user'])->get();
        $data = Pengembalian::where('kd_pengembalian', $id)->first();
        return view('kurir.pengembalian.show', [
            'data' => $data, 'user' => $user, 'pengiriman' => $pengiriman, 'penjualan' => $penjualan
        ]);
    }

    public function edit(string $id)
    {
        $user = User::all();
        $pengiriman = Pengiriman::all();
        $penjualan = Penjualan::with(['barang', 'customer', 'user'])->get();
        $data = Pengembalian::where('kd_pengembalian', $id)->first();
        return view('kurir.pengembalian.edit', [
            'data' => $data, 'user' => $user, 'pengiriman' => $pengiriman, 'penjualan' => $penjualan
        ]);
    }

    public function update(Request $request, string $id)
    {
        Session::flash('jumlah_barang', $request->jumlah_barang);
        Session::flash('bukti_pengembalian', $request->bukti_pengembalian);
        Session::flash('catatan', $request->catatan);

        $penjualan = Penjualan::where('kd_penjualan', $id)->first();
        $jumlah_barang = $penjualan->jumlah_barang;

        $request->validate(
            [
                'jumlah_barang' => 'required|numeric|max:' . $jumlah_barang,
                'bukti_pengembalian' => 'required|mimes:jpeg,jpg,png,gif|max:1024',
                'catatan' => 'required',
            ],
            [
                'jumlah_barang.required' => 'Jumlah Barang Wajib Diisi',
                'jumlah_barang.numeric' => 'Jumlah Barang harus berupa angka',
                'jumlah_barang.max' => 'Jumlah Barang tidak boleh lebih dari Harga Total',
                'bukti_pengembalian.required' => 'Bukti Pengembalian Wajib Diisi',
                'bukti_pengembalian.mimes' => 'Bukti Pengembalian Yang Diperbolehkan Hanya Berektensi JPEG, JPG, PNG, GIF',
                'bukti_pengembalian.max' => 'Bukti Pengembalian Yang Diperbolehkan Maksimal 1MB',
                'catatan.required' => 'Alasan Pengembalian Wajib Diisi',
            ]
        );

        if ($request->hasFile('bukti_pengembalian')) {
            $foto_file = $request->file('bukti_pengembalian');
            if ($foto_file != null) {
                $foto_ekstensi = $foto_file->extension();
                $foto_nama = date('ymdhis') . "." . $foto_ekstensi;
                $foto_file->move(public_path('bukti_pengembalian'), $foto_nama);
            } else {
                $foto_nama = null;
            }
        }

            $data_penjualan = [
                'status_pengembalian' => 'proses',
            ];

            $data_pengembalian = [
                'jumlah_barang' => $jumlah_barang,
                'tgl_pembayaran' => date('Y-m-d H:i:s', strtotime('now')),
                'bukti_pengiriman' => $foto_nama,
                'status_persetujuan'  => 'proses',
                'catatan' => $request->catatan,
                'id_staf' => Auth::user()->id,
            ];

        Penjualan::where('kd_penjualan', $id)->update($data_penjualan);
        Pengembalian::where('kd_penjualan', $id)->update($data_pengembalian);
        return redirect()->route('kurirpengembalian.index')->with('success', 'Pengembalian Berhasil Diperbarui');
    }

    public function destroy(string $id)
    {
        Pengembalian::where('kd_pengembalian', $id)->delete();
        return redirect()->back()->with('success', 'Berhasil Menghapus Pengajuan Pengembalian');
    }
}
