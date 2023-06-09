<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Laporan Pendapatan</title>
    <style>
        @page {
            size: landscape;
        }

        body {
            font-family: Arial, sans-serif;
        }

        h1,
        h3 {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            text-align: center;
            border: 1px solid black;
            padding: 5px;
            font-size: 12px;
        }
    </style>
</head>

<body>
    <h1>Laporan Pendapatan</h1>
    <h3>Periode: {{ date('d F Y', strtotime($tanggalAwal)) }} - {{ date('d F Y', strtotime($tanggalAkhir)) }}</h3>
    <br>
    <table>
        <thead>
            <tr>
                <th>Tanggal Penjualan</th>
                <th>Kode Penjualan</th>
                <th>Nama Toko</th>
                <th>Nama Barang</th>
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
                @if ((isset($tanggalAwal) && $item->tgl_penjualan >= $tanggalAwal) || !isset($tanggalAwal))
                    @if ((isset($tanggalAkhir) && $item->tgl_penjualan <= $tanggalAkhir) || !isset($tanggalAkhir))
                        <?php
                            $pendapatan = ($item->barangterjual->barang->harga_jual - $item->barangterjual->barang->harga_beli) * $item->jumlah_barang;
                            $totalPendapatan += $pendapatan;
                        ?>
                        <tr>
                            <td>{{ $item->tgl_penjualan }}</td>
                            <td>{{ $item->kd_penjualan }}</td>
                            <td>{{ $item->customer->nama_toko }}</td>
                            <td>{{ $item->barangterjual->barang->nama }} Barang</td>
                            <td>{{ $item->jumlah_barang }} Barang</td>
                            <?php $pendapatan = ($item->barangterjual->barang->harga_jual - $item->barangterjual->barang->harga_beli) * $item->jumlah_barang; ?>
                            <td>{{ 'Rp ' . number_format($item->barangterjual->barang->harga_beli, 2, ',', '.') }}</td>
                            <td>{{ 'Rp ' . number_format($item->barangterjual->barang->harga_jual, 2, ',', '.') }}</td>
                            <td>{{ 'Rp ' . number_format($pendapatan, 2, ',', '.') }}</td>
                        </tr>
                    @endif
                @endif
            @endforeach
        </tbody>
        <tr>
            <td colspan="7" class="text-right"><strong>Total Pendapatan:</strong></td>
            <td class="text-left">{{ 'Rp ' . number_format($totalPendapatan, 2, ',', '.') }}</td>
        </tr>
    </table>
</body>

</html>
