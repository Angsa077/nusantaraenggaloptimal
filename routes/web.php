<?php

use App\Http\Controllers\AdminBarangController;
use App\Http\Controllers\AdminBarangPengembalianController;
use App\Http\Controllers\AdminCustomerController;
use App\Http\Controllers\AdminLaporanPendapatanController;
use App\Http\Controllers\AdminLaporanPenjualanController;
use App\Http\Controllers\AdminLaporanStokBarangController;
use App\Http\Controllers\AdminManajemenuserController;
use App\Http\Controllers\AdminPembayaran;
use App\Http\Controllers\AdminPengembalian;
use App\Http\Controllers\AdminPengiriman;
use App\Http\Controllers\AdminPenjualanController;
use App\Http\Controllers\ChangedPasswordController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KepalaCabangBarangController;
use App\Http\Controllers\KepalaCabangCustomerController;
use App\Http\Controllers\KepalaCabangLaporanPendapatapanController;
use App\Http\Controllers\KepalaCabangLaporanPenjualanController;
use App\Http\Controllers\KepalaCabangLaporanStokBarangController;
use App\Http\Controllers\KepalaCabangManajemenuserController;
use App\Http\Controllers\KurirLaporanPengirimanController;
use App\Http\Controllers\KurirLaporanStokBarangController;
use App\Http\Controllers\KurirPengembalian;
use App\Http\Controllers\KurirPengiriman;
use App\Http\Controllers\ProfiledController;
use App\Http\Controllers\SalesBarangController;
use App\Http\Controllers\SalesCustomerController;
use App\Http\Controllers\SalesLaporanPendapatanController;
use App\Http\Controllers\SalesLaporanPenjualanController;
use App\Http\Controllers\SalesLaporanStokBarangController;
use App\Http\Controllers\SalesPembayaran;
use App\Http\Controllers\SalesPengembalian;
use App\Http\Controllers\SalesPengiriman;
use App\Http\Controllers\SalesPenjualanController;
use App\Http\Controllers\SupervisorBarangController;
use App\Http\Controllers\SupervisorCustomerController;
use App\Http\Controllers\SupervisorLaporanPendapatan;
use App\Http\Controllers\SupervisorLaporanPenjualan;
use App\Http\Controllers\SupervisorLaporanStokbarang;
use App\Http\Controllers\SupervisorLaporanStokbarangPengembalian;
use App\Http\Controllers\SupervisorManajemenuserController;
use App\Http\Controllers\SupervisorPembayaran;
use App\Http\Controllers\SupervisorPengembalian;
use App\Http\Controllers\SupervisorPengiriman;
use App\Http\Controllers\SupervisorPenjualanController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified'
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });

Route::get('/changed-password', [ChangedPasswordController::class, 'showChangedPasswordForm'])->name('password.changed');
Route::post('/changed-password', [ChangedPasswordController::class, 'changedPassword'])->name('password.updated');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/', function () {
        return view('dashboard');
    });
    // Route::get('dashboard', function (){ return view('dashboard'); })->name('dashboard');
    Route::get('/dashboard', [DashboardController::class, "index"])->name('dashboard');
    Route::get('/change-profile', [ProfiledController::class, 'showProfile'])->name('profile.changed');
    Route::put('/change-profile', [ProfiledController::class, 'changeprofile'])->name('profile.updated');
    Route::post('/getkabupaten', [AdminCustomerController::class, 'getkabupaten'])->name(('getkabupaten'));
    Route::post('/getkecamatan', [AdminCustomerController::class, 'getkecamatan'])->name(('getkecamatan'));
    Route::post('/getdesa', [AdminCustomerController::class, 'getdesa'])->name(('getdesa'));
});

