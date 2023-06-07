<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Laporan Stok Barang Pengembalian</title>
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
    <h1>Laporan Stok Barang Pengembalian</h1>
    <br>
    <table>
        <thead>
            <tr>
                <th>Tgl Penerimaan Barang</th>
                <th>Kode Penjualan</th>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Jumlah Barang</th>
            </tr>
        </thead>
        <tbody>
            @php
                $totalJumlahBarang = 0;
            @endphp
            @foreach ($data as $item)
                <?php
                $JumlahBarang = $item->barang->jumlah;
                $totalJumlahBarang += $JumlahBarang;
                ?>
                <tr>
                    <td>{{ $item->tgl_barangpengembalian }}</td>
                    <td>{{ $item->kd_penjualan }}</td>
                    <td>{{ $item->kd_barang }}</td>
                    <td>{{ $item->barang->nama }}</td>
                    <td>{{ $item->barang->jumlah ?? 0 }}
                        Barang</td>
                </tr>
            @endforeach
        </tbody>
        <tr>
            <td colspan="4" class="text-right"><strong>Total Barang:</strong></td>
            <td class="text-left">{{ $totalJumlahBarang }} Barang</td>
        </tr>
    </table>
</body>

</html>
