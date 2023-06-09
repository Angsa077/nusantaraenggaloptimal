<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class KepalaCabangManajemenuserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = User::orderBy('id')->get();
        return view('kepalacabang.manajemenuser.index', ['data'=>$data]);
    }

    public function edit(string $id)
    {
        $data = User::where('id', $id)->first();
        return view('kepalacabang.manajemenuser.edit', ['data'=>$data]);
    }

    public function update(Request $request, string $id)
    {
        if ($request->simpan == 'Setujui') {
            $data['status_akun'] = 'aktif';
        } elseif ($request->simpan == 'Tolak') {
            $data['status_akun'] = 'tolak';
        }

        if ($request->simpan == 'Hapus') {
            User::where('id', $id)->delete();
            return redirect()->route('kepalacabang.manajemenuser.index')->with('success', 'Berhasil Menghapus Biodata User');
        } elseif ($request->simpan == 'Batal') {
            $data['status_akun'] = 'nonaktif';
        }

        User::where('id', $id)->update($data);
        return redirect()->route('kepalacabang.manajemenuser.index')->with('success','Berhasil Memperbarui Data User');
    }
}
