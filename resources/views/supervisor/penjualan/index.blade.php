@extends('layouts.app')
@section('content')
    <div class="main-content container-fluid mt-5">
        <section class="section">
            <div class="card">
                <div class="card-header">
                    Penjualan
                </div>
                <div class="card-body">
                    <div class="table-responsive-sm">
                        <table class="table table-hover" id="myTable">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-left text-md">Tanggal Penjualan</th>
                                    <th scope="col" class="text-left text-md">Kode Penjualan</th>
                                    <th scope="col" class="text-left text-md">Nama Barang</th>
                                    <th scope="col" class="text-left text-md">Nama Customer</th>
                                    <th scope="col" class="text-left text-md">Status</th>
                                    <th scope="col" class="text-left text-md">Detail</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <td class="text-left text-md">{{ $item->tgl_penjualan  }}</td>
                                        <td class="text-left text-md">{{ $item->kd_penjualan  }}</td>
                                        <td class="text-left text-md">{{ $item->barang->nama }}</td>
                                        <td class="text-left text-md">{{ $item->customer->nama_toko }}</td>
                                        <td class="text-left text-md">{{ $item->status_persetujuan }}</td>
                                        <td class="text-left text-md"><a href="{{ route('supervisorpenjualan.edit', $item->kd_penjualan) }}"
                                                class="btn"><i data-feather="more-horizontal"></i></a></td>
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
