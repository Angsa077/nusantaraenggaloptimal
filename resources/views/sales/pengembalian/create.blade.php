@extends('layouts.app')
@section('content')
    <div class="main-content container-fluid mt-5">

        <section id="multiple-column-form">
            <div class="row match-height">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Ajukan Pengembalian</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form action="{{ route('salespengembalian.store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">

                                        <div class="col-md-6 col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="kd_penjualan">Kode Penjualan</label>
                                                <div class="position-relative">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i data-feather="user"></i>
                                                            </span>
                                                        </div>
                                                        <input type="text" name="kd_penjualan" id="kd_penjualan"
                                                            class="form-control" readonly />
                                                        <button type="button" class="btn btn-secondary" data-toggle="modal"
                                                            data-target="#penjualanModal"
                                                            value="{{ Session::get('kd_penjualan') }}">
                                                            Pilih Kode Penjualan
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="jumlah_barang">Jumlah Barang</label>
                                                <div class="position-relative">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i data-feather="package"></i>
                                                            </span>
                                                        </div>
                                                        <input type="number" id="jumlah_barang" class="form-control"
                                                            placeholder="Silahkan Masukan Jumlah Barang"
                                                            name="jumlah_barang"
                                                            value="{{ Session::get('jumlah_barang') }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="catatan">Alasan Pengembalian</label>
                                                <div class="position-relative">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i data-feather="clipboard"></i>
                                                            </span>
                                                        </div>
                                                        <input type="text" id="catatan" class="form-control"
                                                            placeholder="Silahkan Masukan Alasan Pengembalian"
                                                            name="catatan" value="{{ Session::get('catatan') }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 d-flex justify-content-end mt-2">
                                            <button type="submit" name="simpan" class="btn btn-secondary">Ajukan</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal  Penjualan-->
                <div class="modal fade" id="penjualanModal" tabindex="-1" role="dialog"
                    aria-labelledby="penjualanModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="penjualanModalLabel">Pilih Penjualan</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <table class="table table-hover" id="penjualanTable">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="text-left text-md">Tanggal Penjualan</th>
                                            <th scope="col" class="text-left text-md">Kode Penjualan</th>
                                            <th scope="col" class="text-left text-md">Nama Barang</th>
                                            <th scope="col" class="text-left text-md">Nama Customer</th>
                                            <th scope="col" class="text-left text-md">Jumlah</th>
                                            <th scope="col" class="text-left text-md">Harga</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($penjualan as $p)
                                            @if ($p->status_pengiriman == 'selesai')
                                                <tr data-dismiss="modal"
                                                    onclick="selectPenjualan('{{ $p->kd_penjualan }}', '{{ $p->nama }}')">
                                                    <td class="text-left text-md">{{ $p->tgl_penjualan }}</td>
                                                    <td class="text-left text-md">{{ $p->kd_penjualan }}</td>
                                                    <td class="text-left text-md">{{ $p->barang->nama }}</td>
                                                    <td class="text-left text-md">{{ $p->customer->nama_toko }}</td>
                                                    <td class="text-left text-md">{{ $p->jumlah_barang }}</td>
                                                    <td class="text-left text-md">
                                                        {{ 'Rp ' . number_format($p->total_harga, 2, ',', '.') }}</td>

                                                </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <script>
                    function selectPenjualan(kd_penjualan) {
                        document.getElementById('kd_penjualan').value = kd_penjualan;
                    }
                </script>

        </section>
    </div>
@endsection
