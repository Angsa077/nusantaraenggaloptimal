<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Customer;
use App\Models\Penjualan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class SalesPenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Penjualan::with(['barang', 'customer', 'user'])->orderBy('kd_penjualan')->get();
        return view('sales.penjualan.index', ['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = User::all();
        $barang = Barang::all();
        $customer = Customer::all();
        return view('sales.penjualan.create', ['user' => $user, 'barang' => $barang, 'customer' => $customer]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $barang = Barang::where('kd_barang', $request->kd_barang)->first();
        if (!$barang) {
        return redirect()->back()->withErrors(['kd_barang' => 'Kode Barang Tidak Ditemukan']);
        }

        Session::flash('kd_barang', $request->kd_barang);
        Session::flash('kd_customer', $request->kd_customer);
        Session::flash('jumlah_barang', $request->jumlah);
        Session::flash('masa_garansi', $request->masa_garansi);
        Session::flash('total_bayar', $request->total_bayar);

        $total_harga = $barang->harga_jual * $request->jumlah_barang;

        $request->validate(
            [
                'kd_barang' => 'required',
                'kd_customer' => 'required',
                'jumlah_barang' => 'required',
                'masa_garansi' => 'required',
                'total_bayar' => 'required|numeric|max:' . $total_harga,
            ],
            [
                'kd_barang.required' => 'Kode Barang Wajib Diisi',
                'kd_customer.required' => 'Kode Customer Wajib Diisi',
                'jumlah_barang.required' => 'Jumlah Barang Wajib Diisi',
                'masa_garansi.required' => 'Masa Garansi Wajib Diisi',
                'total_bayar.required' => 'Total Pembayaran Wajib Diisi',
                'total_bayar.numeric' => 'Total Pembayaran harus berupa angka',
                'total_bayar.max' => 'Total Pembayaran tidak boleh lebih dari Harga Total',
            ]
            );

            $data = [
                'kd_barang' => $request->kd_barang,
                'kd_customer' => $request->kd_customer,
                'jumlah_barang' => $request->jumlah_barang,
                'total_harga' => $total_harga,
                'total_bayar' => $request->total_bayar,
                'masa_garansi' => $request->masa_garansi,
                'tgl_penjualan' => date('Y-m-d H:i:s', strtotime('now +7 hours')),
                'status_persetujuan' => 'Proses',
                'id_staf' => Auth::user()->id,
                'catatan' => $request->catatan,
            ];

        Penjualan::create($data);
        return redirect()->route('salespenjualan.index')->with('success','Berhasil Mengisi Pesanan');
    }

    public function show(string $id)
    {
        
    }

    public function edit(string $id)
    {
        
    }

    public function update(Request $request, string $id)
    {
        
    }

    public function destroy(string $id)
    {
        
    }
}
