<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">


    <title>Invoice Penjualan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
        body {
            margin-top: 20px;
            background-color: #eee;
        }

        .card {
            box-shadow: 0 20px 27px 0 rgb(0 0 0 / 5%);
        }

        .card {
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 0 solid rgba(0, 0, 0, .125);
            border-radius: 1rem;
        }
    </style>
</head>

<body>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css"
        integrity="sha256-2XFplPlrFClt0bIdPgpz8H7ojnk10H69xRqd9+uTShA=" crossorigin="anonymous" />
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="invoice-title">
                            <h4 class="float-end font-size-15">Invoice #{{ $data->kd_penjualan }}<span
                                    class="badge bg-success font-size-12 ms-2">Paid</span></h4>
                            <div class="mb-4">
                                <h2 class="mb-1 text-muted">PT. Nusantara Enggal Optimal</h2>
                            </div>
                            <div class="text-muted">
                                <p class="mb-1">Serang, Banten</p>
                                <p class="mb-1"><i class="uil uil-envelope-alt me-1"></i>
                                    <a>nusantaraenggaloptimal@gmail.com</a>
                                </p>
                                <p><i class="uil uil-phone me-1"></i> 012-345-6789</p>
                            </div>
                        </div>
                        <hr class="my-4">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="text-muted">
                                    <h5 class="font-size-16 mb-3">Dikirim Kepada:</h5>
                                    <h5 class="font-size-15 mb-2">{{ $data->customer->nama_toko }}</h5>
                                    <p class="mb-1">{{ $data->customer->alamat }}
                                        {{ $data->customer->villages->name }} {{ $data->customer->districs->name }}
                                        {{ $data->customer->regencys->name }} {{ $data->customer->provinces->name }}</p>
                                    <p>{{ $data->customer->no_hp }}</p>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="text-muted text-sm-end">
                                    <div>
                                        <h5 class="font-size-15 mb-1">Invoice No:</h5>
                                        <p>#{{ $data->kd_penjualan }}</p>
                                    </div>
                                    <div class="mt-4">
                                        <h5 class="font-size-15 mb-1">Invoice Date:</h5>
                                        <p>{{ $data->tgl_penjualan }}</p>
                                    </div>
                                    <div class="mt-4">
                                        <h5 class="font-size-15 mb-1">Status Pembayaran:</h5>
                                        <p>{{ $data->status_pembayaran }}</p>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="py-2">
                            <h5 class="font-size-15">Pesanan</h5>
                            <div class="table-responsive">
                                <table class="table align-middle table-nowrap table-centered mb-0">
                                    <thead>
                                        <tr>
                                            <th style="width: 70px;">No.</th>
                                            <th>Kode Barang</th>
                                            <th>Nama Barang</th>
                                            <th>Harga</th>
                                            <th>Jumlah</th>
                                            <th class="text-end" style="width: 120px;">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 0;
                                        @endphp
                                        @foreach ($data as $item)
                                            <?php
                                            $total_harga = $item->barang->harga_jual * $item->jumlah_barang;
                                            ?>
                                            <tr>
                                                <th scope="row">{{ $no++ }}</th>
                                                <td>
                                                    <div>
                                                        <h5 class="text-truncate font-size-14 mb-1">
                                                            {{ $item->barang->kd_barang }}</h5>
                                                        <p class="text-muted mb-0">{{ $item->barang->nama }}</p>
                                                    </div>
                                                </td>
                                                <td>{{ $item->barang->harga_jual }}</td>
                                                <td>{{ $item->jumlah_barang }}</td>
                                                <td class="text-end">{{ $total_harga }}</td>
                                            </tr>

                                            <tr>
                                                <th scope="row" colspan="4" class="text-end">Sub Total</th>
                                                <td class="text-end">{{ $item->total_harga }}</td>
                                            </tr>

                                            <tr>
                                                <th scope="row" colspan="4" class="text-end">Total Bayar
                                                </th>
                                                <td class="text-end">{{ $item->total_bayar }}
                                                </td>
                                            </tr>
                                            <?php $sisa_bayar = $item->total_harga - $item->total_bayar; ?>
                                            <tr>
                                                <th scope="row" colspan="4" class="border-0 text-end">Sisa Bayar
                                                </th>
                                                <td class="border-0 text-end">
                                                    <h4 class="m-0 fw-semibold">{{ $sisa_bayar }}</h4>
                                                </td>
                                            </tr>
                                            @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript"></script>
</body>

</html>
