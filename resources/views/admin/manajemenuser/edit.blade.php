@extends('layouts.app')
@section('content')
    <div class="main-content container-fluid mt-5">

        <section id="multiple-column-form">
            <div class="row match-height">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Edit <i data-feather="chevron-right"></i> {{ $data->name }} </h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form action="{{ route('admin.manajemenuser.update', $data->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

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
                                                            name="name" value="{{ $data->name }}"
                                                            placeholder="Silahkan Masukan Nama Lengkap">
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
                                                        <select class="form-control" name="level" id="level">
                                                            <option value="">Pilih Jabatan</option>
                                                            <option value="kepalacabang"
                                                                {{ $data->level == 'kepalacabang' ? 'selected' : '' }}>
                                                                Kepala Cabang</option>
                                                            <option value="supervisor"
                                                                {{ $data->level == 'supervisor' ? 'selected' : '' }}>
                                                                Supervisor
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
                                                        <input type="email" id="email" class="form-control"
                                                            name="email" value="{{ $data->email }}"
                                                            placeholder="Silahkan Masukan Email">
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
                                                            name="nip" value="{{ $data->nip }}"
                                                            placeholder="Silahkan Masukan NIP">
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
                                                            name="nik" value="{{ $data->nik }}"
                                                            placeholder="Silahkan Masukan NIK">
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
                                                            name="npwp" value="{{ $data->npwp }}"
                                                            placeholder="Silahkan Masukan NPWP">
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
                                                            name="no_hp" value="{{ $data->no_hp }}"
                                                            placeholder="Silahkan Masukan No HP">
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
                                                            name="alamat" value="{{ $data->alamat }}"
                                                            placeholder="Silahkan Masukan Alamat Tinggal Saat Ini">
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
                                                            name="tp_lahir" value="{{ $data->tp_lahir }}"
                                                            placeholder="Silahkan Masukan Tempat Lahir">
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
                                                            name="tg_lahir" value="{{ $data->tg_lahir }}">
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
                                                        <select class="form-control" name="jk" id="jk">
                                                            <option selected>Pilih Jenis Kelamin</option>
                                                            <option value="lakilaki"
                                                                {{ $data->jk == 'lakilaki' ? 'selected' : '' }}>
                                                                Laki-Laki</option>
                                                            <option value="perempuan"
                                                                {{ $data->jk == 'perempuan' ? 'selected' : '' }}>
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
                                                            name="tgl_masuk" value="{{ $data->tgl_masuk }}">
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
                                                            name="tgl_keluar" value="{{ $data->tgl_keluar }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-sm mr-2" name="simpan" style="background-color: red; color: white; border-radius: 5px;"value="Hapus">Hapus</button>
                                            <button type="submit" class="btn btn-secondary" name="simpan" value="Submit">Submit</button>
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
