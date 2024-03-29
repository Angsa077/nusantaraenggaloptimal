@extends('layouts.app')
@section('content')
    <div class="main-content container-fluid mt-5">

        <section id="multiple-column-form">
            <div class="row match-height">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Edit <i data-feather="chevron-right"></i> {{ $data->nama }} </h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form action="{{ route('admin.barang.update', $data->id_barang) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        @if ($data->gambar)
                                            <div class="position-relative mb-3">
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
                                                            value="{{ $data->nama }}" readonly>
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
                                                            value="{{ $data->merek }}" readonly>
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
                                                            value="{{ $data->harga_beli }}">
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
                                                            value="{{ $data->harga_jual }}">
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
                                                            placeholder="Silahkan Masukan Gambar Barang" name="gambar"
                                                            value="{{ $data->gambar }}">
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

                                        @if ($data->status_barang == 'proses' || $data->status_barang == 'tolak')
                                            <div class="col-12 d-flex justify-content-end">
                                                <button type="submit" class="btn btn-sm mr-2" style="background-color: red; color: white; border-radius: 5px;" name="simpan"
                                                    value="Hapus" >Hapus</button>
                                                <button type="submit" class="btn btn-secondary"
                                                    name="simpan">Perbarui</button>
                                            </div>
                                        @endif
                                    </div>
                                </form>
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
                                            <label for="id_staf">Nama Staf </label>
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
                                            <label for="id_spv">Nama Supervisor </label>
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

                                    <div class="col-md-6 col-12">
                                        <div class="form-group has-icon-left">
                                            <label for="timestamp">Terakhir di Update</label>
                                            <div class="position-relative">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i data-feather="clock"></i>
                                                        </span>
                                                    </div>
                                                    <input type="text" id="timestamp" class="form-control"
                                                        name="timestamp" value="{{ $data->updated_at }}" readonly>
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
