<?php

namespace App\Http\Controllers;

use App\Models\Pengembalian;
use App\Models\Penjualan;
use Illuminate\Http\Request;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\View;


class KepalaCabangLaporanPenjualanController extends Controller
{
    public function index(Request $request)
    {
        $tanggalAwal = $request->input('tanggal_awal');
        $tanggalAkhir = $request->input('tanggal_akhir');

        $pengembalian = Pengembalian::all();
        $data = Penjualan::with(['barangterjual', 'customer', 'user'])->orderBy('kd_penjualan')->get();

        if ($tanggalAwal && $tanggalAkhir) {
            $data = Penjualan::whereBetween('tgl_penjualan', [$tanggalAwal, $tanggalAkhir])->get();
        }
        return view('kepalacabang.laporanpenjualan.index', ['data' => $data, 'pengembalian' => $pengembalian, 'tanggalAwal' => $tanggalAwal, 'tanggalAkhir' => $tanggalAkhir]);
    }

    public function generatePDF(Request $request)
    {
        $tanggalAwal = $request->input('tanggal_awal');
        $tanggalAkhir = $request->input('tanggal_akhir');

        $data = Penjualan::with(['barangterjual', 'customer', 'user'])->orderBy('kd_penjualan')->get();

        if ($tanggalAwal && $tanggalAkhir) {
            $data = Penjualan::whereBetween('tgl_penjualan', [$tanggalAwal, $tanggalAkhir])->get();
        }

        // Membuat objek Dompdf
        $dompdf = new Dompdf();

        // Menyusun tampilan PDF menggunakan blade view
        $html = view('kepalacabang.laporanpenjualan.pdf', ['data' => $data, 'tanggalAwal' => $tanggalAwal, 'tanggalAkhir' => $tanggalAkhir])->render();

        // Mengambil format HTML dan merender ke PDF
        $dompdf->loadHtml($html);

        // Mengatur ukuran dan orientasi halaman PDF
        $dompdf->setPaper('A4', 'portrait');

        // Render tampilan PDF
        $dompdf->render();

        // Menghasilkan file PDF dan menyimpannya ke dalam server
        $dompdf->stream("laporan_penjualan.pdf", ["Attachment" => false]);
    }

    public function show(Request $request)
    {
        $tanggalAwal = $request->input('tanggal_awal');
        $tanggalAkhir = $request->input('tanggal_akhir');

        $data = Penjualan::with(['barangterjual', 'customer', 'user'])->orderBy('kd_penjualan')->get();

        if ($tanggalAwal && $tanggalAkhir) {
            $data = Penjualan::whereBetween('tgl_penjualan', [$tanggalAwal, $tanggalAkhir])->get();
        }

        // Mengatur tampilan PDF dengan menggunakan view
        $pdf = View::make('kepalacabang.laporanpenjualan.pdf', [
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
        $dompdf->stream("laporan_penjualan.pdf");
    }
}
