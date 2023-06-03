@extends('layouts.app')

@section('content')
    <div class="main-content container-fluid mt-5">

        <section class="section">
            <div class="card">
                <div class="card-header">
                    Master Data Barang
                </div>
                <div class="card-body">
                    <div class="table-responsive-sm">
                        <table class="table table-hover" id="myTable">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-left text-md">No</th>
                                    <th scope="col" class="text-left text-md">Kode Barang</th>
                                    <th scope="col" class="text-left text-md">Nama</th>
                                    <th scope="col" class="text-left text-md">Merek</th>
                                    <th scope="col" class="text-left text-md">Jumlah</th>
                                    <th scope="col" class="text-left text-md">Detail</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                @foreach ($data as $key => $item)
                                    <?php
                                        // Check if it's the first occurrence of kd_barang or not
                                        $firstOccurrence = ($key === 0 || $item->kd_barang !== $data[$key - 1]->kd_barang);
                                    ?>
                                    @if ($firstOccurrence)
                                        <tr>
                                            <td class="text-left text-md">{{ $no++ }}</td>
                                            <td class="text-left text-md">{{ $item->kd_barang }}</td>
                                            <td class="text-left text-md">{{ $item->nama }}</td>
                                            <td class="text-left text-md">{{ $item->merek }}</td>
                                            <td class="text-left text-md">
                                                <?php
                                                    $totalJumlah = $item->jumlah;
                                                    // Loop through subsequent items with the same kd_barang
                                                    for ($i = $key + 1; $i < count($data); $i++) {
                                                        if ($data[$i]->kd_barang === $item->kd_barang) {
                                                            $totalJumlah += $data[$i]->jumlah;
                                                        } else {
                                                            break; // Exit the loop when kd_barang changes
                                                        }
                                                    }
                                                    echo $totalJumlah . ' Barang';
                                                ?>
                                            </td>
                                            <td class="text-left text-md">
                                                <a href="{{ route('kepalacabangbarang.show', $item->kd_barang) }}" class="btn">
                                                    <i data-feather="more-horizontal"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
