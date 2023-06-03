@extends('layouts.app')

@section('content')
    <div class="main-content container-fluid mt-5">
        <section id="multiple-column-form">
            <div class="row match-height justify-content-center">
                <!-- Added justify-content-center class -->
                <div class="col-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Tambah Stok Barang</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form method="POST" action="{{ route('adminbarang.storestok', $data->kd_barang) }}">
                                    @csrf

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group has-icon-left">
                                                <label for="jumlahsaatini">Jumlah Barang Saat Ini</label>
                                                <div class="position-relative">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i data-feather="package"></i>
                                                            </span>
                                                        </div>
                                                        <input type="text" id="jumlahsaatini" class="form-control"
                                                            placeholder="Silahkan Masukan Jumlah Barang"
                                                            name="jumlahsaatini" value="{{ $data->jumlah }} Barang"
                                                            readonly>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group has-icon-left">
                                                <label for="jumlah">Tambah Barang</label>
                                                <div class="position-relative">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i data-feather="package"></i>
                                                            </span>
                                                        </div>
                                                        <input type="number" id="jumlah" class="form-control"
                                                            placeholder="Silahkan Masukan Jumlah Barang" name="jumlah"
                                                            required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    @if ($data->status_barang != 'proses' && $data->status_barang != 'tolak')
                                        <div class="col-12 d-flex justify-content-end mt-3">
                                            <a href="{{ route('adminbarang.show', $data->kd_barang) }}"
                                                class="btn btn-danger mr-2">Batal</a>
                                            <button type="submit" class="btn btn-secondary">Simpan</button>
                                        </div>
                                    @endif

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
