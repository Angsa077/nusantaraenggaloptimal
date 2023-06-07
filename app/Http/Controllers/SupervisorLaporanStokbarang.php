<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Pengiriman;
use App\Models\Penjualan;
use Illuminate\Http\Request;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\View;

class SupervisorLaporanStokbarang extends Controller
{

    public function index()
    {
        $pengiriman = Pengiriman::all();
        $penjualanbarang = Penjualan::all();
        $data = Barang::all();
        return view('supervisor.stokbarang.index', ['data' => $data, 'penjualanbarang' => $penjualanbarang, 'pengiriman' => $pengiriman]);
    }

    public function generatePDF(Request $request)
    {
        $pengiriman = Pengiriman::all();
        $penjualanbarang = Penjualan::all();
        $data = Barang::all();

        // Membuat objek Dompdf
        $dompdf = new Dompdf();

        // Menyusun tampilan PDF menggunakan blade view
        $html = view('supervisor.stokbarang.pdf', ['data' => $data, 'pengiriman' => $pengiriman, 'penjualanbarang' => $penjualanbarang])->render();

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
        $pengiriman = Pengiriman::all();
        $penjualanbarang = Penjualan::all();
        $data = Barang::all();

        // Membuat objek Dompdf
        $dompdf = new Dompdf();

        // Menyusun tampilan PDF menggunakan blade view
        $html = view('supervisor.stokbarang.pdf', ['data' => $data, 'pengiriman' => $pengiriman, 'penjualanbarang' => $penjualanbarang])->render();

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
