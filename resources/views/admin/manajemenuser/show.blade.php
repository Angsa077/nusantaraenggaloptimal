@extends('layouts.app')
@section('content')
    <div class="main-content container-fluid mt-5">

        <section id="multiple-column-form">
            <div class="row match-height">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Detail <i data-feather="chevron-right"></i> {{ $data->name }} </h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">

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
                                                    <input type="text" id="name" class="form-control" name="name"
                                                        value="{{ $data->name }}" readonly>
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
                                                    <select class="form-control" name="level" id="level" readonly>
                                                        <option value="">Pilih Jabatan</option>
                                                        <option value="kepalacabang"
                                                            {{ $data->level == 'kepalacabang' ? 'selected' : '' }}>
                                                            Kepala Cabang</option>
                                                        <option value="supervisor"
                                                            {{ $data->level == 'supervisor' ? 'selected' : '' }}>Supervisor
                                                        </option>
                                                        <option value="admin"
                                                            {{ $data->level == 'admin' ? 'selected' : '' }}>Admin
                                                        </option>
                                                        <option value="sales"
                                                            {{ $data->level == 'sales' ? 'selected' : '' }}>Sales
                                                        </option>
                                                        <option value="kurir"
                                                            {{ $data->level == 'kurir' ? 'selected' : '' }}>Kurir
                                                        </option>
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
                                                    <input type="email" id="email" class="form-control" name="email"
                                                        value="{{ $data->email }}" readonly>
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
                                                    <input type="text" id="nip" class="form-control" name="nip"
                                                        value="{{ $data->nip }}" readonly>
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
                                                    <input type="text" id="nik" class="form-control" name="nik"
                                                        value="{{ $data->nik }}" readonly>
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
                                                        value="{{ $data->npwp }}" readonly>
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
                                                        value="{{ $data->no_hp }}" readonly>
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
                                                        value="{{ $data->alamat }}" readonly>
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
                                                        value="{{ $data->tp_lahir }}" readonly>
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
                                                        value="{{ $data->tg_lahir }}" readonly>
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
                                                    <select class="form-control" name="jk" id="jk" readonly>
                                                        <option selected>Pilih Jenis Kelamin</option>
                                                        <option value="lakilaki"
                                                            {{ $data->jk == "lakilaki" ? 'selected' : '' }}>
                                                            Laki-Laki</option>
                                                        <option value="perempuan"
                                                            {{ $data->jk == "perempuan" ? 'selected' : '' }}>
                                                            Perempuan</option>
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
                                                        value="{{ $data->tgl_masuk }}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group has-icon-left">
                                            <label for="tgl_keluar">Tanggal Keluar Kerja</label>
                                            <div class="position-relative">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i data-feather="calendar"></i>
                                                        </span>
                                                    </div>
                                                    <input type="date" id="tgl_keluar" class="form-control"
                                                        value="{{ $data->tgl_keluar }}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group has-icon-left">
                                            <label for="status_akun">Status Akun</label>
                                            <div class="position-relative">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i data-feather="package"></i>
                                                        </span>
                                                    </div>
                                                    <input type="text" id="status_akun" class="form-control"
                                                        value="{{ $data->status_akun }}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group has-icon-left">
                                            <label for="id_admin">Nama Staf </label>
                                            <div class="position-relative">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i data-feather="user"></i>
                                                        </span>
                                                    </div>
                                                    <input type="text" id="id_admin" class="form-control" name="id_admin"
                                                        value="{{ $data->user->name }}" readonly>
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
                                                    <input type="text" id="timestamp" class="form-control" name="timestamp" value="{{ $data->created_at }}" readonly>
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
                                                    <input type="text" id="timestamp" class="form-control" name="timestamp" value="{{ $data->updated_at }}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 d-flex justify-content-end">
                                        <a href="{{ route('admin.manajemenuser.edit', $data->id) }}"
                                            class="btn btn-secondary mt-3">Edit</a>
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
