@extends('layouts.app')
@section('content')
    <div class="main-content container-fluid mt-5">
        <section class="section">
            <div class="card">
                <div class="card-header">
                    Laporan Stok Barang
                </div>
                <div class="card-body">
                    <div class="table-responsive-sm">

                        <form method="GET" action="{{ route('supervisorstokbarang.index') }}" class="form-inline mb-3">
                            <div class="d-flex justify-content-end ml-2">
                                <a href="{{ route('supervisorstokbarang.pdf') }}" class="btn btn-secondary"><i
                                        class="fa fa-file-pdf"></i> Generate PDF</a>
                            </div>
                        </form>

                        <table class="table table-hover" id="myTable">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-left text-md">Kode Barang</th>
                                    <th scope="col" class="text-left text-md">Nama Barang</th>
                                    <th scope="col" class="text-left text-md">Jumlah Barang</th>
                                    <th scope="col" class="text-left text-md">Barang Terjual</th>
                                    <th scope="col" class="text-left text-md">Barang Dikembalikan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $totalSeluruhJumlahBarang = 0;
                                    $totalSeluruhBarangTerjual = 0;
                                    $totalSeluruhBarangDikembalikan = 0;
                                @endphp
                                @foreach ($data->unique('kd_barang') as $item)
                                    @php
                                        $totalJumlahBarang = $totalJumlah->where('kd_barang', $item->kd_barang)->first();
                                        $totalBarangTerjual = $totalJumlahterjual->where('kd_barang', $item->kd_barang)->first();
                                        $totalBarangDikembalikan = $totalJumlahrusak->where('kd_barang', $item->kd_barang)->first();
                                        
                                        $totalSeluruhJumlahBarang += $totalJumlahBarang ? $totalJumlahBarang->total_jumlah : 0;
                                        $totalSeluruhBarangTerjual += $totalBarangTerjual ? $totalBarangTerjual->total_jumlahterjual : 0;
                                        $totalSeluruhBarangDikembalikan += $totalBarangDikembalikan ? $totalBarangDikembalikan->total_jumlahrusak : 0;
                                    @endphp
                                    <tr onclick="window.location='{{ route('supervisorbarang.show', $item->kd_barang) }}';">
                                        <td class="text-left text-md">{{ $item->kd_barang }}</td>
                                        <td class="text-left text-md">{{ $item->nama }}</td>
                                        <td class="text-left text-md">
                                            {{ $totalJumlahBarang ? $totalJumlahBarang->total_jumlah : 0 }} Barang</td>
                                        <td class="text-left text-md">
                                            {{ $totalBarangTerjual ? $totalBarangTerjual->total_jumlahterjual : 0 }} Barang
                                        </td>
                                        <td class="text-left text-md">
                                            {{ $totalBarangDikembalikan ? $totalBarangDikembalikan->total_jumlahrusak : 0 }}
                                            Barang</td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th scope="col" class="text-left text-md">Total</th>
                                    <th scope="col"></th>
                                    <th scope="col" class="text-left text-md" id="total-jumlah-barang">
                                        {{ $totalSeluruhJumlahBarang }} Barang</th>
                                    <th scope="col" class="text-left text-md" id="total-barang-terjual">
                                        {{ $totalSeluruhBarangTerjual }} Barang</th>
                                    <th scope="col" class="text-left text-md" id="total-barang-dikembalikan">
                                        {{ $totalSeluruhBarangDikembalikan }} Barang</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
