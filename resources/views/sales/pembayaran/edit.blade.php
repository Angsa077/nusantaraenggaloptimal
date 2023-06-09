@extends('layouts.app')

@section('content')
    <div class="main-content container-fluid mt-5">
        <section id="multiple-column-form">
            <div class="row match-height">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Data Pembayaran > {{ $data->kd_pembayaran }}</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <div class="row">

                                    @if ($data->bukti_pembayaran)
                                        <div class="position-relative mb-3">
                                            <div class="image-container">
                                                <img src="{{ asset('bukti_pembayaran/' . $data->bukti_pembayaran) }}"
                                                    class="zoomable-image" alt="" width="300px">
                                            </div>
                                        </div>

                                        <style>
                                            .image-container {
                                                display: flex;
                                                justify-content: center;
                                            }

                                            .zoomable-image {
                                                transition: transform 0.3s;
                                            }

                                            .zoomable-image:hover {
                                                transform: scale(1.5);
                                            }
                                        </style>
                                    @endif

                                    <div class="col-md-6 col-12">
                                        <div class="form-group has-icon-left">
                                            <label for="tgl_pembayaran">Tanggal Pembayaran</label>
                                            <div class="position-relative">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i data-feather="clock"></i>
                                                        </span>
                                                    </div>
                                                    <input type="text" id="tgl_pembayaran" class="form-control"
                                                        placeholder="Silahkan Masukan Tanggal Pembayaran"
                                                        name="tgl_pembayaran" value="{{ $data->tgl_pembayaran }}" readonly>
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
                                                            <i data-feather="clock"></i>
                                                        </span>
                                                    </div>
                                                    <input type="text" id="total_bayar" class="form-control"
                                                        placeholder="Silahkan Masukan Total Bayar" name="total_bayar"
                                                        value="{{ 'Rp ' . number_format($data->total_bayar, 2, ',', '.') }}"
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
                                                            <i data-feather="package"></i>
                                                        </span>
                                                    </div>
                                                    <input type="text" id="status_pembayaran" class="form-control"
                                                        value="{{ $data->penjualan->status_pembayaran ?? 'Tidak ada' }}"
                                                        readonly>
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
                                                        value="{{ $data->status_persetujuan ?? 'Tidak ada' }}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

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

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="row">

                                    @if ($data->status_persetujuan == 'proses' || $data->status_persetujuan == 'ditolak')
                                        <div class="col-12 d-flex justify-content-end mt-3">
                                            <form onsubmit="return confirm('Yakin mau menghapus data ini?')"
                                                action="{{ route('sales.pembayaran.destroy', $data->kd_pembayaran) }}"
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
        </section>
    </div>
@endsection
