<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Laporan Stok Barang</title>
    <style>
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
    <h1>Laporan Stok Barang</h1>
    <br>
    <table>
        <thead>
            <tr>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Jumlah Barang</th>
                <th>Barang Terjual</th>
                <th>Barang Dikembalikan</th>
            </tr>
        </thead>
        <tbody>
            @php
                $totalJumlahBarang = 0;
                $totalBarangTerjual = 0;
                $totalBarangDikembalikan = 0;
            @endphp
            @foreach ($data as $item)
                <?php
                $jumlah_barang = $item->jumlah ?? 0;
                $barang_terjual = $item->penjualanbarang->jumlah_barang ?? 0;
                $barang_dikembalikan = $item->pengembalian->jumlah_barang ?? 0;
                
                $totalJumlahBarang += $jumlah_barang;
                $totalBarangTerjual += $barang_terjual;
                $totalBarangDikembalikan += $barang_dikembalikan;
                ?>
                <tr>
                    <td>{{ $item->kd_barang }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->jumlah }} Barang</td>
                    <td>{{ $item->penjualanbarang->jumlah_barang ?? 0 }}
                        Barang</td>
                    <td>{{ $item->pengembalian->jumlah_barang ?? 0 }} Barang</td>
                </tr>
            @endforeach
        </tbody>
        <tr>
            <td colspan="2" class="text-right"><strong>Total Barang:</strong></td>
            <td class="text-left">{{ $totalJumlahBarang }} Barang</td>
            <td class="text-left">{{ $totalBarangTerjual }} Barang</td>
            <td class="text-left">{{ $totalBarangDikembalikan }} Barang</td>
        </tr>
    </table>
</body>

</html>
