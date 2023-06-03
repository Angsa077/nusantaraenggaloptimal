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
                                <form action="{{ route('salescustomer.update', $data->kd_customer) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        @if ($data->gambar)
                                            <div class="position-relative">
                                                <img src="{{ asset('gambar_customer/' . $data->gambar) }}" width="100px"
                                                    height="100px" alt="">
                                            </div>
                                        @endif

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
                                                            value="{{ $data->nama_toko }}">
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
                                                            value="{{ $data->nama_pemilik }}">
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
                                                            value="{{ $data->no_hp }}">
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
                                                            value="{{ $data->alamat }}">
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
                                                    placeholder="Silahkan Masukan Gambar Customer" name="gambar" value="{{ $data->gambar }}">
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
                                                            value="{{ $data->catatan }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-secondary mr-2 mt-3"
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
