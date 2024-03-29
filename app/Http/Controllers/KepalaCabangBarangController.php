<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\User;
use Illuminate\Http\Request;

class KepalaCabangBarangController extends Controller
{
    public function index()
    {
        $data = Barang::orderBy('kd_barang')->get();
        return view('kepalacabang.barang.index', ['data'=>$data]);
    }

    public function show(string $id)
    {
        $spv = User::all();
        $user = User::all();
        $barang = Barang::all();
        $data = Barang::where('kd_barang', $id)->first();
        return view('kepalacabang.barang.show', ['data' => $data, 'barang' => $barang, 'user' => $user, 'spv' => $spv]);
    }

    public function edit(string $id)
    {
        $spv = User::all();
        $user = User::all();
        $data = Barang::where('id_barang', $id)->first();
        return view('kepalacabang.barang.edit', ['data'=>$data, 'user' => $user, 'spv' => $spv]);
    }
}
