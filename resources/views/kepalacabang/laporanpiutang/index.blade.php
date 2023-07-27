@extends('layouts.app')
@section('content')
    <div class="main-content container-fluid mt-5">
        <section class="section">
            <div class="card">
                <div class="card-header">
                    Laporan Piutang
                </div>
                <div class="card-body">
                    <div class="table-responsive-sm">

                        <form method="GET" action="{{ route('kepalacabang.laporanpiutang.index') }}" class="form-inline mb-3">
                            <div class="d-flex justify-content-start">
                                <a href="{{ route('kepalacabang.laporanpiutang.pdf') }}"
                                    class="btn btn-secondary"><i class="fa fa-file-pdf"></i> Generate PDF</a>
                            </div>
                        </form>

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
                                @php
                                    $totalPiutang = 0;
                                @endphp
                                @foreach ($data as $item)
                                    @php
                                        $totalPiutang += $item->utang;
                                    @endphp
                                    <tr onclick="window.location='{{ route('kepalacabang.laporanpiutang.show', $item->kd_customer) }}';">
                                        <td class="text-left text-md">{{ $item->kd_customer }}</td>
                                        <td class="text-left text-md">{{ $item->nama_toko }}</td>
                                        <td class="text-left text-md">{{ $item->nama_pemilik }}</td>
                                        <td class="text-left text-md">{{ $item->alamat }}</td>
                                        <td class="text-left text-md">{{ 'Rp ' . number_format($item->utang, 2, ',', '.') }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="4" class="text-left"><strong>Total:</strong></td>
                                    <td class="text-left">{{ 'Rp ' . number_format($totalPiutang, 2, ',', '.') }}</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
