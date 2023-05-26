<div class="wrapper">
    <nav id="sidebar" class="sidebar js-sidebar">
        <div class="sidebar-content js-simplebar">
            <a class="sidebar-brand" href="index.html">
                <span class="align-middle">Nusantara Enggal Optimal</span>
            </a>

            <ul class="sidebar-nav">
                <li class="sidebar-header">
                    Menu
                </li>

                <li class="sidebar-item active">
                    <a class="sidebar-link" href="index.html">
                        <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
                    </a>
                </li>

                @if (Auth::user()->level == 'admin')
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('adminmanajemenuser.index') }}">
                        <i class="align-middle" data-feather="users"></i> <span class="align-middle">Manajemen
                            User</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('adminbarang.index') }}">
                        <i class="align-middle" data-feather="package"></i> <span class="align-middle">Barang</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('admincustomer.index') }}">
                        <i class="align-middle" data-feather="user-plus"></i> <span class="align-middle">Customer</span>
                    </a>
                </li>

                @endif

                <li class="sidebar-header">
                    Penjualan
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="ui-forms.html">
                        <i class="align-middle" data-feather="check-square"></i> <span class="align-middle">Pesanan</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="ui-cards.html">
                        <i class="align-middle" data-feather="credit-card"></i> <span class="align-middle">Pembayaran</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="ui-typography.html">
                        <i class="align-middle" data-feather="map-pin"></i> <span
                            class="align-middle">Pengantaran</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="icons-feather.html">
                        <i class="align-middle" data-feather="shopping-bag"></i> <span class="align-middle">Pengembalian</span>
                    </a>
                </li>

                <li class="sidebar-header">
                    Laporan
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="charts-chartjs.html">
                        <i class="align-middle" data-feather="clipboard"></i> <span class="align-middle">Penjualan</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="maps-google.html">
                        <i class="align-middle" data-feather="dollar-sign"></i> <span class="align-middle">Pendapatan</span>
                    </a>
                </li>
            </ul>

        </div>
    </nav>
