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
            $totalSeluruhJumlahBarang = 0;
            $totalSeluruhBarangTerjual = 0;
            $totalSeluruhBarangDikembalikan = 0;
        @endphp
        @foreach ($data->unique('kd_barang') as $item)
            @php
                $totalJumlahBarang = $totalJumlah->where('kd_barang', $item->kd_barang)->first();
                $totalBarangTerjual = $totalJumlahterjual->where('kd_barang', $item->kd_barang)->first();
                $totalBarangDikembalikan = $totalJumlahrusak->where('kd_barang', $item->kd_barang)->first();
                
                $totalSeluruhJumlahBarang += $totalJumlahBarang ? $totalJumlahBarang->total_jumlah : 0;
                $totalSeluruhBarangTerjual += $totalBarangTerjual ? $totalBarangTerjual->total_jumlahterjual : 0;
                $totalSeluruhBarangDikembalikan += $totalBarangDikembalikan ? $totalBarangDikembalikan->total_jumlahrusak : 0;
            @endphp
                <tr>
                    <td>{{ $item->kd_barang }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $totalJumlahBarang ? $totalJumlahBarang->total_jumlah : 0 }} Barang</td>
                    <td>{{ $totalBarangTerjual ? $totalBarangTerjual->total_jumlahterjual : 0 }} Barang</td>
                    <td>{{ $totalBarangDikembalikan ? $totalBarangDikembalikan->total_jumlahrusak : 0 }}
                        Barang</td>
                </tr>
            @endforeach
        </tbody>
        <tr>
            <td colspan="2" class="text-right"><strong>Total Barang:</strong></td>
            <td class="text-left">{{ $totalSeluruhJumlahBarang }} Barang</td>
            <td class="text-left">{{ $totalSeluruhBarangTerjual }} Barang</td>
            <td class="text-left">{{ $totalSeluruhBarangDikembalikan }} Barang</td>
        </tr>
    </table>
</body>

</html>
