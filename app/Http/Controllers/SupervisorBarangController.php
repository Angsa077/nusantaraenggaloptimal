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

    public function show(string $id)
    {
        $user = User::all();
        $data = Barang::where('kd_barang', $id)->first();
        return view('supervisor.barang.show', ['data'=>$data, 'user' => $user]);
    }
}
