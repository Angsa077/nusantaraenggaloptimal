<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\User;
use Illuminate\Http\Request;

class SalesBarangController extends Controller
{
    public function index()
    {
        $data = Barang::orderBy('kd_barang')->get();
        return view('sales.barang.index', ['data'=>$data]);
    }

    public function show(string $id)
    {
        $user = User::all();
        $data = Barang::where('id_barang', $id)->first();
        return view('sales.barang.show', ['data'=>$data, 'user' => $user]);
    }
}
