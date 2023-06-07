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
    <h2>Laporan Stok Barang</h2>
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
