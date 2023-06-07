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
                                    <th scope="col" class="text-left text-md">Nama Barang</th>
                                    <th scope="col" class="text-left text-md">Status Pembayaran</th>
                                    <th scope="col" class="text-left text-md">Proses</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $key => $group)
                                    @php
                                        $item = $group->first();
                                    @endphp
                                    <tr>
                                        <td class="text-left text-md">{{ $item->penjualan->kd_penjualan }}</td>
                                        <td class="text-left text-md">
                                            {{ $item->penjualan->customer ? $item->penjualan->customer->nama_toko : '' }}
                                        </td>
                                        <td class="text-left text-md">
                                            {{ $item->penjualan->barang ? $item->penjualan->barang->nama : '' }}</td>
                                        <td class="text-left text-md">{{ $item->penjualan->status_pembayaran }}</td>
                                        <td class="text-left text-md"><a
                                                href="{{ route('supervisorpembayaran.show', $item->kd_penjualan) }}"
                                                class="btn"><i data-feather="send"></i></a></td>
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
