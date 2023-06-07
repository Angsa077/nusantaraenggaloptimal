@extends('layouts.app')
@section('content')
    <div class="main-content container-fluid mt-5">
        <section class="section">
            <div class="card">
                <div class="card-header">
                    Laporan Stok Barang Pengembalian
                </div>
                <div class="card-body">
                    <div class="table-responsive-sm">

                        <form method="GET" action="{{ route('supervisorstokbarangpengembalian.index') }}"
                            class="form-inline mb-3">
                            <label for="tanggal_awal" class="mr-2">Mulai Tanggal:</label>
                            <input type="date" name="tanggal_awal" id="tanggal_awal"
                                class="form-control form-control-sm mr-2" value="{{ request('tanggal_awal') }}">
                            <label for="tanggal_akhir" class="mr-2">Sampai Tanggal:</label>
                            <input type="date" name="tanggal_akhir" id="tanggal_akhir"
                                class="form-control form-control-sm mr-2" value="{{ request('tanggal_akhir') }}">
                            <button type="submit" class="btn btn-secondary mt-2">Filter</button>
                            <div class="d-flex justify-content-end ml-2">
                                <a href="{{ route('supervisorstokbarangpengembalian.pdf', ['tanggal_awal' => $tanggalAwal, 'tanggal_akhir' => $tanggalAkhir]) }}"
                                    class="btn btn-secondary"><i class="fa fa-file-pdf"></i> Generate PDF</a>
                            </div>
                        </form>

                        <table class="table table-hover" id="myTable">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-left text-md">Tgl Penerimaan Barang</th>
                                    <th scope="col" class="text-left text-md">Kode Penjualan</th>
                                    <th scope="col" class="text-left text-md">Kode Barang</th>
                                    <th scope="col" class="text-left text-md">Nama Barang</th>
                                    <th scope="col" class="text-left text-md">Jumlah Barang</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $totalJumlahBarang = 0;
                                @endphp
                                @foreach ($data as $item)
                                    <?php
                                    $JumlahBarang = $item->barang->jumlah;
                                    $totalJumlahBarang += $JumlahBarang;
                                    ?>
                                    <tr
                                        onclick="window.location='{{ route('supervisorpengembalian.show', $item->kd_pengembalian) }}';">
                                        <td class="text-left text-md">{{ $item->tgl_barangpengembalian }}</td>
                                        <td class="text-left text-md">{{ $item->kd_penjualan }}</td>
                                        <td class="text-left text-md">{{ $item->kd_barang }}</td>
                                        <td class="text-left text-md">{{ $item->barang->nama }}</td>
                                        <td class="text-left text-md">{{ $item->barang->jumlah }} Barang</td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tr>
                                <td colspan="4" class="text-right"><strong>Total Barang:</strong></td>
                                <td class="text-left">{{ $totalJumlahBarang }} Barang</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
