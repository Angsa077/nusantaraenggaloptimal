@extends('layouts.app')
@section('content')
    <div class="main-content container-fluid mt-5">

        <section id="multiple-column-form">
            <div class="row match-height">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Barang Pengembalian <i data-feather="chevron-right"></i> {{ $data->barang->nama }} </h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form action="{{ route('admin.barangpengembalian.update', $data->id_barangrusak) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        @if ($data->gambar)
                                            <div class="position-relative mb-3">
                                                <img src="{{ asset('gambar/' . $data->gambar) }}" width="100px"
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
                                                            value="{{ $data->barang->nama }}" readonly>
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
                                                            value="{{ $data->barang->merek }}" readonly>
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
                                                            value="{{ $data->jumlah }}" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        @if ($data->status == 'rusak')
                                            <div class="col-12 d-flex justify-content-end mt-3">
                                                <button type="submit" class="btn btn-secondary"
                                                    name="simpan" value="Proses">Proses</button>
                                            </div>
                                        @endif

                                        @if ($data->status == 'proses')
                                        <div class="col-12 d-flex justify-content-end mt-3">
                                            <button type="submit" class="btn btn-secondary"
                                                name="simpan" value="Selesai">selesai</button>
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
                                            <label for="status">Status</label>
                                            <div class="position-relative">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i data-feather="user"></i>
                                                        </span>
                                                    </div>
                                                    <input type="text" id="status" class="form-control"
                                                        name="status"
                                                        value="{{ $data->status }}"
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
