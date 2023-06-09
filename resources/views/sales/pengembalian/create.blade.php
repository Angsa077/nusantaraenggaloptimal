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
                                <form action="{{ route('sales.pengembalian.store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">

                                        <div class="col-md-6 col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="id_barangterjual">ID Barang</label>
                                                <div class="position-relative">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i data-feather="user"></i>
                                                            </span>
                                                        </div>
                                                        <input type="text" name="id_barangterjual" id="id_barangterjual"
                                                            class="form-control" readonly />
                                                        <button type="button" class="btn btn-secondary" data-toggle="modal"
                                                            data-target="#penjualanModal"
                                                            value="{{ Session::get('id_barangterjual') }}">
                                                            Pilih ID Barang
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="jumlah">Jumlah Barang</label>
                                                <div class="position-relative">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i data-feather="package"></i>
                                                            </span>
                                                        </div>
                                                        <input type="number" id="jumlah" class="form-control"
                                                            placeholder="Silahkan Masukan jumlah Barang" name="jumlah"
                                                            value="{{ Session::get('jumlah') }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="bukti_pengembalian">Bukti Pengembalian</label>
                                                <div class="position-relative">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i data-feather="file-plus"></i>
                                                            </span>
                                                        </div>
                                                        <input type="file" id="bukti_pengembalian" class="form-control"
                                                            placeholder="Silahkan Masukan Bukti Pengembalian"
                                                            name="bukti_pengembalian">
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
                                <h5 class="modal-title" id="penjualanModalLabel">Pilih ID Barang</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <table class="table table-hover" id="penjualanTable">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="text-left text-md">Kode Penjualan</th>
                                            <th scope="col" class="text-left text-md">Kode Barang</th>
                                            <th scope="col" class="text-left text-md">Nama Toko</th>
                                            <th scope="col" class="text-left text-md">Jumlah</th>
                                            <th scope="col" class="text-left text-md">Harga</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($barangterjual as $b)
                                            @if ($b->tgl_barangterjual != null)
                                                <tr data-dismiss="modal"
                                                    onclick="selectPenjualan('{{ $b->id_barangterjual }}')">
                                                    <td class="text-left text-md">{{ $b->kd_penjualan }}</td>
                                                    <td class="text-left text-md">{{ $b->kd_barang }}</td>
                                                    <td class="text-left text-md">{{ $b->penjualan->customer->nama_toko }}
                                                    </td>
                                                    <td class="text-left text-md">{{ $b->jumlah }}</td>
                                                    @php
                                                        $total_hargabarang = $b->jumlah * $b->barang->harga_jual;
                                                    @endphp
                                                    <td class="text-left text-md">
                                                        {{ 'Rp ' . number_format($total_hargabarang, 2, ',', '.') }}</td>
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
                    function selectPenjualan(id_barangterjual) {
                        document.getElementById('id_barangterjual').value = id_barangterjual;
                    }
                </script>

        </section>
    </div>
@endsection
