@extends('layouts.app')
@section('content')
    <div class="main-content container-fluid mt-5">
        <section class="section">
            <div class="card">
                <div class="card-header">
                    Laporan Pengiriman
                </div>
                <div class="card-body">
                    <div class="table-responsive-sm">

                        <form method="GET" action="{{ route('kurir.laporanpengiriman.index') }}" class="form-inline mb-3">
                            <label for="tanggal_awal" class="mr-2">Mulai Tanggal:</label>
                            <input type="date" name="tanggal_awal" id="tanggal_awal" class="form-control form-control-sm mr-2"
                                value="{{ request('tanggal_awal') }}">
                            <label for="tanggal_akhir" class="mr-2">Sampai Tanggal:</label>
                            <input type="date" name="tanggal_akhir" id="tanggal_akhir" class="form-control form-control-sm mr-2"
                                value="{{ request('tanggal_akhir') }}">
                            <button type="submit" class="btn btn-secondary mt-2">Filter</button>
                            <div class="d-flex justify-content-end ml-2">
                                <a href="{{ route('kurir.laporanpengiriman.pdf', ['tanggal_awal' => $tanggalAwal, 'tanggal_akhir' => $tanggalAkhir]) }}"
                                    class="btn btn-secondary"><i class="fa fa-file-pdf"></i> Generate PDF</a>
                            </div>
                        </form>

                        <table class="table table-hover" id="myTable">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-left text-md">Kode Penjualan</th>
                                    <th scope="col" class="text-left text-md">Nama Toko</th>
                                    <th scope="col" class="text-left text-md">Nama Barang</th>
                                    <th scope="col" class="text-left text-md">Jumlah Barang</th>
                                    <th scope="col" class="text-left text-md">Nama Penerima</th>
                                    <th scope="col" class="text-left text-md">Tanggal Pengiriman</th>
                                    <th scope="col" class="text-left text-md">Tanggal Sampai</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    @if ($item->status_pengiriman == 'selesai' && $item->pengiriman->id_staf == Auth::user()->id)
                                    <tr>
                                        <td class="text-left text-md">{{ $item->kd_penjualan }}</td>
                                        <td class="text-left text-md">{{ $item->customer->nama_toko }}</td>
                                        <td class="text-left text-md">{{ $item->barangterjual->barang->nama }}</td>
                                        <td class="text-left text-md">{{ $item->jumlah_barang }} Barang</td>
                                        <td class="text-left text-md">{{ $item->pengiriman->nama_penerima }}</td>
                                        <td class="text-left text-md">{{ $item->pengiriman->tgl_pengiriman }}</td>
                                        <td class="text-left text-md">{{ $item->pengiriman->tgl_sampai }}</td>
                                    </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
