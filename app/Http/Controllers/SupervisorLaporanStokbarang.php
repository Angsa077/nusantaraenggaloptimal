<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\BarangRusak;
use App\Models\BarangTerjual;
use App\Models\Pengiriman;
use App\Models\Penjualan;
use Illuminate\Http\Request;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\View;

class SupervisorLaporanStokbarang extends Controller
{

    public function index()
    {
        $data = Barang::all();
        $barangterjual = BarangTerjual::all();
        $barangrusak = BarangRusak::all();

        // Mengambil jumlah total berdasarkan kd_barang
        $totalJumlah = Barang::groupBy('kd_barang')->selectRaw('kd_barang, sum(jumlah) as total_jumlah')->get();
        $totalJumlahterjual = BarangTerjual::groupBy('kd_barang')->selectRaw('kd_barang, sum(jumlah) as total_jumlahterjual')->get();
        $totalJumlahrusak = BarangRusak::groupBy('kd_barang')->selectRaw('kd_barang, sum(jumlah) as total_jumlahrusak')->get();

        return view('supervisor.stokbarang.index', [
            'data' => $data,
            'barangterjual' => $barangterjual,
            'barangrusak' => $barangrusak,
            'totalJumlah' => $totalJumlah,
            'totalJumlahterjual' => $totalJumlahterjual,
            'totalJumlahrusak' => $totalJumlahrusak,
        ]);
    }


    public function generatePDF(Request $request)
    {
        $data = Barang::all();
        $barangterjual = BarangTerjual::all();
        $barangrusak = BarangRusak::all();

        // Mengambil jumlah total berdasarkan kd_barang
        $totalJumlah = Barang::groupBy('kd_barang')->selectRaw('kd_barang, sum(jumlah) as total_jumlah')->get();
        $totalJumlahterjual = BarangTerjual::groupBy('kd_barang')->selectRaw('kd_barang, sum(jumlah) as total_jumlahterjual')->get();
        $totalJumlahrusak = BarangRusak::groupBy('kd_barang')->selectRaw('kd_barang, sum(jumlah) as total_jumlahrusak')->get();

        // Membuat objek Dompdf
        $dompdf = new Dompdf();

        // Menyusun tampilan PDF menggunakan blade view
        $html = view('supervisor.stokbarang.pdf', [
            'data' => $data,
            'barangterjual' => $barangterjual,
            'barangrusak' => $barangrusak,
            'totalJumlah' => $totalJumlah,
            'totalJumlahterjual' => $totalJumlahterjual,
            'totalJumlahrusak' => $totalJumlahrusak
        ])->render();

        // Mengambil format HTML dan merender ke PDF
        $dompdf->loadHtml($html);

        // Mengatur ukuran dan orientasi halaman PDF
        $dompdf->setPaper('A4', 'portrait');

        // Render tampilan PDF
        $dompdf->render();

        // Menghasilkan file PDF dan menyimpannya ke dalam server
        $dompdf->stream("laporan_stokbarang.pdf", ["Attachment" => false]);
    }

    public function show(Request $request)
    {
        $data = Barang::all();
        $barangterjual = BarangTerjual::all();
        $barangrusak = BarangRusak::all();

        // Mengambil jumlah total berdasarkan kd_barang
        $totalJumlah = Barang::groupBy('kd_barang')->selectRaw('kd_barang, sum(jumlah) as total_jumlah')->get();
        $totalJumlahterjual = BarangTerjual::groupBy('kd_barang')->selectRaw('kd_barang, sum(jumlah) as total_jumlahterjual')->get();
        $totalJumlahrusak = BarangRusak::groupBy('kd_barang')->selectRaw('kd_barang, sum(jumlah) as total_jumlahrusak')->get();

        // Membuat objek Dompdf
        $dompdf = new Dompdf();

        // Menyusun tampilan PDF menggunakan blade view
        $html = view('supervisor.stokbarang.pdf', [
            'data' => $data,
            'barangterjual' => $barangterjual,
            'barangrusak' => $barangrusak,
            'totalJumlah' => $totalJumlah,
            'totalJumlahterjual' => $totalJumlahterjual,
            'totalJumlahrusak' => $totalJumlahrusak
        ])->render();

        // Mengambil format HTML dan merender ke PDF
        $dompdf->loadHtml($html);

        // Mengatur ukuran dan orientasi halaman PDF
        $dompdf->setPaper('A4', 'portrait');

        // Render tampilan PDF
        $dompdf->render();

        // Menghasilkan file PDF dan menyimpannya ke dalam server
        $dompdf->stream("laporan_stokbarang.pdf", ["Attachment" => false]);
    }
}
