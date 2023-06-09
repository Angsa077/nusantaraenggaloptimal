@extends('layouts.app')
@section('content')
    <div class="main-content container-fluid mt-5">
        <section class="section">
            <div class="card">
                <div class="card-header text-center font-weight-bold">
                    Tabel Daftar Barang
                </div>
                <div class="card-body">
                    <div class="table-responsive-sm">
                        <table class="table table-bordered table-hover table-sm">
                            <thead class="table">
                                <tr>
                                    <th scope="col" class="text-left text-md">Gambar</th>
                                    <th scope="col" class="text-left text-md">Kode Barang</th>
                                    <th scope="col" class="text-left text-md">Nama</th>
                                    <th scope="col" class="text-left text-md">Merek</th>
                                    <th scope="col" class="text-left text-md">Jumlah</th>
                                    <th scope="col" class="text-left text-md">Harga</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $jumlahBarang = 0;
                                    $jumlahHarga = 0;
                                @endphp
                                @foreach ($barangterjual as $item)
                                    @php
                                        $jumlahBar = $item->jumlah;
                                        $jumlahBarang += $jumlahBar;
                                        
                                        $jumlahHar = $item->jumlah * $item->barang->harga_jual;
                                        $jumlahHarga += $jumlahHar;
                                    @endphp
                                    <tr onclick="window.location='{{ route('supervisor.barang.show', $item->kd_barang) }}';">
                                        <td class="text-left text-md"> <img src="{{ asset('gambar_barang/' . $item->barang->gambar) }}" width="100px"></td>
                                        <td class="text-left text-md">{{ $item->kd_barang }}</td>
                                        <td class="text-left text-md">{{ $item->barang->nama }}</td>
                                        <td class="text-left text-md">{{ $item->barang->merek }}</td>
                                        <td class="text-left text-md">{{ $item->jumlah }} Barang</td>
                                        <td class="text-left text-md">
                                            {{ 'Rp ' . number_format($jumlahHar, 2, ',', '.') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tr>
                                <td colspan="4" class="text-right"><strong>Total:</strong></td>
                                <td class="text-left">{{ $jumlahBarang }} Barang</td>
                                <td class="text-left">
                                    {{ 'Rp ' . number_format($jumlahHarga, 2, ',', '.') }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <div class="main-content container-fluid">
        <section id="multiple-column-form">
            <div class="row match-height">
                <div class="col-6">
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
                                            <label for="jumlah">Barang Dikembalikan</label>
                                            <div class="position-relative">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i data-feather="package"></i>
                                                        </span>
                                                    </div>
                                                    <input type="text" id="jumlah" class="form-control"
                                                        placeholder="Silahkan Masukan Jumlah Barang" name="jumlah"
                                                        value="{{ $data->pengembalian->jumlah_barang ?? 'Tidak ada' }} Barang"
                                                        readonly>
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

                                    @if ($data->status_persetujuan == 'persetujuanspv')
                                        <div class="col-12 d-flex justify-content-end mt-3">
                                            <button type="button" class="btn btn-secondary" data-toggle="modal"
                                                data-target="#listDataModal">Periksa Barang</button>
                                        </div>
                                    @endif

                                    @if ($data->status_persetujuan == 'disetujui')
                                    <div class="col-12 d-flex justify-content-end mt-3">
                                        <form method="GET" action="{{ route('supervisor.penjualan.index') }}"
                                            class="form-inline mb-3">
                                            <div class="d-flex justify-content-end ml-2">
                                                <a href="{{ route('supervisor.penjualan.pdf', $data->kd_penjualan) }}"
                                                    class="btn btn-secondary">Cetak Invoice</a>
                                            </div>
                                        </form>
                                    </div>
                                    @endif

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
                                                        <input type="text" id="status_persetujuan"
                                                            class="form-control" name="status_persetujuan"
                                                            value="{{ $data->status_persetujuan ? $data->status_persetujuan : 'Tidak ada' }}"
                                                            readonly>
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
                                                            name="status_pembayaran"
                                                            value="{{ $data->status_pembayaran ? $data->status_pembayaran : 'Tidak ada' }}"
                                                            readonly>
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
                                                            value="{{ $data->status_pengiriman ? $data->status_pengiriman : 'Tidak ada' }}"
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
                                                        <input type="text" id="status_pengembalian"
                                                            class="form-control" name="status_pengembalian"
                                                            value="{{ $data->status_pengembalian ? $data->status_pengembalian : 'Tidak ada' }}"
                                                            readonly>
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
                                                        <input type="text" id="id_staf" class="form-control"
                                                            name="id_staf" value="{{ $data->user->name }}" readonly>
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
                                                        <input type="text" id="id_spv" class="form-control"
                                                            name="id_spv"
                                                            value="{{ $data->spv ? $data->spv->name : 'Tidak ada' }}"
                                                            readonly>
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
                </div>

                <div class="col-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Data Customer</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12 col-12">
                                        <div class="form-group has-icon-left">
                                            <label for="nama_toko">Nama Toko</label>
                                            <div class="position-relative">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i data-feather="shopping-bag"></i>
                                                        </span>
                                                    </div>
                                                    <input type="text" id="nama_toko" class="form-control"
                                                        placeholder="Silahkan Masukan Nama Toko" name="nama_toko"
                                                        value="{{ $data->customer->nama_toko }}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12 col-12">
                                        <div class="form-group has-icon-left">
                                            <label for="nama_pemilik">Nama Pemilik</label>
                                            <div class="position-relative">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i data-feather="user"></i>
                                                        </span>
                                                    </div>
                                                    <input type="text" id="nama_pemilik" class="form-control"
                                                        placeholder="Silahkan Masukan Nama Pemilik" name="nama_pemilik"
                                                        value="{{ $data->customer->nama_pemilik }}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12 col-12">
                                        <div class="form-group has-icon-left">
                                            <label for="no_hp">No HP</label>
                                            <div class="position-relative">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i data-feather="phone"></i>
                                                        </span>
                                                    </div>
                                                    <input type="text" id="no_hp" class="form-control"
                                                        value="{{ $data->customer->no_hp }}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12 col-12">
                                        <div class="form-group has-icon-left">
                                            <label for="alamat">Alamat</label>
                                            <div class="position-relative">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i data-feather="map-pin"></i>
                                                        </span>
                                                    </div>
                                                    <input type="text" id="alamat" class="form-control"
                                                        value="{{ $data->customer->alamat }}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12 col-12">
                                        <div class="form-group has-icon-left">
                                            <label for="provinsi">Provinsi</label>
                                            <div class="position-relative">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i data-feather="map-pin"></i>
                                                        </span>
                                                    </div>
                                                    <input type="text" id="provinsi" class="form-control"
                                                        value="{{ $data->customer->provinces->name }}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12 col-12">
                                        <div class="form-group has-icon-left">
                                            <label for="kabupaten">Kota / Kabupaten</label>
                                            <div class="position-relative">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i data-feather="map-pin"></i>
                                                        </span>
                                                    </div>
                                                    <input type="text" id="kabupaten" class="form-control"
                                                        value="{{ $data->customer->regencys->name }}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12 col-12">
                                        <div class="form-group has-icon-left">
                                            <label for="kecamatan">Kecamatan</label>
                                            <div class="position-relative">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i data-feather="map-pin"></i>
                                                        </span>
                                                    </div>
                                                    <input type="text" id="kecamatan" class="form-control"
                                                        value="{{ $data->customer->districs->name }}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12 col-12">
                                        <div class="form-group has-icon-left">
                                            <label for="desa">Kelurahan / Desa</label>
                                            <div class="position-relative">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i data-feather="map-pin"></i>
                                                        </span>
                                                    </div>
                                                    <input type="text" id="desa" class="form-control"
                                                        value="{{ $data->customer->villages->name }}" readonly>
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


    <!-- List Data Modal -->
    <div class="modal fade" id="listDataModal" tabindex="-1" role="dialog" aria-labelledby="listDataModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="listDataModalLabel">Periksa Barang</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="{{ route('supervisor.penjualan.update', $data->kd_penjualan) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">

                        @if ($data->pembayaran->bukti_pembayaran)
                            <div class="position-relative mb-3">
                                <img src="{{ asset('bukti_pembayaran/' . $data->pembayaran->bukti_pembayaran) }}"
                                    width="100px" height="100px" alt="Bukti Pembayaran" id="bukti_pembayaran">
                                <label for="bukti_pembayaran">Bukti Pembayaran</label>
                            </div>
                        @endif

                        <input type="checkbox" id="kd_customer" name="kd_customer"
                            value="{{ $data->customer->nama_toko }}" required>
                        <label for="kd_customer"><strong>Nama Customer:</strong>
                            {{ $data->customer->nama_toko }}</label><br>

                        <input type="checkbox" id="jumlah_barang" name="jumlah_barang"
                            value="{{ $data->jumlah_barang }}" required>
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
                        <br>
                        <div class="input-group mt-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i data-feather="clipboard"></i>
                                </span>
                            </div>
                            <input type="text" id="catatan" class="form-control"
                                placeholder="Silahkan Masukan Catatan" name="catatan"
                                value="{{ Session::get('catatan') }}" required>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-secondary mb-1" name="simpan"
                            value="Setujui">Setujui</button>
                        <button type="submit" class="btn btn-danger mb-1" name="simpan" value="Tolak">Tolak</button>
                </form>
            </div>
        </div>
    </div>
    </div>
@endsection
