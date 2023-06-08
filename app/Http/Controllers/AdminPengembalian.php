<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\BarangRusak;
use App\Models\BarangTerjual;
use App\Models\Pengembalian;
use App\Models\Pengiriman;
use App\Models\Penjualan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminPengembalian extends Controller
{
    public function index()
    {
        $penjualan = Penjualan::with(['barangterjual', 'customer', 'user'])->get();
        $data = Pengembalian::with('penjualan')->get();
        return view('admin.pengembalian.index', ['data' => $data, 'penjualan' => $penjualan]);
    }

    public function create()
    {
        $barang = Barang::all();
        $barangterjual = BarangTerjual::all();
        $penjualan = Penjualan::with(['barangterjual', 'customer', 'user'])->get();
        $data = Pengembalian::with('penjualan')->get();
        return view('admin.pengembalian.create', ['data' => $data, 'barang' => $barang, 'barangterjual' => $barangterjual, 'penjualan' => $penjualan]);
    }

    public function store(Request $request)
    {
        Session::flash('id_barangterjual', $request->id_barangterjual);
        Session::flash('jumlah', $request->jumlah);
        Session::flash('catatan', $request->catatan);

        $barangterjual = BarangTerjual::where('id_barangterjual', $request->id_barangterjual)->first();
        $jumlah = $barangterjual->jumlah;

        $request->validate(
            [
                'id_barangterjual' => 'required',
                'jumlah' => 'required|numeric|max:' . $jumlah,
                'bukti_pengembalian' => 'mimes:jpeg,jpg,png,gif|max:1024',
                'catatan' => 'required',
            ],
            [
                'id_barangterjual.required' => 'Kode Penjualan Wajib Diisi',
                'jumlah.required' => 'Jumlah Barang Wajib Diisi',
                'jumlah.numeric' => 'Jumlah Barang harus berupa angka',
                'jumlah.max' => 'Jumlah Barang tidak boleh lebih dari Harga Total',
                'bukti_pengembalian.mimes' => 'Bukti Pengembalian Yang Diperbolehkan Hanya Berektensi JPEG, JPG, PNG, GIF',
                'bukti_pengembalian.max' => 'Bukti Pengembalian Yang Diperbolehkan Maksimal 1MB',
                'catatan.required' => 'Alasan Pengembalian Wajib Diisi',
            ]
        );

        if ($request->hasFile('bukti_pengembalian')) {
            $foto_file_pengembalian = $request->file('bukti_pengembalian');
            if ($foto_file_pengembalian != null) {
                $foto_ekstensi_pengembalian = $foto_file_pengembalian->extension();
                $foto_nama_pengembalian = date('ymdhis') . "." . $foto_ekstensi_pengembalian;
                $foto_file_pengembalian->move(public_path('bukti_pengembalian'), $foto_nama_pengembalian);
            } else {
                $foto_nama_pengembalian = null;
            }
        }

        $data_penjualan = [
            'status_pengembalian' => 'proses',
        ];

        $data_pengembalian = [
            'id_barangterjual' => $request->id_barangterjual,
            'kd_penjualan' => $barangterjual->kd_penjualan,
            'tgl_pengembalian' => date('Y-m-d H:i:s', strtotime('now')),
            'jumlah_barang' => $request->jumlah,
            'bukti_pengembalian' => $foto_nama_pengembalian, 
            'status_persetujuan'  => 'proses',
            'id_staf' => Auth::user()->id,
            'catatan' => $request->catatan,
        ];

        Penjualan::where('kd_penjualan', $request->kd_penjualan)->update($data_penjualan);
        Pengembalian::create($data_pengembalian);
        return redirect()->route('adminpengembalian.index')->with('success', 'Berhasil Mengisi Pengajuan Pengembalian');
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
        
        return view('admin.pengembalian.edit', [
            'data' => $data, 'barangterjual' => $barangterjual, 'barang' => $barang, 'user' => $user, 'kurir' => $kurir, 'spv' => $spv, 'admin' => $admin, 'pengiriman' => $pengiriman, 'penjualan' => $penjualan
        ]);
    }

    public function update(Request $request, string $id)
    {
        Session::flash('gambar', $request->gambar);
        Session::flash('catatan', $request->catatan);

        $request->validate(
            [
                'gambar' => 'mimes:jpeg,jpg,png,gif|max:1024',
                'catatan' => 'required',
            ],
            [
                'gambar.mimes' => 'Bukti Pengembalian Yang Diperbolehkan Hanya Berektensi JPEG, JPG, PNG, GIF',
                'gambar.max' => 'Bukti Pengembalian Yang Diperbolehkan Maksimal 1MB',
                'catatan.required' => 'Catatan Wajib Di isi',
            ]
        );

        if ($request->hasFile('gambar')) {
            $foto_file = $request->file('gambar');
            if ($foto_file != null) {
                $foto_ekstensi = $foto_file->extension();
                $foto_nama = date('ymdhis') . "." . $foto_ekstensi;
                $foto_file->move(public_path('gambar'), $foto_nama);
                Session::flash('gambar', 'gambar/' . $foto_nama); // Menyimpan path file dalam sesi
            } else {
                $foto_nama = null;
            }
        }

        $pengembalian = Pengembalian::where('kd_pengembalian', $id)->first();
        $penjualan = Penjualan::where('kd_penjualan', $pengembalian->kd_penjualan)->first();
        $barang = Barang::where('id_barangterjual', $penjualan->id_barangterjual)->first();

        $data_barang = [];
        $data_penjualan = [];
        $data_pengembalian = [];

            $data_barang = [
                // 'id_barangterjual' => $penjualan->id_barangterjual,
                'kd_barang' => $barang->kd_barang,
                'kd_penjualan' => $pengembalian->kd_penjualan,
                'kd_pengembalian' => $pengembalian->kd_pengembalian,
                'jumlah' => $pengembalian->jumlah_barang,
                'gambar' => $foto_nama,
                'catatan' => $request->catatan,
                'id_staf' => Auth::user()->id,
                'tgl_barangpengembalian' => date('Y-m-d H:i:s', strtotime('now')),
            ];

            $data_penjualan = [
                'status_pengembalian' => 'selesai',
            ];

            $data_pengembalian = [
                'id_admin' => Auth::user()->id,
                'tgl_selesai' => date('Y-m-d H:i:s', strtotime('now')),
            ];

        Pengembalian::where('kd_pengembalian', $id)->update($data_pengembalian);
        Penjualan::where('kd_penjualan', $pengembalian->kd_penjualan)->update($data_penjualan);
        BarangRusak::create($data_barang);
        return redirect()->route('kurirpengembalian.index')->with('success', 'Berhasil Mengisi Pengajuan Pengembalian');
    }

    public function destroy(string $id)
    {
        Pengembalian::where('kd_pengembalian', $id)->delete();
        return redirect()->route('adminpengembalian.index')->with('success', 'Berhasil Menghapus Pengajuan Pengembalian');
    }
}
