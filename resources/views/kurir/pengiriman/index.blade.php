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
                                    <th scope="col" class="text-left text-md">KD Pengiriman</th>
                                    <th scope="col" class="text-left text-md">Kode Penjualan</th>
                                    <th scope="col" class="text-left text-md">Nama Customer</th>
                                    <th scope="col" class="text-left text-md">Nama Barang</th>
                                    <th scope="col" class="text-left text-md">Status</th>
                                    <th scope="col" class="text-left text-md">Proses</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                <tr>
                                    <td class="text-left text-md">{{ $item->kd_pengiriman }}</td>
                                    <td class="text-left text-md">{{ $item->penjualan->kd_penjualan }}</td>
                                    <td class="text-left text-md">{{ $item->penjualan->customer ? $item->penjualan->customer->nama_toko : '' }}</td>
                                    <td class="text-left text-md">{{ $item->penjualan->barang ? $item->penjualan->barang->nama : '' }}</td>
                                    <td class="text-left text-md">{{ $item->penjualan->status_pengiriman }}</td>
                                    <td class="text-left text-md">
                                        <a href="{{ route('kurirpengiriman.edit', $item->kd_pengiriman) }}" class="btn">
                                            <i data-feather="send"></i>
                                        </a>
                                    </td>
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
