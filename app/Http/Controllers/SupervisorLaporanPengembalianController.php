<?php

namespace App\Http\Controllers;

use App\Models\Pengembalian;
use App\Models\Penjualan;
use Illuminate\Http\Request;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\View;

class SupervisorLaporanPengembalianController extends Controller
{
    public function index(Request $request)
    {
        $tanggalAwal = $request->input('tanggal_awal');
        $tanggalAkhir = $request->input('tanggal_akhir');

        $penjualan = Penjualan::with(['barangterjual', 'customer', 'user'])->get();
        $data = Pengembalian::with('penjualan')->get();

        if ($tanggalAwal && $tanggalAkhir) {
            $data = Pengembalian::whereBetween('tgl_pengembalian', [$tanggalAwal, $tanggalAkhir])->get();
        }
        return view('supervisor.laporanpengembalian.index', ['data' => $data, 'penjualan' => $penjualan, 'tanggalAwal' => $tanggalAwal, 'tanggalAkhir' => $tanggalAkhir]);
    }

    public function generatePDF(Request $request)
    {
        $tanggalAwal = $request->input('tanggal_awal');
        $tanggalAkhir = $request->input('tanggal_akhir');

        $penjualan = Penjualan::with(['barangterjual', 'customer', 'user'])->get();
        $data = Pengembalian::with('penjualan')->get();

        if ($tanggalAwal && $tanggalAkhir) {
            $data = Pengembalian::whereBetween('tgl_pengembalian', [$tanggalAwal, $tanggalAkhir])->get();
        }

        // Membuat objek Dompdf
        $dompdf = new Dompdf();

        // Menyusun tampilan PDF menggunakan blade view
        $html = view('supervisor.laporanpengembalian.pdf', ['data' => $data, 'penjualan' => $penjualan, 'tanggalAwal' => $tanggalAwal, 'tanggalAkhir' => $tanggalAkhir]);

        // Mengambil format HTML dan merender ke PDF
        $dompdf->loadHtml($html);

        // Mengatur ukuran dan orientasi halaman PDF
        $dompdf->setPaper('A4', 'portrait');

        // Render tampilan PDF
        $dompdf->render();

        // Menghasilkan file PDF dan menyimpannya ke dalam server
        $dompdf->stream("laporan_pengembalian.pdf", ["Attachment" => false]);
    }

    public function show(Request $request)
    {
        $tanggalAwal = $request->input('tanggal_awal');
        $tanggalAkhir = $request->input('tanggal_akhir');

        $penjualan = Penjualan::with(['barangterjual', 'customer', 'user'])->get();
        $data = Pengembalian::with('penjualan')->get();

        if ($tanggalAwal && $tanggalAkhir) {
            $data = Pengembalian::whereBetween('tgl_pengembalian', [$tanggalAwal, $tanggalAkhir])->get();
        }

        // Membuat objek Dompdf
        $dompdf = new Dompdf();

        // Menyusun tampilan PDF menggunakan blade view
        $html = view('supervisor.laporanpengembalian.pdf', ['data' => $data, 'penjualan' => $penjualan, 'tanggalAwal' => $tanggalAwal, 'tanggalAkhir' => $tanggalAkhir]);

        // Mengambil format HTML dan merender ke PDF
        $dompdf->loadHtml($html);

        // Mengatur ukuran dan orientasi halaman PDF
        $dompdf->setPaper('A4', 'portrait');

        // Render tampilan PDF
        $dompdf->render();

        // Menghasilkan file PDF dan menyimpannya ke dalam server
        $dompdf->stream("laporan_pengembalian.pdf", ["Attachment" => false]);
    }
}
