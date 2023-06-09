@extends('layouts.app')
@section('content')
    <div class="main-content container-fluid mt-5">

        <section id="multiple-column-form">
            <div class="row match-height">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Tambah Customer</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form action="{{ route('sales.customer.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">

                                        <div class="col-md-6 col-12">
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
                                                            value="{{ Session::get('nama_toko') }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
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
                                                            value="{{ Session::get('nama_pemilik') }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="no_hp">No HP</label>
                                                <div class="position-relative">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i data-feather="phone"></i>
                                                            </span>
                                                        </div>
                                                        <input type="text" id="no_hp" class="form-control" name="no_hp"
                                                        placeholder="Silahkan Masukan No HP" value="{{ Session::get('no_hp') }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
    
                                        <div class="col-md-6 col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="alamat">Alamat</label>
                                                <div class="position-relative">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i data-feather="map-pin"></i>
                                                            </span>
                                                        </div>
                                                        <input type="text" id="alamat" class="form-control" name="alamat"
                                                        placeholder="Silahkan Masukan Alamat" value="{{ Session::get('alamat') }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="provinsi">Provinsi</label>
                                                <div class="position-relative">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i data-feather="map-pin"></i>
                                                            </span>
                                                        </div>
                                                        <select id="provinsi" class="form-control" name="provinsi" value="{{ Session::get('provinsi') }}">
                                                            <option>Pilih Provinsi Anda</option>
                                                            @foreach ($provinces as $provinsi)
                                                                <option value="{{ $provinsi->id }}">{{ $provinsi->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="kabupaten">Kota / Kabupaten</label>
                                                <div class="position-relative">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i data-feather="map-pin"></i>
                                                            </span>
                                                        </div>
                                                        <select id="kabupaten" class="form-control" name="kabupaten" value="{{ Session::get('kabupaten') }}">
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="kecamatan">Kecamatan</label>
                                                <div class="position-relative">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i data-feather="map-pin"></i>
                                                            </span>
                                                        </div>
                                                        <select id="kecamatan" class="form-control" name="kecamatan" value="{{ Session::get('kecamatan') }}">
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="desa">Kelurahan / Desa</label>
                                                <div class="position-relative">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i data-feather="map-pin"></i>
                                                            </span>
                                                        </div>
                                                        <select id="desa" class="form-control" name="desa" value="{{ Session::get('desa') }}">
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="gambar">Gambar Customer</label>
                                                <div class="position-relative">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i data-feather="file-plus"></i>
                                                            </span>
                                                        </div>
                                                        <input type="file" id="gambar" class="form-control"
                                                            placeholder="Silahkan Masukan Gambar Customer" name="gambar">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="catatan">Catatan Customer</label>
                                                <div class="position-relative">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i data-feather="clipboard"></i>
                                                            </span>
                                                        </div>
                                                        <input type="text" id="catatan" class="form-control"
                                                            placeholder="Silahkan Masukan Catatan Customer" name="catatan"
                                                            value="{{ Session::get('catatan') }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-secondary mr-2 mt-3">Submit</button>
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
