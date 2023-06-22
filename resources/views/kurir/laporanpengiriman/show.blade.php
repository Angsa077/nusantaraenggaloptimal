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
    <h2>Laporan Pengiriman</h2>
    <p><b>Periode:</b> {{ $tanggalAwal }} - {{ $tanggalAkhir }}</p>
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
                <tr>
                    <td>{{ $item->kd_penjualan }}</td>
                    <td>{{ $item->customer->nama_toko }}</td>
                    <td>{{ $item->barangterjual->barang->nama }}</td>
                    <td>{{ $item->jumlah_barang }} Barang</td>
                    <td>{{ $item->pengiriman->nama_penerima }}</td>
                    <td>{{ $item->pengiriman->tgl_pengiriman }}</td>
                    <td>{{ $item->pengiriman->tgl_sampai }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
