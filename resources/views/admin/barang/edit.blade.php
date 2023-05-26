@extends('layouts.app')
@section('content')
<div class="main-content container-fluid">

        <section id="multiple-column-form">
            <div class="row match-height">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Edit <i data-feather="chevron-right"></i> {{ $data->nama }} </h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form action="{{ route('adminbarang.update', $data->kd_barang) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        @if ($data->gambar)
                                            <div class="position-relative">
                                                <img src="{{ asset('gambar_barang/' . $data->gambar) }}" width="100px"
                                                    height="100px" alt="">
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
                                                            value="{{ $data->kd_barang }}" readonly>
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
                                                            value="{{ $data->nama }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="kategori">Kategori Barang</label>
                                                <div class="position-relative">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i data-feather="package"></i>
                                                            </span>
                                                        </div>
                                                    <select class="form-control" name="kategori" id="kategori"
                                                        value="{{ $data->kategori }}"  >
                                                        <option selected>Pilih Kategori Barang</option>
                                                        <option value="Kendaraan" {{ $data->kategori == 'Kendaraan' ? 'selected' : '' }}>
                                                            Kendaraan</option>
                                                        <option value="Peralatan Konstruksi" {{ $data->kategori == 'Peralatan Konstruksi' ? 'selected' : '' }}>
                                                            Peralatan Konstruksi</option>
                                                        <option value="Perlengkapan Kantor" {{ $data->kategori == 'Perlengkapan Kantor' ? 'selected' : '' }}>
                                                            Perlengkapan Kantor</option>
                                                        <option value="Perlengkapan Pemasaran" {{ $data->kategori == 'Perlengkapan Pemasaran' ? 'selected' : '' }}>
                                                            Perlengkapan Pemasaran</option>
                                                        <option value="Perlengkapan Keamanan" {{ $data->kategori == 'Perlengkapan Keamanan' ? 'selected' : '' }}>
                                                            Perlengkapan Keamanan</option>
                                                        <option value="Perlengkapan Kebersihan" {{ $data->kategori == 'Perlengkapan Kebersihan' ? 'selected' : '' }}>
                                                            Perlengkapan Kebersihan</option>
                                                        <option value="Perlengkapan Elektronik" {{ $data->kategori == 'Perlengkapan Elektronik' ? 'selected' : '' }}>
                                                            Perlengkapan Elektronik</option>
                                                        <option value="Perlengkapan Kebun" {{ $data->kategori == 'Perlengkapan Kebun' ? 'selected' : '' }}>
                                                            Perlengkapan Kebun</option>
                                                    </select>
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
                                                            value="{{ $data->merek }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="harga_beli">Harga Beli</label>
                                                <div class="position-relative">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i data-feather="dollar-sign"></i>
                                                            </span>
                                                        </div>
                                                        <input type="number" id="harga_beli" class="form-control"
                                                            placeholder="Silahkan Masukan Harga Beli" name="harga_beli"
                                                            value="{{$data->harga_beli}}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
    
                                        <div class="col-md-6 col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="harga_jual">Harga Jual</label>
                                                <div class="position-relative">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i data-feather="dollar-sign"></i>
                                                            </span>
                                                        </div>
                                                        <input type="number" id="harga_jual" class="form-control"
                                                            placeholder="Silahkan Masukan Harga Jual" name="harga_jual"
                                                            value="{{$data->harga_jual}}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="kondisi">Kondisi Barang</label>
                                                <div class="position-relative">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i data-feather="package"></i>
                                                            </span>
                                                        </div>
                                                    <select class="form-control" name="kondisi" id="kondisi"
                                                        value="{{ $data->kondisi }}"  >
                                                        <option selected>Pilih Kondisi Barang</option>
                                                        <option value="Baru" {{ $data->kondisi == 'Baru' ? 'selected' : '' }}>
                                                            Baru</option>
                                                        <option value="Bekas" {{ $data->kondisi == 'Bekas' ? 'selected' : '' }}>
                                                            Bekas</option>
                                                    </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="berat">Berat Barang / Gram</label>
                                                <div class="position-relative">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i data-feather="package"></i>
                                                            </span>
                                                        </div>
                                                        <input type="number" id="berat" class="form-control"
                                                            placeholder="Silahkan Masukan Berat Barang / Gram" name="berat"
                                                            value="{{ $data->berat }}">
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
                                                            placeholder="Silahkan Masukan Jumlah Barang" name="jumlah"
                                                            value="{{ $data->jumlah }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="expired">Tanggal Expired</label>
                                                <div class="position-relative">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i data-feather="calendar"></i>
                                                            </span>
                                                        </div>
                                                        <input type="date" id="expired" class="form-control"
                                                            placeholder="Silahkan Masukan Tanggal Expired" name="expired"
                                                            value="{{ $data->expired }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="gambar">Gambar Barang</label>
                                                <div class="position-relative">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i data-feather="file-plus"></i>
                                                            </span>
                                                        </div>
                                                <input type="file" id="gambar" class="form-control"
                                                    placeholder="Silahkan Masukan Gambar Barang" name="gambar" value="{{ $data->gambar }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="catatan">Catatan Barang</label>
                                                <div class="position-relative">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i data-feather="clipboard"></i>
                                                            </span>
                                                        </div>
                                                        <input type="text" id="catatan" class="form-control"
                                                            placeholder="Silahkan Masukan Catatan Barang" name="catatan"
                                                            value="{{ $data->catatan }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary mr-1 mb-1"
                                                name="simpan">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>    
        </section>
    </div>
@endsection
