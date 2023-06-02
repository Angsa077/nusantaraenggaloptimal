<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Customer;
use App\Models\Pembayaran;
use App\Models\Pengembalian;
use App\Models\Pengiriman;
use App\Models\Penjualan;
use App\Models\PenjualanSementara;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class SalesPenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Penjualan::with(['barang', 'customer', 'user'])->orderBy('kd_penjualan')->get();
        return view('sales.penjualan.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = User::all();
        $barang = Barang::all();
        $customer = Customer::all();
        $penjualansementara = PenjualanSementara::all();
        return view('sales.penjualan.create', ['user' => $user, 'barang' => $barang, 'customer' => $customer, 'penjualansementara' => $penjualansementara]);
    }

    public function sementara(Request $request)
    {
        $existingCustomer = PenjualanSementara::where('kd_customer', $request->kd_customer)->first();
        $isTableEmpty = PenjualanSementara::count() === 0;
        if (!$existingCustomer) {
            if (!$isTableEmpty) {
                return redirect()->back()->withErrors(['kd_customer' => 'Selesaikan Pembayaran Kode Customer Yang Sudah Ada Terlebih Dahulu']);
            }
        }

        $barang = Barang::where('kd_barang', $request->kd_barang)->first();
        if (!$barang) {
            return redirect()->back()->withErrors(['kd_barang' => 'Kode Barang Tidak Ditemukan']);
        }

        Session::flash('kd_barang', $request->kd_barang);
        Session::flash('kd_customer', $request->kd_customer);
        Session::flash('jumlah_barang', $request->jumlah_barang);
        Session::flash('masa_garansi', $request->masa_garansi);

        $total_harga = $barang->harga_jual * $request->jumlah_barang;

        $request->validate(
            [
                'kd_barang' => 'required',
                'kd_customer' => 'required',
                'jumlah_barang' => 'required',
                'masa_garansi' => 'required',
            ],
            [
                'kd_barang.required' => 'Kode Barang Wajib Diisi',
                'kd_customer.required' => 'Kode Customer Wajib Diisi',
                'jumlah_barang.required' => 'Jumlah Barang Wajib Diisi',
                'masa_garansi.required' => 'Masa Garansi Wajib Diisi',
            ]
        );

        $data = [
            'kd_barang' => $request->kd_barang,
            'kd_customer' => $request->kd_customer,
            'jumlah_barang' => $request->jumlah_barang,
            'total_harga' => $total_harga,
            'masa_garansi' => $request->masa_garansi,
            'id_staf' => Auth::user()->id,
        ];

        PenjualanSementara::create($data);
        return redirect()->back()->with('success', 'Berhasil Mengisi Pesanan, Silahkan Lanjutkan Pembayaran');
    }

    public function store(Request $request)
    {
        $penjualansementara = PenjualanSementara::where('id_staf', Auth::user()->id)->first();
        $kd_penjualan = $penjualansementara->kd_penjualan;
        $kd_barang = $penjualansementara->kd_barang;
        $kd_customer = $penjualansementara->kd_customer;
        $masa_garansi = $penjualansementara->masa_garansi;

        $total_harga = $penjualansementara->sum('total_harga');
        $jumlah_barang = $penjualansementara->sum('jumlah_barang');

        Session::flash('total_bayar', $request->total_bayar);

        $sisa_bayar = $total_harga - $request->total_bayar;
        if ($total_harga == $request->total_bayar) {
            $status_pembayaran = "lunas";
        } elseif ($request->total_bayar < $total_harga) {
            $status_pembayaran = "utang";
        }

        $request->validate(
            [
                'total_bayar' => 'required|numeric|max:' . $total_harga,
                'bukti_pembayaran' => 'required|mimes:jpeg,jpg,png,gif|max:1024',
            ],
            [
                'total_bayar.required' => 'Total Pembayaran Wajib Diisi',
                'total_bayar.numeric' => 'Total Pembayaran harus berupa angka',
                'total_bayar.max' => 'Total Pembayaran tidak boleh lebih dari Harga Total',
                'bukti_pembayaran.required' => 'Bukti Pembayaran Wajib Diisi',
                'bukti_pembayaran.mimes' => 'Bukti Pembayaran Yang Diperbolehkan Hanya Berektensi JPEG, JPG, PNG, GIF',
                'bukti_pembayaran.max' => 'Bukti Pembayaran Yang Diperbolehkan Maksimal 1MB',
            ]
        );

        if ($request->hasFile('bukti_pembayaran')) {
            $foto_file = $request->file('bukti_pembayaran');
            if ($foto_file != null) {
                $foto_ekstensi = $foto_file->extension();
                $foto_nama = date('ymdhis') . "." . $foto_ekstensi;
                $foto_file->move(public_path('bukti_pembayaran'), $foto_nama);
            } else {
                $foto_nama = null;
            }
        }

        $data_penjualan = [
            'kd_penjualan' => $kd_penjualan,
            'kd_barang' => $kd_barang,
            'kd_customer' => $kd_customer,
            'jumlah_barang' => $jumlah_barang,
            'total_harga' => $total_harga,
            'total_bayar' => $request->total_bayar,
            'masa_garansi' => $masa_garansi,
            'tgl_penjualan' => date('Y-m-d H:i:s', strtotime('now +7 hours')),
            'status_pembayaran' => $status_pembayaran,
            'status_persetujuan'  => 'proses',
            'id_staf' => Auth::user()->id,
            'catatan' => $request->catatan,
        ];
        Penjualan::create($data_penjualan);

        $data_pembayaran = [
            'tgl_pembayaran' => date('Y-m-d H:i:s', strtotime('now +7 hours')),
            'total_bayar' => $request->total_bayar,
            'sisa_bayar' => $sisa_bayar,
            'bukti_pembayaran' => $foto_nama,
            'status_persetujuan'  => 'proses',
            'id_staf' => Auth::user()->id,
            'catatan' => $request->catatan,
        ];
        Pembayaran::create($data_pembayaran);
        return redirect()->route('salespenjualan.index')->with('success', 'Berhasil Mengisi Pesanan');
    }

    public function show(string $id)
    {
        $user = User::all();
        $barang = Barang::all();
        $customer = Customer::all();
        $pembayaran = Pembayaran::all();
        $pengiriman = Pengiriman::all();
        $pengembalian = Pengembalian::all();
        $data = Penjualan::where('kd_penjualan', $id)->first();
        return view('sales.penjualan.show', [
            'data' => $data, 'user' => $user, 'barang' => $barang, 'customer' => $customer,
            'pembayaran' => $pembayaran, 'pengiriman' => $pengiriman, 'pengembalian' => $pengembalian
        ]);
    }

    public function edit(string $id)
    {
        $user = User::all();
        $barang = Barang::all();
        $customer = Customer::all();
        $pembayaran = Pembayaran::all();
        $pengiriman = Pengiriman::all();
        $pengembalian = Pengembalian::all();
        $data = Penjualan::where('kd_penjualan', $id)->first();
        return view('sales.penjualan.edit', [
            'data' => $data, 'user' => $user, 'barang' => $barang, 'customer' => $customer,
            'pembayaran' => $pembayaran, 'pengiriman' => $pengiriman, 'pengembalian' => $pengembalian
        ]);
    }

    public function update(Request $request, string $id)
    {
    }

    public function destroy(string $id)
    {
    }

    public function destroysementara($id)
    {
        PenjualanSementara::where('kd_penjualansementara', $id)->delete();
        return redirect()->back()->with('success', 'Berhasil Menghapus Penjualan Sementara');
    }
}
