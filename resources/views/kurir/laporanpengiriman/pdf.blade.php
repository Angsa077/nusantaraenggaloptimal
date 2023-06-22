<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Laporan Pengiriman</title>
    <style>
        @page {
            size: landscape;
        }

        body {
            font-family: Arial, sans-serif;
        }

        h1, h3 {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            text-align: center;
            border: 1px solid black;
            padding: 5px;
            font-size: 12px;
        }
    </style>
</head>
<body>
    <h1>Laporan Pengiriman</h1>
    <h3>Periode: {{ date('d F Y', strtotime($tanggalAwal)) }} - {{ date('d F Y', strtotime($tanggalAkhir)) }}</h3>
    <br>
    <table>
        <thead>
            <tr>
                <th>Kode Penjualan</th>
                <th>Nama Toko</th>
                <th>Nama Barang</th>
                <th>Jumlah Barang</th>
                <th>Nama Penerima</th>
                <th>Tanggal Pengiriman</th>
                <th>Tanggal Sampai</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                @if ((isset($tanggalAwal) && $item->tgl_penjualan >= $tanggalAwal) || !isset($tanggalAwal))
                    @if ((isset($tanggalAkhir) && $item->tgl_penjualan <= $tanggalAkhir) || !isset($tanggalAkhir))
                        <tr>
                            <td>{{ $item->kd_penjualan }}</td>
                            <td>{{ $item->customer->nama_toko }}</td>
                            <td>{{ $item->barangterjual->barang->nama }}</td>
                            <td>{{ $item->jumlah_barang }} Barang</td>
                            <td>{{ $item->pengiriman->nama_penerima }}</td>
                            <td>{{ $item->pengiriman->tgl_pengiriman }}</td>
                            <td>{{ $item->pengiriman->tgl_sampai }}</td>
                        </tr>
                    @endif
                @endif
            @endforeach
        </tbody>
    </table>
</body>
</html>