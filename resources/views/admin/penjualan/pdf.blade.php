<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Invoice Penjualan</title>
    <style>
        @page {
            size: A4;
            margin: 20px;
        }

        @font-face {
            font-family: SourceSansPro;
            src: url(SourceSansPro-Regular.ttf);
        }

        .clearfix:after {
            content: "";
            display: table;
            clear: both;
        }

        a {
            color: #0087C3;
            text-decoration: none;
        }

        body {
            position: relative;
            width: 100%;
            height: 100%;
            margin: 0;
            padding: 0;
            color: #555555;
            background: #FFFFFF;
            font-family: Arial, sans-serif;
            font-size: 14px;
            font-family: SourceSansPro;
        }

        header {
            padding: 10px 0;
            margin-bottom: 20px;
            border-bottom: 1px solid #AAAAAA;
        }

        #logo {
            float: left;
            margin-top: 8px;
        }

        #logo img {
            height: 70px;
        }

        #company {
            float: right;
            text-align: right;
        }


        #details {
            margin-bottom: 50px;
        }

        #client {
            padding-left: 6px;
            border-left: 6px solid #0087C3;
            float: left;
        }

        #client .to {
            color: #777777;
        }

        h2.name {
            font-size: 1.4em;
            font-weight: normal;
            margin: 0;
        }

        #invoice {
            float: right;
            text-align: right;
        }

        #invoice h1 {
            color: #0087C3;
            font-size: 2.4em;
            line-height: 1em;
            font-weight: normal;
            margin: 0 0 10px 0;
        }

        #invoice .date {
            font-size: 1.1em;
            color: #777777;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            border-spacing: 0;
            margin-bottom: 20px;
        }

        table th,
        table td {
            padding: 20px;
            background: #EEEEEE;
            text-align: center;
            border-bottom: 1px solid #FFFFFF;
        }

        table th {
            white-space: nowrap;
            font-weight: normal;
        }

        table td {
            text-align: right;
        }

        table td h3 {
            color: #0087C3;
            font-size: 1.2em;
            font-weight: normal;
            margin: 0 0 0.2em 0;
        }

        table .no {
            color: #FFFFFF;
            font-size: 1.6em;
            background: #0087C3;
        }

        table .desc {
            text-align: left;
        }

        table .unit {
            background: #DDDDDD;
        }

        table .qty {}

        table .total {
            background: #0087C3;
            color: #FFFFFF;
        }

        table td.unit,
        table td.qty,
        table td.total {
            font-size: 1.2em;
        }

        table tbody tr:last-child td {
            border: none;
        }

        table tfoot td {
            padding: 10px 20px;
            background: #FFFFFF;
            border-bottom: none;
            font-size: 1.2em;
            white-space: nowrap;
            border-top: 1px solid #AAAAAA;
        }

        table tfoot tr:first-child td {
            border-top: none;
        }

        table tfoot tr:last-child td {
            color: #0087C3;
            font-size: 1.4em;
            border-top: 1px solid #0087C3;

        }

        table tfoot tr td:first-child {
            border: none;
        }

        #thanks {
            font-size: 2em;
            margin-bottom: 50px;
        }

        #notices {
            padding-left: 6px;
            border-left: 6px solid #0087C3;
        }

        #notices .notice {
            font-size: 1.2em;
        }

        footer {
            color: #777777;
            width: 100%;
            height: 30px;
            position: absolute;
            bottom: 0;
            border-top: 1px solid #AAAAAA;
            padding: 8px 0;
            text-align: center;
        }
    </style>
</head>

<body>
    <header class="clearfix">
        <div id="logo">
            <img src="{{ asset('images/logo.png') }}" width="100px" height="100px" alt="">
        </div>

        <div id="company">
            <h2 class="name">PT. Nusantara Enggal Optimal</h2>
            <div>Serang, Banten, Indonesia</div>
            <div>012-345-6789</div>
            <div><a href="mailto:nusantaraenggaloptimal@gmail.com"></a>nusantaraenggaloptimal@gmail.com</div>
        </div>
        </div>
    </header>
    <main>
        <div id="details" class="clearfix">
            <div id="client">
                <div class="to">Dikirim Kepada:</div>
                <h2 class="name">{{ $data->customer->nama_toko }}</h2>
                <div class="address">{{ $data->customer->alamat }}
                    {{ $data->customer->villages->name }} {{ $data->customer->districs->name }}
                    {{ $data->customer->regencys->name }} {{ $data->customer->provinces->name }}</div>
                <div class="address">{{ $data->customer->no_hp }}</div>
            </div>
            <div id="invoice">
                <h1>Invoice #{{ $data->kd_penjualan }}</h1>
                <div class="date">Date of Invoice: {{ $data->tgl_penjualan }}</div>
            </div>
        </div>

        <h2>Pesanan</h2>
        <table border="0" cellspacing="0" cellpadding="0">
            <thead>
                <tr>
                    <th class="no">#</th>
                    <th class="desc">Keterangan</th>
                    <th class="unit">Harga Satuan</th>
                    <th class="qty">Jumlah</th>
                    <th class="total">Total</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                    $jumlahBarang = 0;
                    $jumlahHarga = 0;
                @endphp
                @foreach ($barangterjual as $item)
                    <?php
                    $jumlahBar = $item->jumlah;
                    $jumlahBarang += $jumlahBar;
                    
                    $jumlahHar = $item->jumlah * $item->barang->harga_jual;
                    $jumlahHarga += $jumlahHar;
                    ?>
                    <tr>
                        <td class="no">{{ $no++ }}</td>
                        <td class="desc">
                            <h3>{{ $item->kd_barang }}</h3>
                            <p>{{ $item->barang->nama }}</p>{{ $item->barang->merek }}
                        </td>
                        <td class="unit">{{ 'Rp ' . number_format($item->barang->harga_jual, 2, ',', '.') }}</td>
                        <td class="qty">{{ $item->jumlah }} Barang</td>
                        <td class="total">
                            {{ 'Rp ' . number_format($jumlahHar, 2, ',', '.') }}</td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3">Sub Total</td>
                    <td>{{ $jumlahBarang }} Barang</td>
                    <td>{{ 'Rp ' . number_format($jumlahHarga, 2, ',', '.') }}
                    </td>
                </tr>

                <tr>
                    <td colspan="3">Total Bayar</td>
                    <td></td>
                    <td>
                        {{ 'Rp ' . number_format($data->total_bayar, 2, ',', '.') }}</td>
                </tr>
                <?php $sisa_bayar = $jumlahHarga - $data->total_bayar; ?>
                <tr>
                    <td colspan="3">Sisa Bayar</td>
                    <td></td>
                    <td> {{ 'Rp ' . number_format($sisa_bayar, 2, ',', '.') }}
                    </td>
                </tr>
            </tfoot>
        </table>
        <div id="thanks">Thank you!</div>
        <div id="notices">
            <div>NOTICE:</div>
            <div class="notice">Pembelian ini memiliki masa garansi barang selama {{ $data->barangterjual->masa_garansi }} hari.</div>
        </div>
    </main>
</body>

</html>
