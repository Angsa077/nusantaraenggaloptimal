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
                            <li class="breadcrumb-item active" aria-current="page">Edit Purchase Request</li>
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
                            <h4 class="card-title">Edit <i data-feather="chevron-right"></i> {{ $data->no_pr }} </h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form action="{{ route('pr.update', $data->no_pr) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">


                                        <div class="col-md-6 col-12">
                                            <div class="form-group has-icon-left">
                                                <button type="button" class="btn btn-secondary mb-2" data-toggle="modal"
                                                    data-target="#barangModal">
                                                    Pilih Barang
                                                </button>
                                                <div class="position-relative">
                                                    <input type="text" name="kd_barang" id="kd_barang"
                                                        class="form-control" value="{{ $data->kd_barang }}" readonly />
                                                    <div class="form-control-icon">
                                                        <i data-feather="package"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-md-6 col-12">
                                            <div class="form-group has-icon-left">
                                                <button type="button" class="btn btn-secondary mb-2" data-toggle="modal"
                                                    data-target="#supplierModal">
                                                    Pilih Supplier
                                                </button>
                                                <div class="position-relative">
                                                    <input type="text" name="kd_supplier" id="kd_supplier"
                                                        class="form-control" value="{{ $data->kd_supplier }}" readonly />
                                                    <div class="form-control-icon">
                                                        <i data-feather="user"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-md-6 col-12">
                                            <div class="form-group has-icon-left">
                                                <button type="button" class="btn btn-secondary mb-2" data-toggle="modal"
                                                    data-target="#tempatModal">
                                                    Pilih Tempat
                                                </button>
                                                <div class="position-relative">
                                                    <input type="text" name="kd_tempat" id="kd_tempat"
                                                        class="form-control" value="{{ $data->kd_tempat }}" readonly />
                                                    <div class="form-control-icon">
                                                        <i data-feather="map-pin"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-md-6 col-12 mt-4">
                                            <div class="form-group has-icon-left">
                                                <label for="jumlah">Jumlah Barang</label>
                                                <div class="position-relative">
                                                    <input type="number" id="jumlah" class="form-control"
                                                        placeholder="Silahkan Masukan Jumlah Barang" name="jumlah"
                                                        value="{{ $data->jumlah }}">
                                                    <div class="form-control-icon">
                                                        <i data-feather="package"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="catatan">Catatan PR</label>
                                                <div class="position-relative">
                                                    <input type="text" id="catatan" class="form-control"
                                                        placeholder="Silahkan Masukan Catatan PR" name="catatan"
                                                        value="{{ $data->catatan }}">
                                                    <div class="form-control-icon">
                                                        <i data-feather="clipboard"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @if ($data->status_pr != 2 )
                                            <div class="col-12 d-flex justify-content-end">
                                                <button type="submit" class="btn btn-secondary mr-1 mb-1" name="simpan">Submit</button>
                                            </div>
                                        @endif
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

                        <!-- Modal  Barang-->
                        <div class="modal fade" id="barangModal" tabindex="-1" role="dialog" aria-labelledby="barangModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="barangModalLabel">Pilih Barang</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <table class="table table-hover" id="barangTable">
                                        <thead>
                                            <tr>
                                                <th scope="col" class="text-left text-md">Kode Barang</th>
                                                <th scope="col" class="text-left text-md">Nama</th>
                                                <th scope="col" class="text-left text-md">Kategori</th>
                                                <th scope="col" class="text-left text-md">Merek</th>
                                                <th scope="col" class="text-left text-md">Kondisi</th>
                                                <th scope="col" class="text-left text-md">Harga</th>
                                                <th scope="col" class="text-left text-md">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($barang as $b)
                                                <tr>
                                                    <td class="text-left text-md">{{ $b->kd_barang }}</td>
                                                    <td class="text-left text-md">{{ $b->nama }}</td>
                                                    <td class="text-left text-md">{{ $b->kategori }}</td>
                                                    <td class="text-left text-md">{{ $b->merek }}</td>
                                                    <td class="text-left text-md">{{ $b->kondisi }}</td>
                                                    <td class="text-left text-md">
                                                        {{ 'Rp ' . number_format($b->harga, 2, ',', '.') }}</td>
                                                    <td>
                                                        <button type="button" class="btn btn-sm btn-secondary"
                                                            data-dismiss="modal"
                                                            onclick="selectBarang('{{ $b->kd_barang }}', '{{ $b->nama_barang }}')">Pilih</button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
        
                    <!-- Modal  Supplier-->
                    <div class="modal fade" id="supplierModal" tabindex="-1" role="dialog"
                        aria-labelledby="supplierModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="supplierModalLabel">Pilih Supplier</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <table class="table table-hover" id="supplierTable">
                                        <thead>
                                            <tr>
                                                <th scope="col" class="text-left text-md">Kode Supplier</th>
                                                <th scope="col" class="text-left text-md">Nama</th>
                                                <th scope="col" class="text-left text-md">Alamat</th>
                                                <th scope="col" class="text-left text-md">Status</th>
                                                <th scope="col" class="text-left text-md">No HP</th>
                                                <th scope="col" class="text-left text-md">Penanggung jawab</th>
                                                <th scope="col" class="text-left text-md">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($supplier as $s)
                                                <tr>
                                                    <td class="text-left text-md">{{ $s->kd_supplier }}</td>
                                                    <td class="text-left text-md">{{ $s->nama }}</td>
                                                    <td class="text-left text-md">{{ $s->alamat }}</td>
                                                    <td class="text-left text-md">{{ $s->status }}</td>
                                                    <td class="text-left text-md">{{ $s->no_hp }}</td>
                                                    <td class="text-left text-md">{{ $s->penanggung_jawab }}</td>
                                                    <td>
                                                        <button type="button" class="btn btn-sm btn-secondary"
                                                            data-dismiss="modal"
                                                            onclick="selectSupplier('{{ $s->kd_supplier }}')">Pilih</button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
        
        
                    <!-- Modal  Tempat-->
                    <div class="modal fade" id="tempatModal" tabindex="-1" role="dialog"
                        aria-labelledby="tempatModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="tempatModalLabel">Pilih Tempat</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <table class="table table-hover" id="tempatTable">
                                        <thead>
                                            <tr>
                                                <th scope="col" class="text-left text-md">Kode Tempat</th>
                                                <th scope="col" class="text-left text-md">Nama</th>
                                                <th scope="col" class="text-left text-md">Kategori</th>
                                                <th scope="col" class="text-left text-md">Penanggung jawab</th>
                                                <th scope="col" class="text-left text-md">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($tempat as $t)
                                                <tr>
                                                    <td class="text-left text-md">{{ $t->kd_tempat }}</td>
                                                    <td class="text-left text-md">{{ $t->nama }}</td>
                                                    <td class="text-left text-md">{{ $t->kategori}}</td>
                                                    <td class="text-left text-md">{{ $t->penanggung_jawab }}</td>
                                                    <td>
                                                        <button type="button" class="btn btn-sm btn-secondary"
                                                            data-dismiss="modal"
                                                            onclick="selectTempat('{{ $t->kd_tempat }}')">Pilih</button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
        
        
                    <script>
                        function selectBarang(kd_barang) {
                            document.getElementById('kd_barang').value = kd_barang;
                        }
                    </script>
        
                    <script>
                        function selectSupplier(kd_supplier) {
                            document.getElementById('kd_supplier').value = kd_supplier;
                        }
                    </script>
        
                    <script>
                        function selectTempat(kd_tempat) {
                            document.getElementById('kd_tempat').value = kd_tempat;
                        }
                    </script>

        </section>
    </div>
@endsection
