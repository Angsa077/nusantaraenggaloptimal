<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\User;
use Illuminate\Http\Request;

class SupervisorBarangController extends Controller
{
    public function index()
    {
        $data = Barang::orderBy('kd_barang')->get();
        return view('supervisor.barang.index', ['data'=>$data]);
    }

    public function edit(string $id)
    {
        $user = User::all();
        $data = Barang::where('kd_barang', $id)->first();
        return view('supervisor.barang.edit', ['data'=>$data, 'user' => $user]);
    }

    public function update(Request $request, string $id)
    {
        if ($request->simpan == 'Setujui') {
            $data['status_barang'] = 'tersedia';
        } elseif ($request->simpan == 'Tolak') {
            $data['status_barang'] = 'tolak';
        }

        if ($request->simpan == 'Hapus') {
            Barang::where('kd_barang', $id)->delete();
            return redirect()->route('supervisorbarang.index')->with('success', 'Berhasil Menghapus Data Barang');
        } elseif ($request->simpan == 'Batal') {
            $data['status_barang'] = 'tolak';
        }

        Barang::where('kd_barang', $id)->update($data);
        return redirect()->route('supervisorbarang.index')->with('success','Berhasil Memperbarui Data Barang');
    }
}