Route::prefix('admin')->middleware('auth', 'level:admin')->group(function () {
    Route::resource('manajemenuser', AdminManajemenuserController::class)->names('admin.manajemenuser');
    Route::resource('barang', AdminBarangController::class)->names('admin.barang');
    Route::resource('barangpengembalian', AdminBarangPengembalianController::class)->names('admin.barangpengembalian');
    Route::get('barang/{id}/tambahstok', [AdminBarangController::class, 'tambahStok'])->name('admin.barang.tambahstok');
    Route::post('barang/{id}/tambahstok', [AdminBarangController::class, 'storeStok'])->name('admin.barang.storestok');
    Route::resource('customer', AdminCustomerController::class)->names('admin.customer');
    Route::resource('pembayaran', AdminPembayaran::class)->names('admin.pembayaran');
    Route::resource('pengiriman', AdminPengiriman::class)->names('admin.pengiriman');
    Route::resource('pengembalian', AdminPengembalian::class)->names('admin.pengembalian');
    Route::resource('penjualan', AdminPenjualanController::class)->names('admin.penjualan');
    Route::post('penjualan/sementara', [AdminPenjualanController::class, 'sementara'])->name('admin.penjualan.sementara');
    Route::delete('penjualan/create/{id}', [AdminPenjualanController::class, 'destroysementara'])->name('admin.penjualan.destroysementara');
    Route::get('penjualan/pdf/{id}', [AdminPenjualanController::class, 'generatePDF'])->name('admin.penjualan.pdf');
    Route::resource('laporanpenjualan', AdminLaporanPenjualanController::class)->names('admin.laporanpenjualan');
    Route::get('laporanpenjualan/pdf', [AdminLaporanPenjualanController::class, 'generatePDF'])->name('admin.laporanpenjualan.pdf');
    Route::resource('laporanpendapatan', AdminLaporanPendapatanController::class)->names('admin.laporanpendapatan');
    Route::get('laporanpendapatan/pdf', [AdminLaporanPendapatanController::class, 'generatePDF'])->name('admin.laporanpendapatan.pdf');
    Route::resource('stokbarang', AdminLaporanStokBarangController::class)->names('admin.stokbarang');
    Route::get('stokbarang/pdf', [AdminLaporanStokBarangController::class, 'generatePDF'])->name('admin.stokbarang.pdf');
});

Route::prefix('kepalacabang')->middleware('auth', 'level:kepalacabang')->group(function () {
    Route::resource('manajemenuser', KepalaCabangManajemenuserController::class)->names('kepalacabang.manajemenuser');
    Route::resource('barang', KepalaCabangBarangController::class)->names('kepalacabang.barang');
    Route::resource('customer', KepalaCabangCustomerController::class)->names('kepalacabang.customer');
    Route::resource('laporanpenjualan', KepalaCabangLaporanPenjualanController::class)->names('kepalacabang.laporanpenjualan');
    Route::get('laporanpenjualan/pdf', [KepalaCabangLaporanPenjualanController::class, 'generatePDF'])->name('kepalacabang.laporanpenjualan.pdf');
    Route::resource('laporanpendapatan', KepalaCabangLaporanPendapatapanController::class)->names('kepalacabang.laporanpendapatan');
    Route::get('laporanpendapatan/pdf', [KepalaCabangLaporanPendapatapanController::class, 'generatePDF'])->name('kepalacabang.laporanpendapatan.pdf');
    Route::resource('stokbarang', KepalaCabangLaporanStokBarangController::class)->names('kepalacabang.stokbarang');
    Route::get('stokbarang/pdf', [KepalaCabangLaporanStokBarangController::class, 'generatePDF'])->name('kepalacabang.stokbarang.pdf');
});

