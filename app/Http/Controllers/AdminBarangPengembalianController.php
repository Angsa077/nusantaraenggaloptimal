<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Pengembalian;
use App\Models\BarangRusak;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class AdminBarangPengembalianController extends Controller
{
    public function index()
    {
        $data = BarangRusak::with(['barang'])->orderBy('id_barang')->get();
        return view('admin.barangpengembalian.index', ['data' => $data]);
    }

    public function edit(string $id)
    {
        $data = BarangRusak::where('id_barangrusak', $id)->with(['barang'])->first();
        return view('admin.barangpengembalian.edit', ['data' => $data]);
    }

    public function update(Request $request, string $id)
    {
        $barangrusak = BarangRusak::where('id_barangrusak', $id)->first();
        $barang = Barang::where('id_barang', $barangrusak->id_barang)->first();

        $data_barang = [];
        $data_barangrusak = [];

        if ($request->simpan == 'Proses') {
            $data_barangrusak = [
                'status' => 'proses',
            ];
        } 
        
        elseif ($request->simpan == 'Selesai') {
            $data_barang = [
                'jumlah' => $barang->jumlah + $barangrusak->jumlah,
            ];

            $data_barangrusak = [
                'status' => 'selesai',
                'jumlah' => $barangrusak->jumlah - $barangrusak->jumlah,
            ];
        }

        BarangRusak::where('id_barangrusak', $id)->update($data_barangrusak);
        Barang::where('id_barang', $barangrusak->id_barang)->update($data_barang);
        return redirect()->route('admin.barangpengembalian.index')->with('success', 'Berhasil Memproses Barang Pengembalian');
    }

    public function destroy(string $id)
    {
        //
    }
}
