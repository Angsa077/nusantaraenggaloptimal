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
                                    @if ($data->pembayaran->bukti_pembayaran)
                                        <div class="position-relative mb-3">
                                            <img src="{{ asset('bukti_pembayaran/' . $data->pembayaran->bukti_pembayaran) }}" width="100px"
                                                height="100px" alt="">
                                        </div>
                                    @endif

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
                                            <form onsubmit="return confirm('Yakin mau menghapus data ini?')"
                                                action="{{ route('salespenjualan.destroy', $data->kd_penjualan) }}"
                                                class="d-inline" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger" type="submit" name="submit">
                                                    Delete
                                                </button>
                                            </form>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="form-group has-icon-left">
                                        <label for="status_persetujuan">Status Penjualan</label>
                                        <div class="position-relative">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i data-feather="user"></i>
                                                    </span>
                                                </div>
                                                <input type="text" id="status_persetujuan" class="form-control"
                                                    name="status_persetujuan" value="{{ $data->status_persetujuan ? $data->status_persetujuan : 'Tidak ada'  }}" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <div class="form-group has-icon-left">
                                        <label for="status_pembayaran">Status Pembayaran</label>
                                        <div class="position-relative">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i data-feather="user"></i>
                                                    </span>
                                                </div>
                                                <input type="text" id="status_pembayaran" class="form-control"
                                                    name="status_pembayaran" value="{{ $data->status_pembayaran ? $data->status_pembayaran : 'Tidak ada' }}" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <div class="form-group has-icon-left">
                                        <label for="status_pengiriman">Status Pengiriman</label>
                                        <div class="position-relative">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i data-feather="user"></i>
                                                    </span>
                                                </div>
                                                <input type="text" id="status_pengiriman" class="form-control"
                                                    name="status_pengiriman"
                                                    value="{{ $data->status_pengiriman ? $data->status_pengiriman : 'Tidak ada'}}"
                                                    readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <div class="form-group has-icon-left">
                                        <label for="status_pengembalian">Status Pengembalian</label>
                                        <div class="position-relative">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i data-feather="clock"></i>
                                                    </span>
                                                </div>
                                                <input type="text" id="status_pengembalian" class="form-control"
                                                    name="status_pengembalian" value="{{ $data->status_pengembalian ? $data->status_pengembalian : 'Tidak ada' }}" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="form-group has-icon-left">
                                        <label for="id_staf">Diinput Oleh</label>
                                        <div class="position-relative">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i data-feather="user"></i>
                                                    </span>
                                                </div>
                                                <input type="text" id="id_staf" class="form-control" name="id_staf"
                                                    value="{{ $data->user->name }}" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <div class="form-group has-icon-left">
                                        <label for="id_admin">Diperiksa Oleh</label>
                                        <div class="position-relative">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i data-feather="user"></i>
                                                    </span>
                                                </div>
                                                <input type="text" id="id_admin" class="form-control"
                                                    name="id_admin"
                                                    value="{{ $data->admin ? $data->admin->name : 'Tidak ada' }}"
                                                    readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <div class="form-group has-icon-left">
                                        <label for="id_spv">Disetujui Oleh</label>
                                        <div class="position-relative">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i data-feather="user"></i>
                                                    </span>
                                                </div>
                                                <input type="text" id="id_spv" class="form-control" name="id_spv"
                                                    value="{{ $data->spv ? $data->spv->name : 'Tidak ada' }}" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <div class="form-group has-icon-left">
                                        <label for="timestamp">Waktu Input</label>
                                        <div class="position-relative">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i data-feather="clock"></i>
                                                    </span>
                                                </div>
                                                <input type="text" id="timestamp" class="form-control"
                                                    name="timestamp" value="{{ $data->created_at }}" readonly>
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
@endsection