Route::prefix('supervisor')->middleware('auth', 'level:supervisor')->group(function () {
    Route::resource('manajemenuser', SupervisorManajemenuserController::class)->names('supervisor.manajemenuser');
    Route::resource('barang', SupervisorBarangController::class)->names('supervisor.barang');
    Route::resource('customer', SupervisorCustomerController::class)->names('supervisor.customer');
    Route::resource('pembayaran', SupervisorPembayaran::class)->names('supervisor.pembayaran');
    Route::resource('pengiriman', SupervisorPengiriman::class)->names('supervisor.pengiriman');
    Route::resource('pengembalian', SupervisorPengembalian::class)->names('supervisor.pengembalian');
    Route::resource('penjualan', SupervisorPenjualanController::class)->names('supervisor.penjualan');
    Route::get('penjualan/pdf/{id}', [SupervisorPenjualanController::class, 'generatePDF'])->name('supervisor.penjualan.pdf');
    Route::resource('laporanpenjualan', SupervisorLaporanPenjualan::class)->names('supervisor.laporanpenjualan');
    Route::get('laporanpenjualan/pdf', [SupervisorLaporanPenjualan::class, 'generatePDF'])->name('supervisor.laporanpenjualan.pdf');
    Route::resource('laporanpendapatan', SupervisorLaporanPendapatan::class)->names('supervisor.laporanpendapatan');
    Route::get('laporanpendapatan/pdf', [SupervisorLaporanPendapatan::class, 'generatePDF'])->name('supervisor.laporanpendapatan.pdf');
    Route::resource('stokbarang', SupervisorLaporanStokbarang::class)->names('supervisor.stokbarang');
    Route::get('stokbarang/pdf', [SupervisorLaporanStokbarang::class, 'generatePDF'])->name('supervisor.stokbarang.pdf');
});

Route::prefix('sales')->middleware('auth', 'level:sales')->group(function () {
    Route::resource('barang', SalesBarangController::class)->names('sales.barang');
    Route::resource('customer', SalesCustomerController::class)->names('sales.customer');
    Route::resource('pembayaran', SalesPembayaran::class)->names('sales.pembayaran');
    Route::resource('pengiriman', SalesPengiriman::class)->names('sales.pengiriman');
    Route::resource('pengembalian', SalesPengembalian::class)->names('sales.pengembalian');
    Route::resource('penjualan', SalesPenjualanController::class)->names('sales.penjualan');
    Route::post('penjualan/sementara', [SalesPenjualanController::class, 'sementara'])->name('sales.penjualan.sementara');
    Route::delete('penjualan/create/{id}', [SalesPenjualanController::class, 'destroysementara'])->name('sales.penjualan.destroysementara');
    Route::get('penjualan/pdf/{id}', [SalesPenjualanController::class, 'generatePDF'])->name('sales.penjualan.pdf');
    Route::resource('laporanpenjualan', SalesLaporanPenjualanController::class)->names('sales.laporanpenjualan');
    Route::get('laporanpenjualan/pdf', [SalesLaporanPenjualanController::class, 'generatePDF'])->name('sales.laporanpenjualan.pdf');
    Route::resource('laporanpendapatan', SalesLaporanPendapatanController::class)->names('sales.laporanpendapatan');
    Route::get('laporanpendapatan/pdf', [SalesLaporanPendapatanController::class, 'generatePDF'])->name('sales.laporanpendapatan.pdf');
    Route::resource('stokbarang', SalesLaporanStokBarangController::class)->names('sales.stokbarang');
    Route::get('stokbarang/pdf', [SalesLaporanStokBarangController::class, 'generatePDF'])->name('sales.stokbarang.pdf');
});

Route::prefix('kurir')->middleware('auth', 'level:kurir')->group(function () {
    Route::resource('pengiriman', KurirPengiriman::class)->names('kurir.pengiriman');
    Route::resource('pengembalian', KurirPengembalian::class)->names('kurir.pengembalian');
    Route::resource('stokbarang', KurirLaporanStokBarangController::class)->names('kurir.stokbarang');
    Route::get('stokbarang/pdf', [KurirLaporanStokBarangController::class, 'generatePDF'])->name('kurir.stokbarang.pdf');
    Route::resource('laporanpengiriman', KurirLaporanPengirimanController::class)->names('kurir.laporanpengiriman');
    Route::get('laporanpengiriman/pdf', [KurirLaporanPengirimanController::class, 'generatePDF'])->name('kurir.laporanpengiriman.pdf');
});
