@extends('layouts.app')
@section('content')
    <div class="main-content container-fluid mt-5">

        <section class="section">
            <div class="card">
                <div class="card-header">
                    Master Data Customer
                </div>
                <div class="card-body">
                    <div class="table-responsive-sm">
                        <table class="table table-hover" id="myTable">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-left text-md">Kode Customer</th>
                                    <th scope="col" class="text-left text-md">Nama Toko</th>
                                    <th scope="col" class="text-left text-md">Nama Pemilik</th>
                                    <th scope="col" class="text-left text-md">Alamat</th>
                                    <th scope="col" class="text-left text-md">Utang</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr
                                        onclick="window.location='{{ route('supervisor.customer.show', $item->kd_customer) }}';">
                                        <td class="text-left text-md">{{ $item->kd_customer }}</td>
                                        <td class="text-left text-md">{{ $item->nama_toko }}</td>
                                        <td class="text-left text-md">{{ $item->nama_pemilik }}</td>
                                        <td class="text-left text-md">{{ $item->alamat }}</td>
                                        <td class="text-left text-md">{{ 'Rp ' . number_format($item->utang, 2, ',', '.') }}
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
