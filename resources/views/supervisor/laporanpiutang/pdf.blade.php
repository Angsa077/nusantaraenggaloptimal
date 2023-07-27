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
    <h1>Laporan Piutang</h1>
    <br>
    <table>
        <thead>
            <tr>
                <th>Kode Customer</th>
                <th>Nama Toko</th>
                <th>Nama Pemilik</th>
                <th>Alamat</th>
                <th>Utang</th>
            </tr>
        </thead>
        <tbody>
            @php
                $totalPiutang = 0;
            @endphp
            @foreach ($data as $item)
                @php
                    $totalPiutang += $item->utang;
                @endphp
                <tr>
                    <td>{{ $item->kd_customer }}</td>
                    <td>{{ $item->nama_toko }}</td>
                    <td>{{ $item->nama_pemilik }}</td>
                    <td>{{ $item->alamat }}</td>
                    <td>{{ 'Rp ' . number_format($item->utang, 2, ',', '.') }}
                    </td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="4" class="text-left"><strong>Total:</strong></td>
                <td class="text-left">{{ 'Rp ' . number_format($totalPiutang, 2, ',', '.') }}</td>
            </tr>
        </tfoot>
    </table>
</body>

</html>
