@extends('layouts.app')
@section('content')
    <div class="main-content container-fluid mt-5">
        <section class="section">
            <div class="card">
                <div class="card-header">
                    Manajemen User
                </div>
                <div class="card-body">
                    <div class="table-responsive-sm">
                        <table class="table table-hover" id="myTable">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-left text-md">No</th>
                                    <th scope="col" class="text-left text-md">Nama</th>
                                    <th scope="col" class="text-left text-md">NIP</th>
                                    <th scope="col" class="text-left text-md">Jabatan</th>
                                    <th scope="col" class="text-left text-md">No HP</th>
                                    <th scope="col" class="text-left text-md">Status Akun</th>
                                    <th scope="col" class="text-left text-md">Detail</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                @foreach ($data as $item)
                                    <tr>
                                        <td class="text-left text-md">{{ $no++ }}</td>
                                        <td class="text-left text-md">{{ $item->name }}</td>
                                        <td class="text-left text-md">{{ $item->nip }}</td>
                                        <td class="text-left text-md">{{ $item->level }}</td>
                                        <td class="text-left text-md">{{ $item->no_hp }}</td>
                                        <td class="text-left text-md">{{ $item->status_akun }}</td>
                                        <td class="text-left text-md"><a href="{{ route('supervisormanajemenuser.show', $item->id) }}"
                                                class="btn"><i data-feather="more-horizontal"></i></a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
