<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SupervisorBarangController extends Controller
{
    public function index()
    {
        $data = Barang::orderBy('kd_barang')->get();
        return view('supervisor.barang.index', ['data'=>$data]);
    }

    public function show(string $id)
    {
        $spv = User::all();
        $user = User::all();
        $barang = Barang::all();
        $data = Barang::where('kd_barang', $id)->first();
        return view('supervisor.barang.show', ['data' => $data, 'barang' => $barang, 'user' => $user, 'spv' => $spv]);
    }

    public function edit(string $id)
    {
        $spv = User::all();
        $user = User::all();
        $data = Barang::where('id_barang', $id)->first();
        return view('supervisor.barang.edit', ['data'=>$data, 'user' => $user, 'spv' => $spv]);
    }

    public function update(Request $request, string $id)
    {
        if ($request->simpan == 'Setujui') {
            $data = [
                'status_barang' => 'tersedia',
                'id_spv' => Auth::user()->id,
        ];
        } elseif ($request->simpan == 'Tolak') {
            $data['status_barang'] = 'tolak';
        }

        if ($request->simpan == 'Hapus') {
            Barang::where('id_barang', $id)->delete();
            return redirect()->route('supervisor.barang.index')->with('success','Berhasil Menghapus Data Barang');
        } elseif ($request->simpan == 'Batal') {
            $data['status_barang'] = 'tolak';
        }

        if ($request->simpan == 'Tambah') {
            $data = [
                'status_barang' => 'tersedia',
                'id_spv' => Auth::user()->id,
        ];
        } elseif ($request->simpan == 'Tidak') {
            Barang::where('id_barang', $id)->delete();
            return redirect()->route('supervisor.barang.index')->with('success','Berhasil Menghapus Data Barang');
        }

        Barang::where('id_barang', $id)->update($data);
        return redirect()->route('supervisor.barang.index')->with('success','Berhasil Memperbarui Data Barang');
    }
}
