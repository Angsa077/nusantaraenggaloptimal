<?php

namespace App\Http\Controllers;
use App\Models\Customer;
use Dompdf\Dompdf;
use Illuminate\Http\Request;

class KepalaCabangLaporanPiutangController extends Controller
{
    public function index()
    {
        $data = Customer::orderBy('kd_customer')->get();
        return view('kepalacabang.laporanpiutang.index',  ['data'=>$data]);
    }

    public function generatePDF(Request $request)
    {  
        $data = Customer::orderBy('kd_customer')->get();
        $dompdf = new Dompdf();
        $html = view('kepalacabang.laporanpiutang.pdf', ['data' => $data])->render();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream("laporan_piutang.pdf", ["Attachment" => false]);
     }

    public function show(Request $request)
    {
        $data = Customer::orderBy('kd_customer')->get();
        $dompdf = new Dompdf();
        $html = view('kepalacabang.laporanpiutang.pdf', ['data' => $data])->render();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream("laporan_piutang.pdf", ["Attachment" => false]);
    }
}
