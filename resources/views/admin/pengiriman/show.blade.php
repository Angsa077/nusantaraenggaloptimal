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
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $jumlahBarang = 0;
                                @endphp
                                @foreach ($barangterjual as $item)
                                    @php
                                        $jumlahBar = $item->jumlah;
                                        $jumlahBarang += $jumlahBar;
                                    @endphp
                                    <tr onclick="window.location='{{ route('admin.barang.show', $item->kd_barang) }}';">
                                        <td class="text-left text-md"> <img
                                                src="{{ asset('gambar_barang/' . $item->barang->gambar) }}" width="100px">
                                        </td>
                                        <td class="text-left text-md">{{ $item->kd_barang }}</td>
                                        <td class="text-left text-md">{{ $item->barang->nama }}</td>
                                        <td class="text-left text-md">{{ $item->barang->merek }}</td>
                                        <td class="text-left text-md">{{ $item->jumlah }} Barang</td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tr>
                                <td colspan="4" class="text-right"><strong>Total:</strong></td>
                                <td class="text-left">{{ $jumlahBarang }} Barang</td>
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
                                                        value="{{ $data->penjualan->customer->nama_toko }}" readonly>
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
                                                        value="{{ $data->penjualan->customer->nama_pemilik }}" readonly>
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
                                                        value="{{ $data->penjualan->customer->no_hp }}" readonly>
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
                                                        value="{{ $data->penjualan->customer->alamat }}" readonly>
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
                                                        value="{{ $data->penjualan->customer->provinces->name }}"
                                                        readonly>
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
                                                        value="{{ $data->penjualan->customer->regencys->name }}" readonly>
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
                                                        value="{{ $data->penjualan->customer->districs->name }}" readonly>
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
                                                        value="{{ $data->penjualan->customer->villages->name }}" readonly>
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
                            <h4 class="card-title">Bukti Pengambilan Barang</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <div class="row">
                                    @if ($data->bukti_pengiriman)
                                        <div class="position-relative mb-3">
                                            <img src="{{ asset('bukti_pengiriman/' . $data->bukti_pengiriman) }}"
                                                width="100px" height="100px" alt="">
                                        </div>
                                    @endif

                                    <div class="col-md-12 col-12">
                                        <div class="form-group has-icon-left">
                                            <label for="id_staf">Nama Staf </label>
                                            <div class="position-relative">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i data-feather="user"></i>
                                                        </span>
                                                    </div>
                                                    <input type="text" id="id_staf" class="form-control"
                                                        name="id_staf" value="{{ $data->user->name ?? 'Tidak ada' }} "
                                                        readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12 col-12">
                                        <div class="form-group has-icon-left">
                                            <label for="tgl_pengiriman">Tgl Pengambilan Brg</label>
                                            <div class="position-relative">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i data-feather="clock"></i>
                                                        </span>
                                                    </div>
                                                    <input type="text" id="tgl_pengiriman" class="form-control"
                                                        name="tgl_pengiriman"
                                                        value="{{ $data->tgl_pengiriman ?? 'Tidak ada' }}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Bukti Penerimaan Barang</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <div class="row">
                                    @if ($data->bukti_penerimaan)
                                        <div class="position-relative mb-3">
                                            <img src="{{ asset('bukti_penerimaan/' . $data->bukti_penerimaan) }}"
                                                width="100px" height="100px" alt="">
                                        </div>
                                    @endif

                                    <div class="col-md-12 col-12">
                                        <div class="form-group has-icon-left">
                                            <label for="nama_penerima">Nama Penerima</label>
                                            <div class="position-relative">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i data-feather="user"></i>
                                                        </span>
                                                    </div>
                                                    <input type="text" id="nama_penerima" class="form-control"
                                                        value="{{ $data->nama_penerima ?? 'Tidak ada' }}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12 col-12">
                                        <div class="form-group has-icon-left">
                                            <label for="tgl_sampai">Tgl Penerimaan Brg</label>
                                            <div class="position-relative">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i data-feather="clock"></i>
                                                        </span>
                                                    </div>
                                                    <input type="text" id="tgl_sampai" class="form-control"
                                                        name="tgl_sampai" value="{{ $data->tgl_sampai ?? 'Tidak ada' }}"
                                                        readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12 col-12">
                                        <div class="form-group has-icon-left">
                                            <label for="catatan">Catatan</label>
                                            <div class="position-relative">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i data-feather="clipboard"></i>
                                                        </span>
                                                    </div>
                                                    <input type="text" id="catatan" class="form-control"
                                                        value="{{ $data->catatan ?? 'Tidak ada' }}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="row">

                                    <div class="col-md-12 col-12">
                                        <div class="form-group has-icon-left">
                                            <label for="status_pengiriman">Status Pengiriman</label>
                                            <div class="position-relative">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i data-feather="package"></i>
                                                        </span>
                                                    </div>
                                                    <input type="text" id="status_pengiriman" class="form-control"
                                                        value="{{ $data->penjualan->status_pengiriman ?? 'Tidak ada' }}"
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
            </div>
        </section>
    </div>
@endsection
