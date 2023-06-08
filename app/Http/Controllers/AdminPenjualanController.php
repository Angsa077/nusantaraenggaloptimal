<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\BarangTerjual;
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
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Support\Facades\View;

class AdminPenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Penjualan::with(['barangterjual', 'customer', 'user'])->orderBy('kd_penjualan')->get();
        return view('admin.penjualan.index', ['data' => $data]);
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
        return view('admin.penjualan.create', ['user' => $user, 'barang' => $barang, 'customer' => $customer, 'penjualansementara' => $penjualansementara]);
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

        $barang = Barang::where('id_barang', $request->id_barang)->first();
        if (!$barang) {
            return redirect()->back()->withErrors(['id_barang' => 'Kode Barang Tidak Ditemukan']);
        }

        Session::flash('id_barang', $request->id_barang);
        Session::flash('kd_customer', $request->kd_customer);
        Session::flash('jumlah_barang', $request->jumlah_barang);
        Session::flash('masa_garansi', $request->masa_garansi);

        $total_harga = $barang->harga_jual * $request->jumlah_barang;
        $jumlah_barang = $barang->jumlah;

        $request->validate(
            [
                'id_barang' => 'required',
                'kd_customer' => 'required',
                'masa_garansi' => 'required',
                'jumlah_barang' => 'required|numeric|max:' . $jumlah_barang,
            ],
            [
                'id_barang.required' => 'Kode Barang Wajib Diisi',
                'kd_customer.required' => 'Kode Customer Wajib Diisi',
                'jumlah_barang.required' => 'Jumlah Barang Wajib Diisi',
                'jumlah_barang.numeric' => 'Jumlah Barang harus berupa angka',
                'jumlah_barang.max' => 'Jumlah Barang tidak boleh lebih dari Stok Barang',
                'masa_garansi.required' => 'Masa Garansi Wajib Diisi',
            ]
        );

        $data = [
            'id_barang' => $request->id_barang,
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
        // Mendapatkan data penjualan sementara
        $penjualanSem = PenjualanSementara::where('id_staf', Auth::user()->id)->first();
        $penjualanSementara = PenjualanSementara::where('id_staf', Auth::user()->id)->get();

        // Mendapatkan total harga dan jumlah barang dari penjualan sementara
        $totalHarga = $penjualanSementara->sum('total_harga');
        $jumlahBarang = $penjualanSementara->sum('jumlah_barang');

        Session::flash('total_bayar', $request->total_bayar);

        // Menghitung sisa bayar dan status pembayaran
        $sisaBayar = $totalHarga - $request->total_bayar;
        if ($totalHarga == $request->total_bayar) {
            $statusPembayaran = "lunas";
        } elseif ($request->total_bayar < $totalHarga) {
            $statusPembayaran = "utang";
        }

        $request->validate([
            'total_bayar' => 'required|numeric|max:' . $totalHarga,
            'bukti_pembayaran' => 'required|mimes:jpeg,jpg,png,gif|max:1024',
        ], [
            'total_bayar.required' => 'Total Pembayaran Wajib Diisi',
            'total_bayar.numeric' => 'Total Pembayaran harus berupa angka',
            'total_bayar.max' => 'Total Pembayaran tidak boleh lebih dari Harga Total',
            'bukti_pembayaran.required' => 'Bukti Pembayaran Wajib Diisi',
            'bukti_pembayaran.mimes' => 'Bukti Pembayaran Yang Diperbolehkan Hanya Berektensi JPEG, JPG, PNG, GIF',
            'bukti_pembayaran.max' => 'Bukti Pembayaran Yang Diperbolehkan Maksimal 1MB',
        ]);

        if ($request->hasFile('bukti_pembayaran')) {
            $fotoFile = $request->file('bukti_pembayaran');
            if ($fotoFile != null) {
                $fotoEkstensi = $fotoFile->extension();
                $fotoNama = date('ymdhis') . "." . $fotoEkstensi;
                $fotoFile->move(public_path('bukti_pembayaran'), $fotoNama);
            } else {
                $fotoNama = null;
            }
        }

        $dataPenjualan = [
            'kd_customer' => $penjualanSem->kd_customer,
            'jumlah_barang' => $jumlahBarang,
            'total_harga' => $totalHarga,
            'total_bayar' => $request->total_bayar,
            'tgl_penjualan' => date('Y-m-d H:i:s', strtotime('now')),
            'status_pembayaran' => $statusPembayaran,
            'status_persetujuan'  => 'proses',
            'id_staf' => Auth::user()->id,
        ];

        Penjualan::create($dataPenjualan);
        // Mendapatkan nilai terakhir kd_penjualan
        $lastKdPenjualan = Penjualan::max('kd_penjualan');

        $dataPembayaran = [
            'kd_penjualan' => $lastKdPenjualan,
            'tgl_pembayaran' => date('Y-m-d H:i:s', strtotime('now')),
            'total_bayar' => $request->total_bayar,
            'sisa_bayar' => $sisaBayar,
            'bukti_pembayaran' => $fotoNama,
            'status_persetujuan'  => 'proses',
            'id_staf' => Auth::user()->id,
            'catatan' => 'Pembayaran Pertama',
        ];

        // Memindahkan data barang terjual
        foreach ($penjualanSementara as $item) {
            $barangTerjual = [
                'id_barang' => $item->id_barang,
                'kd_barang' => $item->barang->kd_barang,
                'kd_penjualan' => $lastKdPenjualan,
                'jumlah' => $item->jumlah_barang,
                'masa_garansi' => $item->masa_garansi,
            ];
            BarangTerjual::create($barangTerjual);
        }

        // Menyimpan data pembayaran baru ke dalam tabel Pembayaran
        Pembayaran::create($dataPembayaran);

        // Menghapus data penjualan sementara
        PenjualanSementara::where('id_staf', Auth::user()->id)->delete();

        return redirect()->route('adminpenjualan.index')->with('success', 'Berhasil Mengisi Pesanan');
    }

    public function edit(string $id)
    {
        $user = User::all();
        $spv = User::all();
        $admin = User::all();
        $barang = Barang::all();
        $barangterjual = BarangTerjual::where('kd_penjualan', $id)->get();
        $customer = Customer::all();
        $pembayaran = Pembayaran::all();
        $pengiriman = Pengiriman::all();
        $pengembalian = Pengembalian::all();
        $data = Penjualan::where('kd_penjualan', $id)->first();
        return view('admin.penjualan.edit', [
            'data' => $data, 'user' => $user, 'spv' => $spv, 'admin' => $admin, 'barang' => $barang, 'barangterjual' => $barangterjual, 'customer' => $customer,
            'pembayaran' => $pembayaran, 'pengiriman' => $pengiriman, 'pengembalian' => $pengembalian
        ]);
    }

    public function update(string $id)
    {
        $data = [
            'status_persetujuan'  => 'persetujuanspv',
            'id_admin'  => Auth::user()->id,
        ];
        Penjualan::where('kd_penjualan', $id)->update($data);
        return redirect()->route('adminpenjualan.index')->with('success', 'Barang Berhasil Di Checking');
    }

    public function destroy(string $id)
    {
        BarangTerjual::where('kd_penjualan', $id)->delete();
        Pembayaran::where('kd_penjualan', $id)->delete();
        Penjualan::where('kd_penjualan', $id)->delete();
        return redirect()->route('adminpenjualan.index')->with('success', 'Berhasil Menghapus Data Penjualan');
    }

    public function destroysementara($id)
    {
        PenjualanSementara::where('kd_penjualansementara', $id)->delete();
        return redirect()->back()->with('success', 'Berhasil Menghapus Penjualan Sementara');
    }

    public function show(Request $request, string $id)
    {
        $user = User::all();
        $spv = User::all();
        $admin = User::all();
        $barang = Barang::all();
        $barangterjual = BarangTerjual::where('kd_penjualan', $id)->get();
        $customer = Customer::all();
        $pembayaran = Pembayaran::all();
        $pengiriman = Pengiriman::all();
        $pengembalian = Pengembalian::all();
        $data = Penjualan::where('kd_penjualan', $id)->first();


        // Membuat objek Dompdf dengan opsi
        $options = new Options();
        $options->setIsRemoteEnabled(true);
        $dompdf = new Dompdf($options);

        // Menyusun tampilan PDF menggunakan blade view
        $html = view('admin.penjualan.pdf', [
            'data' => $data, 'user' => $user, 'spv' => $spv, 'admin' => $admin, 'barang' => $barang, 'barangterjual' => $barangterjual, 'customer' => $customer,
            'pembayaran' => $pembayaran, 'pengiriman' => $pengiriman, 'pengembalian' => $pengembalian
        ])->render();

        // Mengambil format HTML dan merender ke PDF
        $dompdf->loadHtml($html);

        // Mengatur ukuran dan orientasi halaman PDF
        $dompdf->setPaper('A4', 'portrait');

        // Render tampilan PDF
        $dompdf->render();

        // Menghasilkan file PDF dan menyimpannya ke dalam server
        $output = $dompdf->output();
        $filePath = public_path('invoice_penjualan.pdf');
        file_put_contents($filePath, $output);

        return response()->download($filePath)->deleteFileAfterSend(true);
    }

    public function generatePDF(Request $request, string $id)
    {
        $user = User::all();
        $spv = User::all();
        $admin = User::all();
        $barang = Barang::all();
        $barangterjual = BarangTerjual::where('kd_penjualan', $id)->get();
        $customer = Customer::all();
        $pembayaran = Pembayaran::all();
        $pengiriman = Pengiriman::all();
        $pengembalian = Pengembalian::all();
        $data = Penjualan::where('kd_penjualan', $id)->first();


        // Membuat objek Dompdf dengan opsi
        $options = new Options();
        $options->setIsRemoteEnabled(true);
        $dompdf = new Dompdf($options);

        // Menyusun tampilan PDF menggunakan blade view
        $html = view('admin.penjualan.pdf', [
            'data' => $data, 'user' => $user, 'spv' => $spv, 'admin' => $admin, 'barang' => $barang, 'barangterjual' => $barangterjual, 'customer' => $customer,
            'pembayaran' => $pembayaran, 'pengiriman' => $pengiriman, 'pengembalian' => $pengembalian
        ])->render();

        // Mengambil format HTML dan merender ke PDF
        $dompdf->loadHtml($html);

        // Mengatur ukuran dan orientasi halaman PDF
        $dompdf->setPaper('A4', 'portrait');

        // Render tampilan PDF
        $dompdf->render();

        // Menghasilkan file PDF dan menyimpannya ke dalam server
        $output = $dompdf->output();
        $filePath = public_path('invoice_penjualan.pdf');
        file_put_contents($filePath, $output);

        return response()->download($filePath)->deleteFileAfterSend(true);
    }
}
