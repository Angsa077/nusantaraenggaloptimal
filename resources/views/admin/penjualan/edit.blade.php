@extends('layouts.app')

@section('content')
    <div class="main-content container-fluid mt-5">
        <section id="multiple-column-form">
            <div class="row match-height">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Detail <i data-feather="chevron-right"></i>Kode Penjualan
                                {{ $data->kd_penjualan }} </h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6 col-12">
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
                                                        value="{{ $data->barang->nama }}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group has-icon-left">
                                            <label for="nama_toko">Nama Customer</label>
                                            <div class="position-relative">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i data-feather="shopping-bag"></i>
                                                        </span>
                                                    </div>
                                                    <input type="text" id="nama_toko" class="form-control"
                                                        placeholder="Silahkan Masukan Nama Customer" name="nama_toko"
                                                        value="{{ $data->customer->nama_toko }}" readonly>
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
                                                    <input type="text" id="jumlah" class="form-control"
                                                        placeholder="Silahkan Masukan Jumlah Barang" name="jumlah"
                                                        value="{{ $data->jumlah_barang }} Barang" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group has-icon-left">
                                            <label for="total_harga">Total Harga</label>
                                            <div class="position-relative">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i data-feather="dollar-sign"></i>
                                                        </span>
                                                    </div>
                                                    <input type="text" id="total_harga" class="form-control"
                                                        placeholder="Silahkan Masukan Harga Harga" name="total_harga"
                                                        value="{{ 'Rp ' . number_format($data->total_harga, 2, ',', '.') }}"
                                                        readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group has-icon-left">
                                            <label for="total_bayar">Total Bayar</label>
                                            <div class="position-relative">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i data-feather="dollar-sign"></i>
                                                        </span>
                                                    </div>
                                                    <input type="text" id="total_bayar" class="form-control"
                                                        placeholder="Silahkan Masukan Harga Bayar" name="total_bayar"
                                                        value="{{ 'Rp ' . number_format($data->total_bayar, 2, ',', '.') }}"
                                                        readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group has-icon-left">
                                            <label for="masa_garansi">Masa Garansi</label>
                                            <div class="position-relative">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i data-feather="package"></i>
                                                        </span>
                                                    </div>
                                                    <input type="text" id="masa_garansi" class="form-control"
                                                        placeholder="Silahkan Masukan Masa Garansi" name="masa_garansi"
                                                        value="{{ $data->masa_garansi }} Hari" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group has-icon-left">
                                            <label for="tgl_penjualan">Tanggal Penjualan</label>
                                            <div class="position-relative">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i data-feather="calendar"></i>
                                                        </span>
                                                    </div>
                                                    <input type="date" id="tgl_penjualan" class="form-control"
                                                        placeholder="Silahkan Masukan Tanggal Penjualan"
                                                        name="tgl_penjualan" value="{{ $data->tgl_penjualan }}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    @if ($data->status_persetujuan == 'proses')
                                        <div class="col-12 d-flex justify-content-end">
                                            <button type="button" class="btn btn-secondary mr-1 mb-1"
                                                data-toggle="modal" data-target="#listDataModal">Check Barang</button>
                                        </div>
                                    @endif
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>


    <!-- List Data Modal -->
    <div class="modal fade" id="listDataModal" tabindex="-1" role="dialog" aria-labelledby="listDataModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="listDataModalLabel">Checking Barang</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="{{ route('adminpenjualan.update', $data->kd_penjualan) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <input type="checkbox" id="kd_customer" name="kd_customer"
                            value="{{ $data->customer->nama_toko }}" required>
                        <label for="kd_customer"><strong>Nama Customer:</strong>
                            {{ $data->customer->nama_toko }}</label><br>

                        <input type="checkbox" id="kd_barang" name="kd_barang" value="{{ $data->barang->nama }}"
                            required>
                        <label for="kd_barang"><strong>Nama Barang:</strong> {{ $data->barang->nama }}</label><br>

                        <input type="checkbox" id="jumlah_barang" name="jumlah_barang" value="{{ $data->jumlah_barang }}"
                            required>
                        <label for="jumlah_barang"><strong>Jumlah Barang:</strong> {{ $data->jumlah_barang }}
                            Barang</label><br>

                        <input type="checkbox" id="total_harga" name="total_harga" value="{{ $data->total_harga }}"
                            required>
                        <label for="total_harga"><strong>Total Harga:</strong>
                            {{ 'Rp ' . number_format($data->total_harga, 2, ',', '.') }}</label><br>

                        <input type="checkbox" id="total_bayar" name="total_bayar" value="{{ $data->total_bayar }}"
                            required>
                        <label for="total_bayar"><strong>Total Bayar:</strong>
                            {{ 'Rp ' . number_format($data->total_bayar, 2, ',', '.') }}</label><br>

                        <input type="checkbox" id="masa_garansi" name="masa_garansi" value="{{ $data->masa_garansi }}"
                            required>
                        <label for="masa_garansi"><strong>Masa Garansi:</strong> {{ $data->masa_garansi }} Hari</label><br>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-secondary" name="simpan">Proses SPV</button>
                    </form>
                        <form onsubmit="return confirm('Yakin mau menghapus data ini?')"
                            action="{{ route('adminpenjualan.destroy', $data->kd_penjualan) }}" class="d-inline"
                            method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger mr-1 mb-1" type="submit" name="submit">Delete</button>
                        </form>
                    </div>
            </div>
        </div>
    </div>
@endsection
