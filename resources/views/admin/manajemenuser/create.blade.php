@extends('layouts.app')
@section('content')
    <div class="main-content container-fluid mt-5">

        <section id="multiple-column-form">
            <div class="row match-height">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Tambah User</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form action="{{ route('adminmanajemenuser.store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">

                                        <div class="col-md-6 col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="name">Nama Lengkap</label>
                                                <div class="position-relative">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i data-feather="user"></i>
                                                            </span>
                                                        </div>
                                                        <input type="text" id="name" class="form-control"
                                                            placeholder="Silahkan Masukan Nama Lengkap" name="name"
                                                            value="{{ Session::get('name') }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="level">Jabatan</label>
                                                <div class="position-relative">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i data-feather="chevrons-right"></i>
                                                            </span>
                                                        </div>
                                                        <select class="form-control" name="level" id="level"
                                                            value="{{ Session::get('level') }}">
                                                            <option selected>Pilih Jabatan</option>
                                                            <option value="kepalacabang">Kepala Cabang</option>
                                                            <option value="supervisor">Supervisor</option>
                                                            <option value="admin">Admin</option>
                                                            <option value="sales">Sales</option>
                                                            <option value="kurir">Kurir</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="email">Email</label>
                                                <div class="position-relative">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i data-feather="mail"></i>
                                                            </span>
                                                        </div>
                                                        <input type="email" id="email" class="form-control"
                                                            placeholder="Silahkan Masukan Email" name="email"
                                                            value="{{ Session::get('email') }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="nip">NIP</label>
                                                <div class="position-relative">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i data-feather="credit-card"></i>
                                                            </span>
                                                        </div>
                                                        <input type="text" id="nip" class="form-control"
                                                            placeholder="Silahkan Masukan NIP" name="nip"
                                                            value="{{ Session::get('nip') }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="nik">NIK</label>
                                                <div class="position-relative">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i data-feather="credit-card"></i>
                                                            </span>
                                                        </div>
                                                        <input type="text" id="nik" class="form-control"
                                                            placeholder="Silahkan Masukan NIK" name="nik"
                                                            value="{{ Session::get('nik') }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="npwp">NPWP</label>
                                                <div class="position-relative">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i data-feather="credit-card"></i>
                                                            </span>
                                                        </div>
                                                        <input type="text" id="npwp" class="form-control"
                                                            placeholder="Silahkan Masukan NPWP" name="npwp"
                                                            value="{{ Session::get('npwp') }}">
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
                                                        <input type="text" id="no_hp" class="form-control"
                                                            placeholder="Silahkan Masukan No HP" name="no_hp"
                                                            value="{{ Session::get('no_hp') }}">
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
                                                        <input type="text" id="alamat" class="form-control"
                                                            placeholder="Silahkan Masukan Alamat Tinggal Saat Ini"
                                                            name="alamat" value="{{ Session::get('alamat') }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="tp_lahir">Tempat Lahir</label>
                                                <div class="position-relative">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i data-feather="map-pin"></i>
                                                            </span>
                                                        </div>
                                                        <input type="text" id="tp_lahir" class="form-control"
                                                            placeholder="Silahkan Masukan Tempat Lahir" name="tp_lahir"
                                                            value="{{ Session::get('tp_lahir') }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="tg_lahir">Tanggal Lahir</label>
                                                <div class="position-relative">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i data-feather="calendar"></i>
                                                            </span>
                                                        </div>
                                                        <input type="date" id="tg_lahir" class="form-control"
                                                            placeholder="Silahkan Masukan Tanggal Lahir" name="tg_lahir"
                                                            value="{{ Session::get('tg_lahir') }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="jk">Jenis Kelamin</label>
                                                <div class="position-relative">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i data-feather="chevrons-right"></i>
                                                            </span>
                                                        </div>
                                                        <select class="form-control" name="jk" id="jk"
                                                            value="{{ Session::get('jk') }}">
                                                            <option selected>Pilih Jenis Kelamin</option>
                                                            <option value="lakilaki">Laki-Laki</option>
                                                            <option value="perempuan">Perempuan</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="tgl_masuk">Tanggal Masuk Kerja</label>
                                                <div class="position-relative">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i data-feather="calendar"></i>
                                                            </span>
                                                        </div>
                                                        <input type="date" id="tgl_masuk" class="form-control"
                                                            placeholder="Silahkan Masukan Tanggal Masuk Kerja"
                                                            name="tgl_masuk" value="{{ Session::get('tgl_masuk') }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-secondary mr-1 mb-1 mt-3">Submit</button>
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
