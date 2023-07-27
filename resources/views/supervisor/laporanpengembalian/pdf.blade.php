<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Laporan Pengembalian</title>
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
    <h1>Laporan Pengembalian</h1>
    <h3>Periode: {{ date('d F Y', strtotime($tanggalAwal)) }} - {{ date('d F Y', strtotime($tanggalAkhir)) }}</h3>
    <br>
    <table>
        <thead>
            <tr>
                <th>Tanggal Pengembalian</th>
                <th>Kode Penjualan</th>
                <th>Nama Toko</th>
                <th>Jumlah</th>
                <th>Status</th>
                <th>Alasan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                @if ((isset($tanggalAwal) && $item->tgl_pengembalian >= $tanggalAwal) || !isset($tanggalAwal))
                    @if ((isset($tanggalAkhir) && $item->tgl_pengembalian <= $tanggalAkhir) || !isset($tanggalAkhir))
                        <tr>
                            <td>{{ $item->tgl_pengembalian ?? 'Tidak ada' }}</td>
                            <td>{{ $item->penjualan->kd_penjualan }}</td>
                            <td>{{ $item->penjualan->customer ? $item->penjualan->customer->nama_toko : '' }}</td>
                            <td>{{ $item->jumlah_barang }} Barang</td>
                            <td>{{ $item->penjualan->status_pengembalian ?? 'Tidak ada'}}</td>
                            <td>{{ $item->catatan ?? 'Tidak ada' }}</td>
                        </tr>
                    @endif
                @endif
            @endforeach
        </tbody>
    </table>
</body>
</html>