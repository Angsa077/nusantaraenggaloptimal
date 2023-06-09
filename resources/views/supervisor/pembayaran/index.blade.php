@extends('layouts.app')
@section('content')
    <div class="main-content container-fluid mt-5">
        <section class="section">
            <div class="card">
                <div class="card-header">
                    Pembayaran
                </div>
                <div class="card-body">
                    <div class="table-responsive-sm">
                        <table class="table table-hover" id="myTable">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-left text-md">Kode Penjualan</th>
                                    <th scope="col" class="text-left text-md">Nama Toko</th>
                                    <th scope="col" class="text-left text-md">Total Harga</th>
                                    <th scope="col" class="text-left text-md">Total Bayar</th>
                                    <th scope="col" class="text-left text-md">Sisa Bayar</th>
                                    <th scope="col" class="text-left text-md">Status Pembayaran</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $key => $group)
                                    @php
                                        $item = $group->first();
                                    @endphp
                                    <tr
                                        onclick="window.location='{{ route('supervisor.pembayaran.show', $item->kd_penjualan) }}';">
                                        <td class="text-left text-md">{{ $item->penjualan->kd_penjualan }}</td>
                                        <td class="text-left text-md">
                                            {{ $item->penjualan->customer ? $item->penjualan->customer->nama_toko : '' }}
                                        </td>
                                        <td class="text-left text-md">
                                            {{ 'Rp ' . number_format($item->penjualan->total_harga, 2, ',', '.') }}</td>
                                        <td class="text-left text-md">
                                            {{ 'Rp ' . number_format($item->penjualan->total_bayar, 2, ',', '.') }}</td>
                                        @php
                                            $sisa_bayar = $item->penjualan->total_harga - $item->penjualan->total_bayar;
                                        @endphp
                                        <td class="text-left text-md">
                                            {{ 'Rp ' . number_format($sisa_bayar, 2, ',', '.') }}</td>
                                        <td class="text-left text-md">{{ $item->penjualan->status_pembayaran }}</td>
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
