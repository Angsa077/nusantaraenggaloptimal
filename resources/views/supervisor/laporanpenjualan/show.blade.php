<!DOCTYPE html>
<html>
<head>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            text-align: center;
            vertical-align: middle;
            border: 1px solid black;
            padding: 5px;
        }
    </style>
</head>
<body>
    <h2>Laporan Penjualan</h2>
    <p><b>Periode:</b> {{ $tanggalAwal }} - {{ $tanggalAkhir }}</p>
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
                <tr>
                    <td>{{ $item->tgl_penjualan }}</td>
                    <td>{{ $item->kd_penjualan }}</td>
                    <td>{{ $item->customer->nama_toko }}</td>
                    <td>{{ $item->barangterjual->barang->nama }}</td>
                    <td>{{ $item->jumlah_barang }} Barang</td>
                    <td>{{ 'Rp ' . number_format($item->total_harga, 2, ',', '.') }}</td>
                    <td>{{ 'Rp ' . number_format($item->total_bayar, 2, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
