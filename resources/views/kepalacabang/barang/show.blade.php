@extends('layouts.app')
@section('content')
    <div class="main-content container-fluid mt-5">

        <section id="multiple-column-form">
            <div class="row match-height">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Detail <i data-feather="chevron-right"></i> {{ $data->nama }} </h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <div class="row">

                                    <div class="col-md-4 col-12">
                                        <div class="form-group has-icon-left">
                                            <label for="kd_barang">Kode Barang</label>
                                            <div class="position-relative">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i data-feather="package"></i>
                                                        </span>
                                                    </div>
                                                    <input type="text" id="kd_barang" class="form-control"
                                                        placeholder="Silahkan Masukan Kode Barang" name="kd_barang"
                                                        value="{{ $data->kd_barang }}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-12">
                                        <div class="form-group has-icon-left">
                                            <label for="nama">Nama Barang</label>
                                            <div class="position-relative">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i data-feather="package"></i>
                                                        </span>
                                                    </div>
                                                    <input type="text" id="nama" class="form-control"
                                                        placeholder="Silahkan Masukan Nama Barang" name="nama"
                                                        value="{{ $data->nama }}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-12">
                                        <div class="form-group has-icon-left">
                                            <label for="merek">Merek Barang</label>
                                            <div class="position-relative">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i data-feather="package"></i>
                                                        </span>
                                                    </div>
                                                    <input type="text" id="merek" class="form-control"
                                                        placeholder="Silahkan Masukan Merek Barang" name="merek"
                                                        value="{{ $data->merek }}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Stok Barang Modal -->
    <div class="main-content container-fluid">
        <section class="section">
            <div class="card">
                <div class="card-header">
                    Stok Barang
                </div>
                <div class="card-body">
                    <div class="table-responsive-sm">
                        <table class="table table-hover" id="myTable">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-left text-md">Tanggal Masuk</th>
                                    <th scope="col" class="text-left text-md">Jumlah</th>
                                    <th scope="col" class="text-left text-md">Harga Beli</th>
                                    <th scope="col" class="text-left text-md">Harga Jual</th>
                                    <th scope="col" class="text-left text-md">Status Barang</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $totalJumlah = 0; ?>
                                <!-- Tambahkan variabel totalJumlah -->
                                @foreach ($barang as $item)
                                    @if ($item->kd_barang == $data->kd_barang)
                                        <tr
                                            onclick="window.location='{{ route('kepalacabangbarang.edit', $item->id_barang) }}';">
                                            <td class="text-left text-md">{{ $item->created_at }}</td>
                                            <td class="text-left text-md">{{ $item->jumlah }} Barang</td>
                                            <td class="text-left text-md">
                                                {{ 'Rp ' . number_format($item->harga_beli, 2, ',', '.') }}</td>
                                            <td class="text-left text-md">
                                                {{ 'Rp ' . number_format($item->harga_jual, 2, ',', '.') }}</td>
                                            <td class="text-left text-md">{{ $item->status_barang }}</td>
                                        </tr>
                                        <?php $totalJumlah += $item->jumlah; ?>
                                        <!-- Tambahkan jumlah ke totalJumlah -->
                                    @endif
                                @endforeach
                                <tr>
                                    <td class="text-left text-md"><strong>Total Barang</strong></td>
                                    <td class="text-left text-md"><strong>{{ $totalJumlah }} Barang</strong></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
