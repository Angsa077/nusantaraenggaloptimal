@extends('layouts.app')
@section('content')
    <main class="content">
        <div class="container-fluid p-0">

            <h1 class="h3 mb-3"><strong>Dashboard</strong></h1>

            <?php
            $no = 1;
            $total = 0;
            $ada_transaksi = false;
            ?>

            @if (isset($penjualan))
                @foreach ($penjualan as $item)
                    <?php $total += $item->total_harga; ?>
                @endforeach
            @endif

            <div class="row">
                <div class="col-12 d-flex">
                    <div class="w-100">
                        <div class="row">

                            <div class="col-sm-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col mt-0">
                                                <h5 class="card-title">Total Pendapatan</h5>
                                            </div>

                                            <div class="col-auto">
                                                <div class="stat text-primary">
                                                    <i class="align-middle" data-feather="dollar-sign"></i>
                                                </div>
                                            </div>
                                        </div>
                                        @if ($ada_transaksi = true)
                                            <h1>Rp.
                                                {{ number_format($total, 2, ',', '.') }}</h1>
                                        @else
                                            <h1 class="stat-text">$<span class="count">Rp. 0</span></h1>
                                        @endif
                                        <div class="mb-0">
                                            <span class="text-danger"></span>
                                            <span class="text-muted">Pendapatan/hari</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col mt-0">
                                                <h5 class="card-title">Total Pesanan</h5>
                                            </div>
                                            <?php
                                            $total_penjualan = 0;
                                            ?>
                                            @if (isset($penjualan))
                                                @foreach ($penjualan as $pen)
                                                    <?php $total_penjualan++; ?>
                                                @endforeach
                                            @endif
                                            <div class="col-auto">
                                                <div class="stat text-primary">
                                                    <i class="align-middle" data-feather="shopping-cart"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <h1 class="stat-text"><span class="count">{{ $total_penjualan }}</span></h1>
                                        <div class="mb-0">
                                            <span class="text-danger"></span>
                                            <span class="text-muted">Pesanan/hari</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col mt-0">
                                                <h5 class="card-title">Total Pembayaran</h5>
                                            </div>
                                            <?php
                                            $total_pembayaran = 0;
                                            ?>
                                            @if (isset($pembayaran))
                                                @foreach ($pembayaran as $pem)
                                                    <?php $total_pembayaran++; ?>
                                                @endforeach
                                            @endif
                                            <div class="col-auto">
                                                <div class="stat text-primary">
                                                    <i class="align-middle" data-feather="dollar-sign"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <h1 class="stat-text"><span class="count">{{ $total_pembayaran }}</span></h1>
                                        <div class="mb-0">
                                            <span class="text-danger"></span>
                                            <span class="text-muted">Pembayaran/hari</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col mt-0">
                                                <h5 class="card-title">Total Pengiriman</h5>
                                            </div>
                                            <?php
                                            $total_pengiriman = 0;
                                            ?>
                                            @if (isset($pengiriman))
                                                @foreach ($pengiriman as $ngirim)
                                                    <?php $total_pengiriman++; ?>
                                                @endforeach
                                            @endif
                                            <div class="col-auto">
                                                <div class="stat text-primary">
                                                    <i class="align-middle" data-feather="truck"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <h1 class="stat-text"><span class="count">{{ $total_pengiriman }}</span></h1>
                                        <div class="mb-0">
                                            <span class="text-danger"></span>
                                            <span class="text-muted">Pengiriman/hari</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col mt-0">
                                                <h5 class="card-title">Total Pengembalian</h5>
                                            </div>
                                            <?php
                                            $total_pengembalian = 0;
                                            ?>
                                            @if (isset($pengembalian))
                                                @foreach ($pengembalian as $balian)
                                                    <?php $total_pengembalian++; ?>
                                                @endforeach
                                            @endif
                                            <div class="col-auto">
                                                <div class="stat text-primary">
                                                    <i class="align-middle" data-feather="truck"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <h1 class="stat-text"><span class="count">{{ $total_pengembalian }}</span></h1>
                                        <div class="mb-0">
                                            <span class="text-danger"></span>
                                            <span class="text-muted">Pengembalian/hari</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>
@endsection
