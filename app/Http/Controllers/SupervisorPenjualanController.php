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

class SupervisorPenjualanController extends Controller
{

    public function index()
    {
        $data = Penjualan::with(['barangterjual', 'customer', 'user'])->orderBy('kd_penjualan')->get();
        return view('supervisor.penjualan.index', ['data' => $data]);
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
        return view('supervisor.penjualan.edit', [
            'data' => $data, 'user' => $user, 'spv' => $spv, 'admin' => $admin, 'barang' => $barang, 'barangterjual' => $barangterjual, 'customer' => $customer,
            'pembayaran' => $pembayaran, 'pengiriman' => $pengiriman, 'pengembalian' => $pengembalian
        ]);
    }

    public function update(Request $request, string $id)
    {
        $penjualan = Penjualan::where('kd_penjualan', $id)->first();
        $kd_customer = $penjualan->kd_customer;

        $barangterjual = BarangTerjual::where('kd_penjualan', $id)->get();

        $customer = Customer::where('kd_customer', $kd_customer)->first();
        $pembayaran = Pembayaran::where('kd_penjualan', $id)->first();

        $data_penjualan = [];
        $data_pembayaran = [];
        $data_pengiriman = [];
        $data_barang = [];
        $data_customer = [];

        if ($request->simpan == 'Setujui') {
            $data_penjualan = [
                'status_persetujuan' => 'disetujui',
                'status_pengiriman' => 'barangsiap',
                'id_spv'  => Auth::user()->id,
            ];

            $data_pembayaran = [
                'status_persetujuan' => 'disetujui',
                'id_spv'  => Auth::user()->id,
            ];

            $data_pengiriman = [
                'kd_penjualan' => $penjualan->kd_penjualan,
            ];

            $data_pengiriman = [
                'kd_penjualan' => $penjualan->kd_penjualan,
            ];

            foreach ($barangterjual as $item) {
                $barang = Barang::where('id_barang', $item->id_barang)->first();
                if ($barang->jumlah - $item->jumlah === 0) {
                    $data_barang = [
                        'jumlah' => $barang->jumlah - $item->jumlah,
                        'status_barang' => 'habis',
                    ];
                } else {
                    $data_barang = [
                        'jumlah' => $barang->jumlah - $item->jumlah,
                    ];
                }
                Barang::where('id_barang', $item->id_barang)->update($data_barang);
            }

            if (is_null($customer->utang)) {
                $data_customer = [
                    'utang' => $pembayaran->sisa_bayar,
                ];
            } else {
                $data_customer = [
                    'utang' => $customer->utang + $pembayaran->sisa_bayar,
                ];
            }
        } elseif ($request->simpan == 'Tolak') {
            $data_penjualan = [
                'status_persetujuan' => 'ditolak',
                'catatan' => $request->catatan,
            ];
        }

        Penjualan::where('kd_penjualan', $id)->update($data_penjualan);
        Pembayaran::where('kd_pembayaran', $pembayaran->kd_pembayaran)->update($data_pembayaran);
        Customer::where('kd_customer', $penjualan->kd_customer)->update($data_customer);

        if (!empty($data_pengiriman)) {
            Pengiriman::create($data_pengiriman);
        }

        return redirect()->route('supervisorpenjualan.index')->with('success', 'Barang Berhasil Di Checking');
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
        $html = view('supervisor.penjualan.pdf', [
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
        $html = view('supervisor.penjualan.pdf', [
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
