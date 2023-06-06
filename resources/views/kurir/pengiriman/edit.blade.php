@extends('layouts.app')

@section('content')
    <div class="main-content container-fluid mt-5">
        <section id="multiple-column-form">
            <div class="row match-height">
                <div class="col-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Detail <i data-feather="chevron-right"></i>Kode Penjualan
                                {{ $data->kd_pengiriman }} </h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <div class="row">

                                    @if ($penjualan->barang->gambar)
                                        <div class="position-relative mb-3">
                                            <img src="{{ asset('gambar_barang/' . $penjualan->barang->gambar) }}"
                                                width="100px" height="100px" alt="">
                                        </div>
                                    @endif

                                    <div class="col-md-6 col-12">
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
                                                        value="{{ $penjualan->barang->kd_barang }}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

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
                                                        value="{{ $penjualan->barang->nama }}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12">
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
                                                        value="{{ $penjualan->barang->merek }}" readonly>
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
                                                        value="{{ $penjualan->jumlah_barang }} Barang" readonly>
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
                                                            value="{{ $penjualan->customer->nama_toko }}" readonly>
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
                                                            placeholder="Silahkan Masukan Nama Pemilik"
                                                            name="nama_pemilik"
                                                            value="{{ $penjualan->customer->nama_pemilik }}" readonly>
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
                                                            value="{{ $penjualan->customer->no_hp }}" readonly>
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
                                                            value="{{ $penjualan->customer->alamat }}" readonly>
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
                                                            value="{{ $penjualan->customer->provinces->name }}" readonly>
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
                                                            value="{{ $penjualan->customer->regencys->name }}" readonly>
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
                                                            value="{{ $penjualan->customer->districs->name }}" readonly>
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
                                                            value="{{ $penjualan->customer->villages->name }}" readonly>
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

                                    <div class="col-md-6 col-12">
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
                                                        value="{{ $data->penjualan->status_pengiriman ?? 'Tidak ada' }}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group has-icon-left">
                                            <label for="status_persetujuan">Status Persetujuan</label>
                                            <div class="position-relative">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i data-feather="package"></i>
                                                        </span>
                                                    </div>
                                                    <input type="text" id="status_persetujuan" class="form-control"
                                                        name="status_persetujuan" value="{{ $data->status_persetujuan ?? 'Tidak ada' }}"
                                                        readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    @if ($data->penjualan->status_pengiriman != 'selesai') 
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Pengiriman</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form action="{{ route('kurirpengiriman.update', $data->kd_penjualan) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">

                                        @if ($data->penjualan->status_pengiriman == 'barangsiap') 
                                        <div class="col-md-12 col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="bukti_pengiriman">Bukti Pengambilan Barang</label>
                                                <div class="position-relative">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i data-feather="file-plus"></i>
                                                            </span>
                                                        </div>
                                                        <input type="file" id="bukti_pengiriman" class="form-control"
                                                            placeholder="Silahkan Masukan Bukti Pengambilan Barang"
                                                            name="bukti_pengiriman">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 d-flex justify-content-end mt-4">
                                            <button type="submit" class="btn btn-secondary" name="simpan"
                                                value="Kirim">Kirim</button>
                                        </div>
                                        @endif

                                        @if ($penjualan->status_pengiriman == 'dikirim') 
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
                                                            placeholder="Silahkan Masukan Nama Penerima Barang"
                                                            name="nama_penerima">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12 col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="bukti_penerimaan">Bukti Penerimaan Barang</label>
                                                <div class="position-relative">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i data-feather="file-plus"></i>
                                                            </span>
                                                        </div>
                                                        <input type="file" id="bukti_penerimaan" class="form-control"
                                                            placeholder="Silahkan Masukan Bukti Penerimaan Barang"
                                                            name="bukti_penerimaan">
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
                                                            placeholder="Silahkan Masukan Catatan" name="catatan">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 d-flex justify-content-end mt-4">
                                            <button type="submit" class="btn btn-secondary" name="simpan"
                                                value="Selesai">Selesai</button>
                                        </div>
                                        @endif
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endif

                </div>
            </div>
        </section>
    </div>
@endsection
