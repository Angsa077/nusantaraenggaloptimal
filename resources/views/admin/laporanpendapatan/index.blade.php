@extends('layouts.app')
@section('content')
    <div class="main-content container-fluid mt-5">
        <section class="section">
            <div class="card">
                <div class="card-header">
                    Laporan Pendapatan
                </div>
                <div class="card-body">
                    <div class="table-responsive-sm">

                        <form method="GET" action="{{ route('admin.laporanpendapatan.index') }}"
                            class="form-inline mb-3">
                            <label for="tanggal_awal" class="mr-2">Mulai Tanggal:</label>
                            <input type="date" name="tanggal_awal" id="tanggal_awal"
                                class="form-control form-control-sm mr-2" value="{{ request('tanggal_awal') }}">
                            <label for="tanggal_akhir" class="mr-2">Sampai Tanggal:</label>
                            <input type="date" name="tanggal_akhir" id="tanggal_akhir"
                                class="form-control form-control-sm mr-2" value="{{ request('tanggal_akhir') }}">
                            <button type="submit" class="btn btn-secondary mt-2">Filter</button>
                            <div class="d-flex justify-content-end ml-2">
                                <a href="{{ route('admin.laporanpendapatan.pdf', ['tanggal_awal' => $tanggalAwal, 'tanggal_akhir' => $tanggalAkhir]) }}"
                                    class="btn btn-secondary"><i class="fa fa-file-pdf"></i> Generate PDF</a>
                            </div>
                        </form>

                        <table class="table table-hover" id="myTable">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-left text-md">Tanggal Penjualan</th>
                                    <th scope="col" class="text-left text-md">Kode Penjualan</th>
                                    <th scope="col" class="text-left text-md">Nama Toko</th>
                                    <th scope="col" class="text-left text-md">Nama Barang</th>
                                    <th scope="col" class="text-left text-md">Barang Terjual</th>
                                    <th scope="col" class="text-left text-md">Harga Beli</th>
                                    <th scope="col" class="text-left text-md">Harga Jual</th>
                                    <th scope="col" class="text-left text-md">Pendapatan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $totalPendapatan = 0;
                                @endphp
                                @foreach ($data as $item)
                                    @if ($item->status_pengiriman == 'selesai' && $item->id_staf == Auth::user()->id)
                                        @php
                                            $pendapatan = ($item->barangterjual->barang->harga_jual - $item->barangterjual->barang->harga_beli) * $item->jumlah_barang;
                                            $totalPendapatan += $pendapatan;
                                        @endphp
                                        <tr
                                            onclick="window.location='{{ route('admin.penjualan.edit', $item->kd_penjualan) }}';">
                                            <td class="text-left text-md">{{ $item->tgl_penjualan }}</td>
                                            <td class="text-left text-md">{{ $item->kd_penjualan }}</td>
                                            <td class="text-left text-md">{{ $item->customer->nama_toko }}</td>
                                            <td class="text-left text-md">{{ $item->barangterjual->barang->nama }}</td>
                                            <td class="text-left text-md">{{ $item->jumlah_barang }} Barang</td>
                                            <?php $pendapatan = ($item->barangterjual->barang->harga_jual - $item->barangterjual->barang->harga_beli) * $item->jumlah_barang; ?>
                                            <td class="text-left text-md">
                                                {{ 'Rp ' . number_format($item->barangterjual->barang->harga_beli, 2, ',', '.') }}
                                            </td>
                                            <td class="text-left text-md">
                                                {{ 'Rp ' . number_format($item->barangterjual->barang->harga_jual, 2, ',', '.') }}
                                            </td>
                                            <td class="text-left text-md">
                                                {{ 'Rp ' . number_format($pendapatan, 2, ',', '.') }}
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="7" class="text-right"><strong>Total Pendapatan:</strong></td>
                                    <td class="text-left">{{ 'Rp ' . number_format($totalPendapatan, 2, ',', '.') }}</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
