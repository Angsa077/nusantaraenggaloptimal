@extends('layouts.app')
@section('content')
    <div class="main-content container-fluid mt-5">

        <section id="multiple-column-form">
            <div class="row match-height">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Tambah Pesanan</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form action="{{ route('adminpenjualan.store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">

                                        <div class="col-md-6 col-12">
                                            <div class="form-group has-icon-left">
                                                <button type="button" class="btn btn-secondary mb-2" data-toggle="modal"
                                                    data-target="#barangModal">
                                                    Pilih Barang
                                                </button>
                                                <div class="position-relative">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i data-feather="package"></i>
                                                            </span>
                                                        </div>
                                                        <input type="text" name="kd_barang" id="kd_barang"
                                                            class="form-control" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group has-icon-left">
                                                <button type="button" class="btn btn-secondary mb-2" data-toggle="modal"
                                                    data-target="#customerModal">
                                                    Pilih Customer
                                                </button>
                                                <div class="position-relative">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i data-feather="user"></i>
                                                            </span>
                                                        </div>
                                                        <input type="text" name="kd_customer" id="kd_customer"
                                                            class="form-control" readonly />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="jumlah_barang">Jumlah Barang</label>
                                                <div class="position-relative">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i data-feather="package"></i>
                                                            </span>
                                                        </div>
                                                        <input type="number" id="jumlah_barang" class="form-control"
                                                            placeholder="Silahkan Masukan Jumlah Barang"
                                                            name="jumlah_barang"
                                                            value="{{ Session::get('jumlah_barang') }}">
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
                                                                <i data-feather="dollar-sign"></i>
                                                            </span>
                                                        </div>
                                                        <input type="number" id="total_bayar" class="form-control"
                                                            placeholder="Silahkan Masukan Total Pembayaran"
                                                            name="total_bayar" value="{{ Session::get('total_bayar') }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="catatan">Catatan</label>
                                                <div class="position-relative">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i data-feather="clipboard"></i>
                                                            </span>
                                                        </div>
                                                        <input type="text" id="catatan" class="form-control"
                                                            placeholder="Silahkan Masukan Catatan" name="catatan"
                                                            value="{{ Session::get('catatan') }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-secondary mr-1 mb-1">Submit</button>
                                        </div>
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
                                        <th scope="col" class="text-left text-md">Jumlah</th>
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
                                            <td class="text-left text-md">{{ $b->jumlah }}</td>
                                            <td class="text-left text-md">
                                                {{ 'Rp ' . number_format($b->harga_jual, 2, ',', '.') }}</td>
                                            <td>
                                                <button type="button" class="btn btn-sm btn-secondary"
                                                    data-dismiss="modal"
                                                    onclick="selectBarang('{{ $b->kd_barang }}', '{{ $b->nama }}')">Pilih</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="col-3 col-md-3 order-md-2 order-last"> <a
                                    href="{{ route('adminbarang.create') }}" class="btn btn-sm btn-secondary">
                                    Tambah Barang</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal  Customer-->
            <div class="modal fade" id="customerModal" tabindex="-1" role="dialog"
                aria-labelledby="customerModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="customerModalLabel">Pilih Customer</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <table class="table table-hover" id="customerTable">
                                <thead>
                                    <tr>
                                        <th scope="col" class="text-left text-md">Kode Customer</th>
                                        <th scope="col" class="text-left text-md">Nama Toko</th>
                                        <th scope="col" class="text-left text-md">Nama Pemilik</th>
                                        <th scope="col" class="text-left text-md">No HP</th>
                                        <th scope="col" class="text-left text-md">Alamat</th>
                                        <th scope="col" class="text-left text-md">Utang</th>
                                        <th scope="col" class="text-left text-md">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($customer as $c)
                                        <tr>
                                            <td class="text-left text-md">{{ $c->kd_customer }}</td>
                                            <td class="text-left text-md">{{ $c->nama_toko }}</td>
                                            <td class="text-left text-md">{{ $c->nama_pemilik }}</td>
                                            <td class="text-left text-md">{{ $c->no_hp }}</td>
                                            <td class="text-left text-md">{{ $c->alamat }}</td>
                                            <td class="text-left text-md">
                                                {{ 'Rp ' . number_format($c->utang, 2, ',', '.') }}</td>
                                            <td>
                                                <button type="button" class="btn btn-sm btn-secondary"
                                                    data-dismiss="modal"
                                                    onclick="selectCustomer('{{ $c->kd_customer }}')">Pilih</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="col-3 col-md-3 order-md-2 order-last"> <a
                                    href="{{ route('admincustomer.create') }}" class="btn btn-sm btn-secondary">
                                    Tambah Customer</a>
                            </div>
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
                function selectCustomer(kd_customer) {
                    document.getElementById('kd_customer').value = kd_customer;
                }
            </script>

        </section>
    </div>
@endsection
