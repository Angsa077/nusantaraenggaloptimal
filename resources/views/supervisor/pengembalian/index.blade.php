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
                                    <th scope="col" class="text-left text-md">Nama Toko</th>
                                    <th scope="col" class="text-left text-md">Jumlah Barang</th>
                                    <th scope="col" class="text-left text-md">Status Pengembalian</th>
                                    <th scope="col" class="text-left text-md">Status Persetujuan</th>
                                    <th scope="col" class="text-left text-md">Alasan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr
                                        onclick="window.location='{{ route('supervisor.pengembalian.edit', $item->kd_pengembalian) }}';">
                                        <td class="text-left text-md">{{ $item->tgl_pengembalian ?? 'Tidak ada' }}</td>
                                        <td class="text-left text-md">{{ $item->penjualan->kd_penjualan }}</td>
                                        <td class="text-left text-md">
                                            {{ $item->penjualan->customer ? $item->penjualan->customer->nama_toko : '' }}
                                        </td>
                                        <td class="text-left text-md">{{ $item->jumlah_barang }} Barang</td>
                                        <td class="text-left text-md">{{ $item->penjualan->status_pengembalian ?? 'Tidak ada'}}</td>
                                        <td class="text-left text-md">{{ $item->status_persetujuan }}</td>
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
