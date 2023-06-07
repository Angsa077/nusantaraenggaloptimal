<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\BarangRusak;
use App\Models\Pengiriman;
use App\Models\Penjualan;
use Illuminate\Http\Request;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\View;

class SupervisorLaporanStokbarangPengembalian extends Controller
{
    public function index(Request $request)
    {
        $tanggalAwal = $request->input('tanggal_awal');
        $tanggalAkhir = $request->input('tanggal_akhir');

        $barang = Barang::all();
        $pengiriman = Pengiriman::all();
        $penjualanbarang = Penjualan::all();
        $data = BarangRusak::all();

        if ($tanggalAwal && $tanggalAkhir) {
            $barang = Barang::all();
            $pengiriman = Pengiriman::all();
            $penjualanbarang = Penjualan::all();
            $data = BarangRusak::whereBetween('tgl_barangpengembalian', [$tanggalAwal, $tanggalAkhir])->get();
        }
        return view('supervisor.stokbarangpengembalian.index', ['data' => $data, 'barang' => $barang, 'penjualanbarang' => $penjualanbarang, 'pengiriman' => $pengiriman, 'tanggalAwal' => $tanggalAwal, 'tanggalAkhir' => $tanggalAkhir]);
    }

    public function generatePDF(Request $request)
    {
        $tanggalAwal = $request->input('tanggal_awal');
        $tanggalAkhir = $request->input('tanggal_akhir');

        $barang = Barang::all();
        $pengiriman = Pengiriman::all();
        $penjualanbarang = Penjualan::all();
        $data = BarangRusak::all();

        if ($tanggalAwal && $tanggalAkhir) {
            $barang = Barang::all();
            $pengiriman = Pengiriman::all();
            $penjualanbarang = Penjualan::all();
            $data = BarangRusak::whereBetween('tgl_barangpengembalian', [$tanggalAwal, $tanggalAkhir])->get();
        }

        // Membuat objek Dompdf
        $dompdf = new Dompdf();

        // Menyusun tampilan PDF menggunakan blade view
        $html = view('supervisor.stokbarangpengembalian.pdf', ['data' => $data, 'barang' => $barang, 'pengiriman' => $pengiriman, 'penjualanbarang' => $penjualanbarang, 'tanggalAwal' => $tanggalAwal, 'tanggalAkhir' => $tanggalAkhir])->render();

        // Mengambil format HTML dan merender ke PDF
        $dompdf->loadHtml($html);

        // Mengatur ukuran dan orientasi halaman PDF
        $dompdf->setPaper('A4', 'portrait');

        // Render tampilan PDF
        $dompdf->render();

        // Menghasilkan file PDF dan menyimpannya ke dalam server
        $dompdf->stream("laporan_stokbarangpengembalian.pdf", ["Attachment" => false]);
    }

    public function show(Request $request)
    {
        $tanggalAwal = $request->input('tanggal_awal');
        $tanggalAkhir = $request->input('tanggal_akhir');

        $barang = Barang::all();
        $pengiriman = Pengiriman::all();
        $penjualanbarang = Penjualan::all();
        $data = BarangRusak::all();

        if ($tanggalAwal && $tanggalAkhir) {
            $barang = Barang::all();
            $pengiriman = Pengiriman::all();
            $penjualanbarang = Penjualan::all();
            $data = BarangRusak::whereBetween('tgl_barangpengembalian', [$tanggalAwal, $tanggalAkhir])->get();
        }

        // Membuat objek Dompdf
        $dompdf = new Dompdf();

        // Menyusun tampilan PDF menggunakan blade view
        $html = view('supervisor.stokbarangpengembalian.pdf', ['data' => $data, 'barang' => $barang, 'pengiriman' => $pengiriman, 'penjualanbarang' => $penjualanbarang, 'tanggalAwal' => $tanggalAwal, 'tanggalAkhir' => $tanggalAkhir])->render();

        // Mengambil format HTML dan merender ke PDF
        $dompdf->loadHtml($html);

        // Mengatur ukuran dan orientasi halaman PDF
        $dompdf->setPaper('A4', 'portrait');

        // Render tampilan PDF
        $dompdf->render();

        // Menghasilkan file PDF dan menyimpannya ke dalam server
        $dompdf->stream("laporan_stokbarangpengembalian.pdf", ["Attachment" => false]);
    }
}
