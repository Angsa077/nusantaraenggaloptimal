@extends('layouts.app')
@section('content')
    <div class="main-content container-fluid mt-5">
        <section class="section">
            <div class="card">
                <div class="card-header">
                    Laporan Pengembalian
                </div>
                <div class="card-body">
                    <div class="table-responsive-sm">

                        <form method="GET" action="{{ route('supervisor.laporanpengembalian.index') }}" class="form-inline mb-3">
                            <label for="tanggal_awal" class="mr-2">Mulai Tanggal:</label>
                            <input type="date" name="tanggal_awal" id="tanggal_awal" class="form-control form-control-sm mr-2"
                                value="{{ request('tanggal_awal') }}">
                            <label for="tanggal_akhir" class="mr-2">Sampai Tanggal:</label>
                            <input type="date" name="tanggal_akhir" id="tanggal_akhir" class="form-control form-control-sm mr-2"
                                value="{{ request('tanggal_akhir') }}">
                            <button type="submit" class="btn btn-secondary mt-2">Filter</button>
                            <div class="d-flex justify-content-end ml-2">
                                <a href="{{ route('supervisor.laporanpengembalian.pdf', ['tanggal_awal' => $tanggalAwal, 'tanggal_akhir' => $tanggalAkhir]) }}"
                                    class="btn btn-secondary"><i class="fa fa-file-pdf"></i> Generate PDF</a>
                            </div>
                        </form>

                        <table class="table table-hover" id="myTable">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-left text-md">Tanggal Pengembalian</th>
                                    <th scope="col" class="text-left text-md">Kode Penjualan</th>
                                    <th scope="col" class="text-left text-md">Nama Toko</th>
                                    <th scope="col" class="text-left text-md">Jumlah</th>
                                    <th scope="col" class="text-left text-md">Status</th>
                                    <th scope="col" class="text-left text-md">Alasan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <td class="text-left text-md">{{ $item->tgl_pengembalian ?? 'Tidak ada' }}</td>
                                        <td class="text-left text-md">{{ $item->penjualan->kd_penjualan }}</td>
                                        <td class="text-left text-md">
                                            {{ $item->penjualan->customer ? $item->penjualan->customer->nama_toko : '' }}
                                        </td>
                                        <td class="text-left text-md">{{ $item->jumlah_barang }} Barang</td>
                                        <td class="text-left text-md">{{ $item->penjualan->status_pengembalian ?? 'Tidak ada'}}</td>
                                        <td class="text-left text-md">{{ $item->catatan ?? 'Tidak ada' }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
