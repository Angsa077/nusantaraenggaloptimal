@extends('layouts.app')
@section('content')
    <div class="main-content container-fluid mt-5">

        <section class="section">
            <div class="card">
                <div class="card-header">
                    Master Data Barang
                </div>
                <div class="card-body">
                    <div class="table-responsive-sm">
                        <table class="table table-hover" id="myTable">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-left text-md">Kode Barang</th>
                                    <th scope="col" class="text-left text-md">Nama</th>
                                    <th scope="col" class="text-left text-md">Kategori</th>
                                    <th scope="col" class="text-left text-md">Merek</th>
                                    <th scope="col" class="text-left text-md">Jumlah</th>
                                    <th scope="col" class="text-left text-md">Harga Beli</th>
                                    <th scope="col" class="text-left text-md">Harga Jual</th>
                                    <th scope="col" class="text-left text-md">Detail</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <td class="text-left text-md">{{ $item->kd_barang  }}</td>
                                        <td class="text-left text-md">{{ $item->nama }}</td>
                                        <td class="text-left text-md">{{ $item->kategori }}</td>
                                        <td class="text-left text-md">{{ $item->merek }}</td>
                                        <td class="text-left text-md">{{ $item->jumlah }}</td>
                                        <td class="text-left text-md">{{ 'Rp ' . number_format($item->harga_beli, 2, ',', '.') }}</td>
                                        <td class="text-left text-md">{{ 'Rp ' . number_format($item->harga_jual, 2, ',', '.') }}</td>
                                        <td class="text-left text-md"><a href="{{ route('kepalacabangbarang.show', $item->kd_barang) }}"
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
