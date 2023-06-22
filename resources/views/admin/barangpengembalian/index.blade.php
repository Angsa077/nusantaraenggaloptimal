@extends('layouts.app')

@section('content')
    <div class="main-content container-fluid mt-5">

        <section class="section">
            <div class="card">
                <div class="card-header">
                    Data Barang Pengembalian
                </div>
                <div class="card-body">
                    <div class="table-responsive-sm">
                        <table class="table table-hover" id="myTable">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-left text-md">Tgl Pengembalian Barang</th>
                                    <th scope="col" class="text-left text-md">ID Barang</th>
                                    <th scope="col" class="text-left text-md">Kode Barang</th>
                                    <th scope="col" class="text-left text-md">Nama</th>
                                    <th scope="col" class="text-left text-md">Merek</th>
                                    <th scope="col" class="text-left text-md">Jumlah</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr
                                        onclick="window.location='{{ route('admin.barangpengembalian.edit', $item->id_barangrusak) }}';">
                                        <td class="text-left text-md">{{ $item->tgl_barangpengembalian }}</td>
                                        <td class="text-left text-md">{{ $item->id_barang }}</td>
                                        <td class="text-left text-md">{{ $item->kd_barang }}</td>
                                        <td class="text-left text-md">{{ $item->barang->nama }}</td>
                                        <td class="text-left text-md">{{ $item->barang->merek }}</td>
                                        <td class="text-left text-md">{{ $item->jumlah }} Barang</td>
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
