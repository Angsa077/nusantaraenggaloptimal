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
                                    $totalJumlahBarang = 0;
                                    $totalBarangTerjual = 0;
                                    $totalBarangDikembalikan = 0;
                                @endphp
                                @foreach ($data as $item)
                                    <?php
                                    $jumlah_barang = $item->jumlah ?? 0;
                                    $barang_terjual = $item->penjualanbarang->jumlah_barang ?? 0;
                                    $barang_dikembalikan = $item->pengembalian->jumlah_barang ?? 0;
                                    
                                    $totalJumlahBarang += $jumlah_barang;
                                    $totalBarangTerjual += $barang_terjual;
                                    $totalBarangDikembalikan += $barang_dikembalikan;
                                    ?>
                                    <tr onclick="window.location='{{ route('supervisorbarang.show', $item->kd_barang) }}';">
                                        <td class="text-left text-md">{{ $item->kd_barang }}</td>
                                        <td class="text-left text-md">{{ $item->nama }}</td>
                                        <td class="text-left text-md">{{ $item->jumlah }} Barang</td>
                                        <td class="text-left text-md">{{ $item->penjualanbarang->jumlah_barang ?? 0 }}
                                            Barang</td>
                                        <td class="text-left text-md">{{ $item->pengembalian->jumlah_barang ?? 0 }} Barang
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tr>
                                <td colspan="2" class="text-right"><strong>Total Barang:</strong></td>
                                <td class="text-left">{{ $totalJumlahBarang }} Barang</td>
                                <td class="text-left">{{ $totalBarangTerjual }} Barang</td>
                                <td class="text-left">{{ $totalBarangDikembalikan }} Barang</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
