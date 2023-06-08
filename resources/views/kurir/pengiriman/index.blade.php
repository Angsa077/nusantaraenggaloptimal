@extends('layouts.app')
@section('content')
    <div class="main-content container-fluid mt-5">
        <section class="section">
            <div class="card">
                <div class="card-header">
                    Pengiriman
                </div>
                <div class="card-body">
                    <div class="table-responsive-sm">
                        <table class="table table-hover" id="myTable">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-left text-md">Kode Penjualan</th>
                                    <th scope="col" class="text-left text-md">Nama Toko</th>
                                    <th scope="col" class="text-left text-md">Alamat</th>
                                    <th scope="col" class="text-left text-md">Status</th>
                                    <th scope="col" class="text-left text-md">Tgl Pengambilan</th>
                                    <th scope="col" class="text-left text-md">Tgl Sampai</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                <tr onclick="window.location='{{ route('kurirpengiriman.edit', $item->kd_pengiriman) }}';">
                                    <td class="text-left text-md">{{ $item->penjualan->kd_penjualan }}</td>
                                    <td class="text-left text-md">{{ $item->penjualan->customer ? $item->penjualan->customer->nama_toko : '' }}</td>
                                    <td class="text-left text-md">{{ $item->penjualan->customer ? $item->penjualan->customer->alamat : '' }}</td>
                                    <td class="text-left text-md">{{ $item->penjualan->status_pengiriman }}</td>
                                    <td class="text-left text-md">{{ $item->tgl_pengiriman ?? 'Belum Diambil' }}</td>
                                    <td class="text-left text-md">{{ $item->tgl_sampai ?? 'Belum Sampai' }} </td>
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
