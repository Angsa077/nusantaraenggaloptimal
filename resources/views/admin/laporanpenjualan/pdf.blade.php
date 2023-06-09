<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Laporan Penjualan</title>
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
    <h1>Laporan Penjualan</h1>
    <h3>Periode: {{ date('d F Y', strtotime($tanggalAwal)) }} - {{ date('d F Y', strtotime($tanggalAkhir)) }}</h3>
    <br>
    <table>
        <thead>
            <tr>
                <th>Tanggal Penjualan</th>
                <th>Kode Penjualan</th>
                <th>Nama Toko</th>
                <th>Nama Barang</th>
                <th>Jumlah Barang</th>
                <th>Total Harga</th>
                <th>Total Dibayar</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                @if ((isset($tanggalAwal) && $item->tgl_penjualan >= $tanggalAwal) || !isset($tanggalAwal))
                    @if ((isset($tanggalAkhir) && $item->tgl_penjualan <= $tanggalAkhir) || !isset($tanggalAkhir))
                        <tr>
                            <td>{{ $item->tgl_penjualan }}</td>
                            <td>{{ $item->kd_penjualan }}</td>
                            <td>{{ $item->customer->nama_toko }}</td>
                            <td>{{ $item->barangterjual->barang->nama }}</td>
                            <td>{{ $item->jumlah_barang }} Barang</td>
                            <td>{{ 'Rp ' . number_format($item->total_harga, 2, ',', '.') }}</td>
                            <td>{{ 'Rp ' . number_format($item->total_bayar, 2, ',', '.') }}</td>
                        </tr>
                    @endif
                @endif
            @endforeach
        </tbody>
    </table>
</body>
</html>