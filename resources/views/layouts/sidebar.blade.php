<div class="wrapper">
    <nav id="sidebar" class="sidebar js-sidebar">
        <div class="sidebar-content js-simplebar">
            <a class="sidebar-brand" href="{{ route('dashboard') }}" style="text-decoration: none">
                <span class="align-middle">Nusantara Enggal Optimal</span>
            </a>

            <ul class="sidebar-nav">
                <li class="sidebar-header">
                    Menu
                </li>

                <li class="sidebar-item {{ \Route::is('dashboard') ? 'active' : '' }}">
                    <a class="sidebar-link" href="{{ route('dashboard') }}">
                        <i class="align-middle" data-feather="home"></i> <span class="align-middle">Dashboard</span>
                    </a>
                </li>

                @if (Auth::user()->level == 'admin')
                    <li class="sidebar-item  {{ \Route::is('adminmanajemenuser.index') ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ route('adminmanajemenuser.index') }}">
                            <i class="align-middle" data-feather="users"></i> <span class="align-middle">Manajemen
                                User</span>
                        </a>
                    </li>

                    <li class="sidebar-item {{ \Route::is('adminbarang.index') ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ route('adminbarang.index') }}">
                            <i class="align-middle" data-feather="package"></i> <span class="align-middle">Barang</span>
                        </a>
                    </li>

                    <li class="sidebar-item {{ \Route::is('admincustomer.index') ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ route('admincustomer.index') }}">
                            <i class="align-middle" data-feather="user-plus"></i> <span
                                class="align-middle">Customer</span>
                        </a>
                    </li>

                    <li class="sidebar-header">
                        Penjualan
                    </li>

                    <li class="sidebar-item  {{ \Route::is('adminpenjualan.index') ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ route('adminpenjualan.index') }}">
                            <i class="align-middle" data-feather="check-square"></i> <span
                                class="align-middle">Penjualan</span>
                        </a>
                    </li>

                    <li class="sidebar-item {{ \Route::is('adminpembayaran.index') ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ route('adminpembayaran.index') }}">
                            <i class="align-middle" data-feather="credit-card"></i> <span
                                class="align-middle">Pembayaran</span>
                        </a>
                    </li>

                    <li class="sidebar-item {{ \Route::is('adminpengiriman.index') ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ route('adminpengiriman.index') }}">
                            <i class="align-middle" data-feather="map-pin"></i> <span
                                class="align-middle">pengiriman</span>
                        </a>
                    </li>

                    <li class="sidebar-item {{ \Route::is('adminpengembalian.index') ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ route('adminpengembalian.index') }}">
                            <i class="align-middle" data-feather="shopping-bag"></i> <span
                                class="align-middle">Pengembalian</span>
                        </a>
                    </li>

                    <li class="sidebar-header">
                        Laporan
                    </li>

                    <li class="sidebar-item {{ \Route::is('adminlaporanpenjualan.index') ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ route('adminlaporanpenjualan.index') }}">
                            <i class="align-middle" data-feather="clipboard"></i> <span class="align-middle">Laporan
                                Penjualan</span>
                        </a>
                    </li>

                    <li class="sidebar-item {{ \Route::is('adminlaporanpendapatan.index') ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ route('adminlaporanpendapatan.index') }}">
                            <i class="align-middle" data-feather="dollar-sign"></i> <span class="align-middle">Laporan
                                Pendapatan</span>
                        </a>
                    </li>

                    <li class="sidebar-item {{ \Route::is('adminstokbarang.index') ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ route('adminstokbarang.index') }}">
                            <i class="align-middle" data-feather="package"></i> <span class="align-middle">
                                Stok
                                Barang</span>
                        </a>
                    </li>
                @endif

                @if (Auth::user()->level == 'kepalacabang')
                    <li class="sidebar-item {{ \Route::is('kepalacabangmanajemenuser.index') ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ route('kepalacabangmanajemenuser.index') }}">
                            <i class="align-middle" data-feather="users"></i> <span class="align-middle">Manajemen
                                User</span>
                        </a>
                    </li>

                    <li class="sidebar-item {{ \Route::is('kepalacabangbarang.index') ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ route('kepalacabangbarang.index') }}">
                            <i class="align-middle" data-feather="package"></i> <span class="align-middle">Barang</span>
                        </a>
                    </li>

                    <li class="sidebar-item {{ \Route::is('kepalacabangcustomer.index') ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ route('kepalacabangcustomer.index') }}">
                            <i class="align-middle" data-feather="user-plus"></i> <span
                                class="align-middle">Customer</span>
                        </a>
                    </li>

                    <li class="sidebar-header">
                        Laporan
                    </li>

                    <li class="sidebar-item {{ \Route::is('kepalacabanglaporanpenjualan.index') ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ route('kepalacabanglaporanpenjualan.index') }}">
                            <i class="align-middle" data-feather="clipboard"></i> <span class="align-middle">Laporan
                                Penjualan</span>
                        </a>
                    </li>

                    <li class="sidebar-item {{ \Route::is('kepalacabanglaporanpendapatan.index') ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ route('kepalacabanglaporanpendapatan.index') }}">
                            <i class="align-middle" data-feather="dollar-sign"></i> <span
                                class="align-middle">Laporan
                                Pendapatan</span>
                        </a>
                    </li>

                    <li class="sidebar-item {{ \Route::is('kepalacabangstokbarang.index') ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ route('kepalacabangstokbarang.index') }}">
                            <i class="align-middle" data-feather="package"></i> <span class="align-middle">
                                Stok
                                Barang</span>
                        </a>
                    </li>
                @endif

                @if (Auth::user()->level == 'supervisor')
                    <li class="sidebar-item {{ \Route::is('supervisormanajemenuser.index') ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ route('supervisormanajemenuser.index') }}">
                            <i class="align-middle" data-feather="users"></i> <span class="align-middle">Manajemen
                                User</span>
                        </a>
                    </li>

                    <li class="sidebar-item {{ \Route::is('supervisorbarang.index') ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ route('supervisorbarang.index') }}">
                            <i class="align-middle" data-feather="package"></i> <span
                                class="align-middle">Barang</span>
                        </a>
                    </li>

                    <li class="sidebar-item {{ \Route::is('supervisorcustomer.index') ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ route('supervisorcustomer.index') }}">
                            <i class="align-middle" data-feather="user-plus"></i> <span
                                class="align-middle">Customer</span>
                        </a>
                    </li>

                    <li class="sidebar-header">
                        Penjualan
                    </li>

                    <li class="sidebar-item {{ \Route::is('supervisorpenjualan.index') ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ route('supervisorpenjualan.index') }}">
                            <i class="align-middle" data-feather="check-square"></i> <span
                                class="align-middle">Penjualan</span>
                        </a>
                    </li>

                    <li class="sidebar-item {{ \Route::is('supervisorpembayaran.index') ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ route('supervisorpembayaran.index') }}">
                            <i class="align-middle" data-feather="credit-card"></i> <span
                                class="align-middle">Pembayaran</span>
                        </a>
                    </li>

                    <li class="sidebar-item {{ \Route::is('supervisorpengiriman.index') ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ route('supervisorpengiriman.index') }}">
                            <i class="align-middle" data-feather="map-pin"></i> <span
                                class="align-middle">pengiriman</span>
                        </a>
                    </li>

                    <li class="sidebar-item {{ \Route::is('supervisorpengembalian.index') ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ route('supervisorpengembalian.index') }}">
                            <i class="align-middle" data-feather="shopping-bag"></i> <span
                                class="align-middle">Pengembalian</span>
                        </a>
                    </li>

                    <li class="sidebar-header">
                        Laporan
                    </li>

                    <li class="sidebar-item {{ \Route::is('supervisorlaporanpenjualan.index') ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ route('supervisorlaporanpenjualan.index') }}">
                            <i class="align-middle" data-feather="clipboard"></i> <span class="align-middle">Laporan
                                Penjualan</span>
                        </a>
                    </li>

                    <li class="sidebar-item {{ \Route::is('supervisorlaporanpendapatan.index') ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ route('supervisorlaporanpendapatan.index') }}">
                            <i class="align-middle" data-feather="dollar-sign"></i> <span
                                class="align-middle">Laporan
                                Pendapatan</span>
                        </a>
                    </li>

                    <li class="sidebar-item {{ \Route::is('supervisorstokbarang.index') ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ route('supervisorstokbarang.index') }}">
                            <i class="align-middle" data-feather="package"></i> <span class="align-middle">
                                Stok
                                Barang</span>
                        </a>
                    </li>
                @endif

                @if (Auth::user()->level == 'sales')
                    <li class="sidebar-item {{ \Route::is('salesbarang.index') ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ route('salesbarang.index') }}">
                            <i class="align-middle" data-feather="package"></i> <span
                                class="align-middle">Barang</span>
                        </a>
                    </li>

                    <li class="sidebar-item {{ \Route::is('salescustomer.index') ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ route('salescustomer.index') }}">
                            <i class="align-middle" data-feather="user-plus"></i> <span
                                class="align-middle">Customer</span>
                        </a>
                    </li>

                    <li class="sidebar-header">
                        Penjualan
                    </li>

                    <li class="sidebar-item {{ \Route::is('salespenjualan.index') ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ route('salespenjualan.index') }}">
                            <i class="align-middle" data-feather="check-square"></i> <span
                                class="align-middle">Penjualan</span>
                        </a>
                    </li>

                    <li class="sidebar-item {{ \Route::is('salespembayaran.index') ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ route('salespembayaran.index') }}">
                            <i class="align-middle" data-feather="credit-card"></i> <span
                                class="align-middle">Pembayaran</span>
                        </a>
                    </li>

                    <li class="sidebar-item {{ \Route::is('salespengiriman.index') ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ route('salespengiriman.index') }}">
                            <i class="align-middle" data-feather="map-pin"></i> <span
                                class="align-middle">pengiriman</span>
                        </a>
                    </li>

                    <li class="sidebar-item {{ \Route::is('salespengembalian.index') ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ route('salespengembalian.index') }}">
                            <i class="align-middle" data-feather="shopping-bag"></i> <span
                                class="align-middle">Pengembalian</span>
                        </a>
                    </li>

                    <li class="sidebar-header">
                        Laporan
                    </li>

                    <li class="sidebar-item {{ \Route::is('saleslaporanpenjualan.index') ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ route('saleslaporanpenjualan.index') }}">
                            <i class="align-middle" data-feather="clipboard"></i> <span class="align-middle">Laporan
                                Penjualan</span>
                        </a>
                    </li>

                    <li class="sidebar-item {{ \Route::is('saleslaporanpendapatan.index') ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ route('saleslaporanpendapatan.index') }}">
                            <i class="align-middle" data-feather="dollar-sign"></i> <span
                                class="align-middle">Laporan
                                Pendapatan</span>
                        </a>
                    </li>

                    <li class="sidebar-item {{ \Route::is('salesstokbarang.index') ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ route('salesstokbarang.index') }}">
                            <i class="align-middle" data-feather="package"></i> <span class="align-middle">
                                Stok
                                Barang</span>
                        </a>
                    </li>
                @endif

                @if (Auth::user()->level == 'kurir')
                    <li class="sidebar-header">
                        Penjualan
                    </li>

                    <li class="sidebar-item {{ \Route::is('kurirpengiriman.index') ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ route('kurirpengiriman.index') }}">
                            <i class="align-middle" data-feather="map-pin"></i> <span
                                class="align-middle">pengiriman</span>
                        </a>
                    </li>

                    <li class="sidebar-item {{ \Route::is('kurirpengembalian.index') ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ route('kurirpengembalian.index') }}">
                            <i class="align-middle" data-feather="shopping-bag"></i> <span
                                class="align-middle">Pengembalian</span>
                        </a>
                    </li>

                    <li class="sidebar-header">
                        Laporan
                    </li>

                    <li class="sidebar-item {{ \Route::is('kurirstokbarang.index') ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ route('kurirstokbarang.index') }}">
                            <i class="align-middle" data-feather="package"></i> <span class="align-middle">
                                Stok
                                Barang</span>
                        </a>
                    </li>
                @endif
            </ul>

        </div>
    </nav>
