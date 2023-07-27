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
    <h1>Laporan Pengembalian</h1>
    <p><b>Periode:</b> {{ $tanggalAwal }} - {{ $tanggalAkhir }}</p>
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
                <tr>
                    <td>{{ $item->tgl_pengembalian ?? 'Tidak ada' }}</td>
                    <td>{{ $item->penjualan->kd_penjualan }}</td>
                    <td>{{ $item->penjualan->customer ? $item->penjualan->customer->nama_toko : '' }}</td>
                    <td>{{ $item->jumlah_barang }} Barang</td>
                    <td>{{ $item->penjualan->status_pengembalian ?? 'Tidak ada'}}</td>
                    <td>{{ $item->catatan ?? 'Tidak ada' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
