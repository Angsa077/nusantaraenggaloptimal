@extends('layouts.app')
@section('content')
    <div class="main-content container-fluid mt-5">
        <section class="section">
            <div class="card">
                <div class="card-header">
                    Pengembalian
                </div>
                <div class="card-body">
                    <div class="table-responsive-sm">
                        <table class="table table-hover" id="myTable">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-left text-md">Tanggal Pengembalian</th>
                                    <th scope="col" class="text-left text-md">Kode Penjualan</th>
                                    <th scope="col" class="text-left text-md">Nama Barang</th>
                                    <th scope="col" class="text-left text-md">Nama Customer</th>
                                    <th scope="col" class="text-left text-md">Status Pengembalian</th>
                                    <th scope="col" class="text-left text-md">Status Persetujuan</th>
                                    <th scope="col" class="text-left text-md">Alasan</th>
                                    <th scope="col" class="text-left text-md">Proses</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <td class="text-left text-md">{{ $item->tgl_pengembalian  ?? 'Tidak ada' }}</td>
                                        <td class="text-left text-md">{{ $item->penjualan->kd_penjualan  }}</td>
                                        <td class="text-left text-md">{{ $item->penjualan->customer ? $item->penjualan->customer->nama_toko : '' }}</td>
                                        <td class="text-left text-md">{{ $item->penjualan->barang ? $item->penjualan->barang->nama : '' }}</td>
                                        <td class="text-left text-md">{{ $item->penjualan->status_pengembalian }}</td>
                                        <td class="text-left text-md">{{ $item->status_persetujuan }}</td>
                                        <td class="text-left text-md">{{ $item->catatan  ?? 'Tidak ada' }}</td>
                                        <td class="text-left text-md"><a href="{{ route('kurirpengembalian.edit', $item->kd_pengembalian) }}"
                                                class="btn"><i data-feather="send"></i></a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="col-3 col-md-3 order-md-2 order-last"> <a href="{{ route('kurirpengembalian.create') }}"
                                class="btn btn-secondary mr-3">
                                Ajukan Pengembalian</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
