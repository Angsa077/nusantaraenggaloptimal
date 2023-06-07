<!DOCTYPE html>
<html>

<head>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            text-align: center;
            vertical-align: middle;
            border: 1px solid black;
            padding: 5px;
        }
    </style>
</head>

<body>
    <h2>Laporan Pendapatan</h2>
    <p><b>Periode:</b> {{ $tanggalAwal }} - {{ $tanggalAkhir }}</p>
    <table>
        <thead>
            <tr>
                <th>Tanggal Penjualan</th>
                <th>Kode Penjualan</th>
                <th>Nama Barang</th>
                <th>Nama Toko</th>
                <th>Barang Terjual</th>
                <th>Harga Beli</th>
                <th>Harga Jual</th>
                <th>Pendapatan</th>
            </tr>
        </thead>
        <tbody>
            @php
                $totalPendapatan = 0;
            @endphp
            @foreach ($data as $item)
                <?php
                $pendapatan = ($item->barang->harga_jual - $item->barang->harga_beli) * $item->jumlah_barang;
                $totalPendapatan += $pendapatan;
                ?>
                <tr>
                    <td>{{ $item->tgl_penjualan }}</td>
                    <td>{{ $item->kd_penjualan }}</td>
                    <td>{{ $item->barang->nama }}</td>
                    <td>{{ $item->customer->nama_toko }}</td>
                    <td>{{ $item->jumlah_barang }} Barang</td>
                    <?php $pendapatan = ($item->barang->harga_jual - $item->barang->harga_beli) * $item->jumlah_barang; ?>
                    <td>{{ 'Rp ' . number_format($item->barang->harga_beli, 2, ',', '.') }}</td>
                    <td>{{ 'Rp ' . number_format($item->barang->harga_jual, 2, ',', '.') }}</td>
                    <td>{{ 'Rp ' . number_format($pendapatan, 2, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
        <tr>
            <td colspan="7" class="text-right"><strong>Total Pendapatan:</strong></td>
            <td class="text-left">{{ 'Rp ' . number_format($totalPendapatan, 2, ',', '.') }}</td>
        </tr>
    </table>
</body>

</html>
