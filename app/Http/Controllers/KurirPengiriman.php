<?php

namespace App\Http\Controllers;

use App\Models\Pengiriman;
use App\Models\Penjualan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KurirPengiriman extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $penjualan = Penjualan::with(['barang', 'customer', 'user'])->get();
        $data = Pengiriman::with('penjualan')->get();

        return view('kurir.pengiriman.index', ['data' => $data, 'penjualan' => $penjualan]);
    }

    public function edit(string $id)
    {
        $user = User::all();
        $penjualan = Penjualan::with(['barang', 'customer', 'user'])->first();
        $data = Pengiriman::where('kd_pengiriman', $id)->first();
        return view('kurir.pengiriman.edit', ['data' => $data, 'user' => $user, 'penjualan' => $penjualan]);
    }

    public function update(Request $request, string $id)
    {
        $penjualan = Penjualan::where('kd_penjualan', $id)->first();
        $data_penjualan = [];
        $data_pengiriman = [];

        if ($request->hasFile('bukti_pengiriman')) {
            $foto_file_pengiriman = $request->file('bukti_pengiriman');
            if ($foto_file_pengiriman != null) {
                $foto_ekstensi_pengiriman = $foto_file_pengiriman->extension();
                $foto_nama_pengiriman = date('ymdhis') . "." . $foto_ekstensi_pengiriman;
                $foto_file_pengiriman->move(public_path('bukti_pengiriman'), $foto_nama_pengiriman);
            } else {
                $foto_nama_pengiriman = null;
            }
        }

        if ($request->hasFile('bukti_penerimaan')) {
            $foto_file_penerimaan = $request->file('bukti_penerimaan');
            if ($foto_file_penerimaan!= null) {
                $foto_ekstensi_penerimaan = $foto_file_penerimaan->extension();
                $foto_nama_penerimaan = date('ymdhis') . "." . $foto_ekstensi_penerimaan;
                $foto_file_penerimaan->move(public_path('bukti_penerimaan'), $foto_nama_penerimaan);
            } else {
                $foto_nama_penerimaan = null;
            }
        }

        if ($request->simpan == 'Kirim') {
            $data_penjualan = [
                'status_pengiriman' => 'dikirim',
            ];

            $data_pengiriman = [
                'tgl_pengiriman' => date('Y-m-d H:i:s', strtotime('now +7 hours')),
                'bukti_pengiriman' => $foto_nama_pengiriman,
                'id_staf' => Auth::user()->id,
            ];
            
        } elseif ($request->simpan == 'Selesai') {
            $data_penjualan = [
                'status_pengiriman' => 'selesai',
            ];

            $data_pengiriman = [
                'tgl_sampai' => date('Y-m-d H:i:s', strtotime('now +7 hours')),
                'nama_penerima' =>$request->nama_penerima,
                'bukti_penerimaan' => $foto_nama_penerimaan,
                'catatan' => $request->catatan,
            ];
        }

        Penjualan::where('kd_penjualan', $id)->update($data_penjualan);
        Pengiriman::where('kd_penjualan', $id)->update($data_pengiriman);

        return redirect()->route('kurirpengiriman.index')->with('success', 'Barang Berhasil Di Checking');
    }
}
