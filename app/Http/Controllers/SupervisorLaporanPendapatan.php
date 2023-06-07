<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Penjualan;
use Illuminate\Http\Request;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\View;

class SupervisorLaporanPendapatan extends Controller
{
    public function index(Request $request)
    {
        $tanggalAwal = $request->input('tanggal_awal');
        $tanggalAkhir = $request->input('tanggal_akhir');

        $barang = Barang::all();
        $data = Penjualan::with(['barang', 'customer', 'user'])->orderBy('kd_penjualan')->get();

        if ($tanggalAwal && $tanggalAkhir) {
            $data = Penjualan::whereBetween('tgl_penjualan', [$tanggalAwal, $tanggalAkhir])->get();
        }
        return view('supervisor.laporanpendapatan.index', ['data' => $data, 'barang' => $barang, 'tanggalAwal' => $tanggalAwal, 'tanggalAkhir' => $tanggalAkhir]);
    }

    public function generatePDF(Request $request)
    {
        $tanggalAwal = $request->input('tanggal_awal');
        $tanggalAkhir = $request->input('tanggal_akhir');

        $data = Penjualan::with(['barang', 'customer', 'user'])->orderBy('kd_penjualan')->get();

        if ($tanggalAwal && $tanggalAkhir) {
            $data = Penjualan::whereBetween('tgl_penjualan', [$tanggalAwal, $tanggalAkhir])->get();
        }

        // Membuat objek Dompdf
        $dompdf = new Dompdf();

        // Menyusun tampilan PDF menggunakan blade view
        $html = view('supervisor.laporanpendapatan.pdf', ['data' => $data, 'tanggalAwal' => $tanggalAwal, 'tanggalAkhir' => $tanggalAkhir])->render();

        // Mengambil format HTML dan merender ke PDF
        $dompdf->loadHtml($html);

        // Mengatur ukuran dan orientasi halaman PDF
        $dompdf->setPaper('A4', 'portrait');

        // Render tampilan PDF
        $dompdf->render();

        // Menghasilkan file PDF dan menyimpannya ke dalam server
        $dompdf->stream("laporan_pendapatan.pdf", ["Attachment" => false]);
    }

    public function show(Request $request)
    {
        $tanggalAwal = $request->input('tanggal_awal');
        $tanggalAkhir = $request->input('tanggal_akhir');

        $data = Penjualan::with(['barang', 'customer', 'user'])->orderBy('kd_penjualan')->get();

        if ($tanggalAwal && $tanggalAkhir) {
            $data = Penjualan::whereBetween('tgl_penjualan', [$tanggalAwal, $tanggalAkhir])->get();
        }

        // Mengatur tampilan PDF dengan menggunakan view
        $pdf = View::make('supervisor.laporanpendapatan.pdf', [
            'data' => $data,
            'tanggalAwal' => $tanggalAwal,
            'tanggalAkhir' => $tanggalAkhir
        ])->render();

        // Membuat objek Dompdf
        $dompdf = new Dompdf();

        // Load HTML ke Dompdf
        $dompdf->loadHtml($pdf);

        // Render tampilan PDF
        $dompdf->render();

        // Menghasilkan file PDF dan menyimpannya ke dalam server
        $dompdf->stream("laporan_pendapatan.pdf");
    }
}
