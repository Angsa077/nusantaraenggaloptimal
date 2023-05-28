@extends('layouts.app-admin')
@section('content')
    <div class="main-content container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Purchase Request</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class='breadcrumb-header'>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('pr.index') }}">Purchase Request</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Detail Purchase Request</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <section id="multiple-column-form">
            <div class="row match-height">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Detail <i data-feather="chevron-right"></i> {{ $data->no_pr }} </h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group has-icon-left">
                                            <label for="no_pr">Nomor Purchase Request</label>
                                            <div class="position-relative">
                                            <input type="number" id="no_pr" class="form-control"
                                                placeholder="Silahkan Masukan Nomor Purchase Request" name="no_pr" value="{{ $data->no_pr }}" disabled>
                                                <div class="form-control-icon">
                                                    <i data-feather="package"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group has-icon-left">
                                            <label for="kd_barang">Nama Barang</label>
                                            <div class="position-relative">
                                                <select name="kd_barang" class="form-control" id="kd_barang" disabled>
                                                    <option selected>Pilih Nama Barang</option>
                                                    @foreach($barang as $b)
                                                        <option value="{{ $b->kd_barang }}" @if($b->kd_barang == $data->kd_barang) selected @endif>{{ $b->nama }}</option>
                                                    @endforeach
                                                </select>
                                                <div class="form-control-icon">
                                                    <i data-feather="package"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group has-icon-left">
                                            <label for="kd_supplier">Nama Supplier</label>
                                            <div class="position-relative">
                                                <select name="kd_supplier" class="form-control" id="kd_supplier" disabled>
                                                    <option selected>Pilih Nama Supplier</option>
                                                    @foreach($supplier as $s)
                                                        <option value="{{ $s->kd_supplier }}" @if($s->kd_supplier == $data->kd_supplier) selected @endif>{{ $s->nama }}</option>
                                                    @endforeach
                                                </select>
                                                <div class="form-control-icon">
                                                    <i data-feather="user"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group has-icon-left">
                                            <label for="kd_tempat">Nama Tempat</label>
                                            <div class="position-relative">
                                                <select name="kd_tempat" class="form-control" id="kd_tempat" disabled>
                                                        <option selected>Pilih Nama Tempat</option>
                                                    @foreach($tempat as $t)
                                                    <option value="{{ $t->kd_tempat }}" @if($t->kd_tempat == $data->kd_tempat) selected @endif>{{ $t->nama }}</option>
                                                    @endforeach
                                                </select>
                                                <div class="form-control-icon">
                                                    <i data-feather="map-pin"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group has-icon-left">
                                            <label for="jumlah">Jumlah Barang</label>
                                            <div class="position-relative">
                                            <input type="number" id="jumlah" class="form-control"
                                                placeholder="Silahkan Masukan Jumlah Barang" name="jumlah" value="{{ $data->jumlah }}" disabled>
                                                <div class="form-control-icon">
                                                    <i data-feather="package"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group has-icon-left">
                                            <label for="harga">Harga Barang</label>
                                            <div class="position-relative">
                                                    <input type="text" id="harga" class="form-control"
                                                        placeholder="Silahkan Masukan Harga Barang" name="harga"
                                                        value="{{ 'Rp ' . number_format($data->barang->harga, 2, ',', '.') }}" disabled>
                                                <div class="form-control-icon">
                                                    <i data-feather="dollar-sign"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>                                    
                                    <div class="col-md-6 col-12">
                                        <div class="form-group has-icon-left">
                                            <label for="total_harga">Total Harga</label>
                                            <div class="position-relative">
                                                <input type="text" id="total_harga" class="form-control" name="total_harga"
                                                    value="{{ 'Rp ' . number_format($data->total_harga, 2, ',', '.') }}" disabled>
                                                <div class="form-control-icon">
                                                    <i data-feather="dollar-sign"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group has-icon-left">
                                            <label for="total_bayar">Total Bayar</label>
                                            <div class="position-relative">
                                                <input type="text" id="total_bayar" class="form-control" name="total_bayar"
                                                    value="{{ 'Rp ' . number_format($data->total_bayar, 2, ',', '.') }}" disabled>
                                                <div class="form-control-icon">
                                                    <i data-feather="dollar-sign"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group has-icon-left">
                                            <label for="tgl_pr">Tanggal Purchase Request</label>
                                            <div class="position-relative">
                                                <input type="date" id="tgl_pr" class="form-control"
                                                    placeholder="Silahkan Masukan Tanggal Purchase Request" name="tgl_pr"
                                                    value="{{ $data->tgl_pr }}" disabled>
                                                <div class="form-control-icon">
                                                    <i data-feather="calendar"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group has-icon-left">
                                            <label for="id_staf_pr">Nama Staf</label>
                                            <div class="position-relative">
                                                <select name="id_staf_pr" class="form-control" id="id_staf_pr" disabled>
                                                    <option value="">Tidak Diketahui</option> <!-- Tambahkan option kosong dan label yang sesuai -->
                                                    @foreach($user as $u)
                                                        <option value="{{ $u->id_staf_pr }}" @if($u->id == $data->id_staf_pr) selected @endif>{{ $u->name }}</option>
                                                    @endforeach
                                                </select>
                                                <div class="form-control-icon">
                                                    <i data-feather="user"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group has-icon-left">
                                            <label for="status">Status</label>
                                            <div class="position-relative">
                                                <select class="form-control" name="status" id="status"
                                                    value="{{ $data->status }}" disabled>
                                                    <option value="1" {{ $data->status == 1 ? 'selected' : '' }}>
                                                        Proses</option>
                                                    <option value="2" {{ $data->status == 2 ? 'selected' : '' }}>
                                                        Diterima</option>
                                                    <option value="3" {{ $data->status == 3 ? 'selected' : '' }}>
                                                        Ditolak</option>
                                                </select>
                                                <div class="form-control-icon">
                                                    <i data-feather="package"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group has-icon-left">
                                            <label for="catatan">Catatan PR</label>
                                            <div class="position-relative">
                                            <input type="text" id="catatan" class="form-control"
                                                placeholder="Silahkan Masukan Catatan PR" name="catatan" value="{{ $data->catatan }}" disabled>
                                                <div class="form-control-icon">
                                                    <i data-feather="clipboard"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @if ($data->status_pr != 2 )
                                    <div class="col-12 d-flex justify-content-end">
                                        <a href="{{ route('pr.edit', $data->no_pr) }}"
                                            class="btn btn-secondary mr-1 mb-1">Edit</a>
                                        <form onsubmit="return confirm('Yakin mau menghapus data ini?')"
                                            action="{{ route('pr.destroy', $data->no_pr) }}" class="d-inline"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger ml-3" type="submit" name="submit">
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
