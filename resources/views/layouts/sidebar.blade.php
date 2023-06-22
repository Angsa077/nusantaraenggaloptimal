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
                    <li class="sidebar-item  {{ \Route::is('admin.manajemenuser.index') ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ route('admin.manajemenuser.index') }}">
                            <i class="align-middle" data-feather="users"></i> <span class="align-middle">Manajemen
                                User</span>
                        </a>
                    </li>

                    <li class="sidebar-item {{ \Route::is('admin.barang.index') ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ route('admin.barang.index') }}">
                            <i class="align-middle" data-feather="package"></i> <span class="align-middle">Barang</span>
                        </a>
                    </li>

                    <li class="sidebar-item {{ \Route::is('admin.barangpengembalian.index') ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ route('admin.barangpengembalian.index') }}">
                            <i class="align-middle" data-feather="package"></i> <span class="align-middle">Barang Pengembalian</span>
                        </a>
                    </li>

                    <li class="sidebar-item {{ \Route::is('admin.customer.index') ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ route('admin.customer.index') }}">
                            <i class="align-middle" data-feather="user-plus"></i> <span
                                class="align-middle">Customer</span>
                        </a>
                    </li>

                    <li class="sidebar-header">
                        Penjualan
                    </li>

                    <li class="sidebar-item  {{ \Route::is('admin.penjualan.index') ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ route('admin.penjualan.index') }}">
                            <i class="align-middle" data-feather="check-square"></i> <span
                                class="align-middle">Penjualan</span>
                        </a>
                    </li>

                    <li class="sidebar-item {{ \Route::is('admin.pembayaran.index') ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ route('admin.pembayaran.index') }}">
                            <i class="align-middle" data-feather="credit-card"></i> <span
                                class="align-middle">Pembayaran</span>
                        </a>
                    </li>

                    <li class="sidebar-item {{ \Route::is('admin.pengiriman.index') ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ route('admin.pengiriman.index') }}">
                            <i class="align-middle" data-feather="map-pin"></i> <span
                                class="align-middle">pengiriman</span>
                        </a>
                    </li>

                    <li class="sidebar-item {{ \Route::is('admin.pengembalian.index') ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ route('admin.pengembalian.index') }}">
                            <i class="align-middle" data-feather="shopping-bag"></i> <span
                                class="align-middle">Pengembalian</span>
                        </a>
                    </li>

                    <li class="sidebar-header">
                        Laporan
                    </li>

                    <li class="sidebar-item {{ \Route::is('admin.laporanpenjualan.index') ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ route('admin.laporanpenjualan.index') }}">
                            <i class="align-middle" data-feather="clipboard"></i> <span class="align-middle">Laporan
                                Penjualan</span>
                        </a>
                    </li>

                    <li class="sidebar-item {{ \Route::is('admin.laporanpendapatan.index') ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ route('admin.laporanpendapatan.index') }}">
                            <i class="align-middle" data-feather="dollar-sign"></i> <span class="align-middle">Laporan
                                Pendapatan</span>
                        </a>
                    </li>

                    <li class="sidebar-item {{ \Route::is('admin.stokbarang.index') ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ route('admin.stokbarang.index') }}">
                            <i class="align-middle" data-feather="package"></i> <span class="align-middle">
                                Stok
                                Barang</span>
                        </a>
                    </li>
                @endif

                @if (Auth::user()->level == 'kepalacabang')
                    <li class="sidebar-item {{ \Route::is('kepalacabang.manajemenuser.index') ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ route('kepalacabang.manajemenuser.index') }}">
                            <i class="align-middle" data-feather="users"></i> <span class="align-middle">Manajemen
                                User</span>
                        </a>
                    </li>

                    <li class="sidebar-item {{ \Route::is('kepalacabang.barang.index') ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ route('kepalacabang.barang.index') }}">
                            <i class="align-middle" data-feather="package"></i> <span class="align-middle">Barang</span>
                        </a>
                    </li>

                    <li class="sidebar-item {{ \Route::is('kepalacabang.customer.index') ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ route('kepalacabang.customer.index') }}">
                            <i class="align-middle" data-feather="user-plus"></i> <span
                                class="align-middle">Customer</span>
                        </a>
                    </li>

                    <li class="sidebar-header">
                        Laporan
                    </li>

                    <li class="sidebar-item {{ \Route::is('kepalacabang.laporanpenjualan.index') ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ route('kepalacabang.laporanpenjualan.index') }}">
                            <i class="align-middle" data-feather="clipboard"></i> <span class="align-middle">Laporan
                                Penjualan</span>
                        </a>
                    </li>

                    <li class="sidebar-item {{ \Route::is('kepalacabang.laporanpendapatan.index') ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ route('kepalacabang.laporanpendapatan.index') }}">
                            <i class="align-middle" data-feather="dollar-sign"></i> <span
                                class="align-middle">Laporan
                                Pendapatan</span>
                        </a>
                    </li>

                    <li class="sidebar-item {{ \Route::is('kepalacabang.stokbarang.index') ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ route('kepalacabang.stokbarang.index') }}">
                            <i class="align-middle" data-feather="package"></i> <span class="align-middle">
                                Stok
                                Barang</span>
                        </a>
                    </li>
                @endif

                @if (Auth::user()->level == 'supervisor')
                    <li class="sidebar-item {{ \Route::is('supervisor.manajemenuser.index') ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ route('supervisor.manajemenuser.index') }}">
                            <i class="align-middle" data-feather="users"></i> <span class="align-middle">Manajemen
                                User</span>
                        </a>
                    </li>

                    <li class="sidebar-item {{ \Route::is('supervisor.barang.index') ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ route('supervisor.barang.index') }}">
                            <i class="align-middle" data-feather="package"></i> <span
                                class="align-middle">Barang</span>
                        </a>
                    </li>

                    <li class="sidebar-item {{ \Route::is('supervisor.customer.index') ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ route('supervisor.customer.index') }}">
                            <i class="align-middle" data-feather="user-plus"></i> <span
                                class="align-middle">Customer</span>
                        </a>
                    </li>

                    <li class="sidebar-header">
                        Penjualan
                    </li>

                    <li class="sidebar-item {{ \Route::is('supervisor.penjualan.index') ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ route('supervisor.penjualan.index') }}">
                            <i class="align-middle" data-feather="check-square"></i> <span
                                class="align-middle">Penjualan</span>
                        </a>
                    </li>

                    <li class="sidebar-item {{ \Route::is('supervisor.pembayaran.index') ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ route('supervisor.pembayaran.index') }}">
                            <i class="align-middle" data-feather="credit-card"></i> <span
                                class="align-middle">Pembayaran</span>
                        </a>
                    </li>

                    <li class="sidebar-item {{ \Route::is('supervisor.pengiriman.index') ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ route('supervisor.pengiriman.index') }}">
                            <i class="align-middle" data-feather="map-pin"></i> <span
                                class="align-middle">pengiriman</span>
                        </a>
                    </li>

                    <li class="sidebar-item {{ \Route::is('supervisor.pengembalian.index') ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ route('supervisor.pengembalian.index') }}">
                            <i class="align-middle" data-feather="shopping-bag"></i> <span
                                class="align-middle">Pengembalian</span>
                        </a>
                    </li>

                    <li class="sidebar-header">
                        Laporan
                    </li>

                    <li class="sidebar-item {{ \Route::is('supervisor.laporanpenjualan.index') ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ route('supervisor.laporanpenjualan.index') }}">
                            <i class="align-middle" data-feather="clipboard"></i> <span class="align-middle">Laporan
                                Penjualan</span>
                        </a>
                    </li>

                    <li class="sidebar-item {{ \Route::is('supervisor.laporanpendapatan.index') ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ route('supervisor.laporanpendapatan.index') }}">
                            <i class="align-middle" data-feather="dollar-sign"></i> <span
                                class="align-middle">Laporan
                                Pendapatan</span>
                        </a>
                    </li>

                    <li class="sidebar-item {{ \Route::is('supervisor.stokbarang.index') ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ route('supervisor.stokbarang.index') }}">
                            <i class="align-middle" data-feather="package"></i> <span class="align-middle">
                                Stok
                                Barang</span>
                        </a>
                    </li>
                @endif

                @if (Auth::user()->level == 'sales')
                    <li class="sidebar-item {{ \Route::is('sales.barang.index') ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ route('sales.barang.index') }}">
                            <i class="align-middle" data-feather="package"></i> <span
                                class="align-middle">Barang</span>
                        </a>
                    </li>

                    <li class="sidebar-item {{ \Route::is('sales.customer.index') ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ route('sales.customer.index') }}">
                            <i class="align-middle" data-feather="user-plus"></i> <span
                                class="align-middle">Customer</span>
                        </a>
                    </li>

                    <li class="sidebar-header">
                        Penjualan
                    </li>

                    <li class="sidebar-item {{ \Route::is('sales.penjualan.index') ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ route('sales.penjualan.index') }}">
                            <i class="align-middle" data-feather="check-square"></i> <span
                                class="align-middle">Penjualan</span>
                        </a>
                    </li>

                    <li class="sidebar-item {{ \Route::is('sales.pembayaran.index') ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ route('sales.pembayaran.index') }}">
                            <i class="align-middle" data-feather="credit-card"></i> <span
                                class="align-middle">Pembayaran</span>
                        </a>
                    </li>

                    <li class="sidebar-item {{ \Route::is('sales.pengiriman.index') ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ route('sales.pengiriman.index') }}">
                            <i class="align-middle" data-feather="map-pin"></i> <span
                                class="align-middle">pengiriman</span>
                        </a>
                    </li>

                    <li class="sidebar-item {{ \Route::is('sales.pengembalian.index') ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ route('sales.pengembalian.index') }}">
                            <i class="align-middle" data-feather="shopping-bag"></i> <span
                                class="align-middle">Pengembalian</span>
                        </a>
                    </li>

                    <li class="sidebar-header">
                        Laporan
                    </li>

                    <li class="sidebar-item {{ \Route::is('sales.laporanpenjualan.index') ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ route('sales.laporanpenjualan.index') }}">
                            <i class="align-middle" data-feather="clipboard"></i> <span class="align-middle">Laporan
                                Penjualan</span>
                        </a>
                    </li>

                    <li class="sidebar-item {{ \Route::is('sales.laporanpendapatan.index') ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ route('sales.laporanpendapatan.index') }}">
                            <i class="align-middle" data-feather="dollar-sign"></i> <span
                                class="align-middle">Laporan
                                Pendapatan</span>
                        </a>
                    </li>

                    <li class="sidebar-item {{ \Route::is('sales.stokbarang.index') ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ route('sales.stokbarang.index') }}">
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

                    <li class="sidebar-item {{ \Route::is('kurir.pengiriman.index') ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ route('kurir.pengiriman.index') }}">
                            <i class="align-middle" data-feather="map-pin"></i> <span
                                class="align-middle">pengiriman</span>
                        </a>
                    </li>

                    <li class="sidebar-item {{ \Route::is('kurir.pengembalian.index') ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ route('kurir.pengembalian.index') }}">
                            <i class="align-middle" data-feather="shopping-bag"></i> <span
                                class="align-middle">Pengembalian</span>
                        </a>
                    </li>

                    <li class="sidebar-header">
                        Laporan
                    </li>

                    <li class="sidebar-item {{ \Route::is('kurir.laporanpengiriman.index') ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ route('kurir.laporanpengiriman.index') }}">
                            <i class="align-middle" data-feather="clipboard"></i> <span class="align-middle">Laporan
                                Pengiriman</span>
                        </a>
                    </li>

                    <li class="sidebar-item {{ \Route::is('kurir.stokbarang.index') ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ route('kurir.stokbarang.index') }}">
                            <i class="align-middle" data-feather="package"></i> <span class="align-middle">
                                Stok
                                Barang</span>
                        </a>
                    </li>
                @endif
            </ul>

        </div>
    </nav>
