<?php

use App\Http\Controllers\AdminBarangController;
use App\Http\Controllers\AdminCustomerController;
use App\Http\Controllers\AdminManajemenuserController;
use App\Http\Controllers\AdminPembayaran;
use App\Http\Controllers\AdminPengembalian;
use App\Http\Controllers\AdminPengiriman;
use App\Http\Controllers\AdminPenjualanController;
use App\Http\Controllers\ChangedPasswordController;
use App\Http\Controllers\KepalaCabangBarangController;
use App\Http\Controllers\KepalaCabangCustomerController;
use App\Http\Controllers\KepalaCabangManajemenuserController;
use App\Http\Controllers\KurirPengembalian;
use App\Http\Controllers\KurirPengiriman;
use App\Http\Controllers\ProfiledController;
use App\Http\Controllers\SalesBarangController;
use App\Http\Controllers\SalesCustomerController;
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

Route::group(['middleware' => ['auth']], function(){
    Route::get('/', function (){ return view('dashboard'); });
    Route::get('dashboard', function (){ return view('dashboard'); })->name('dashboard');

    Route::get('/change-profile', [ProfiledController::class, 'showProfile'])->name('profile.changed');
    Route::put('/change-profile', [ProfiledController::class, 'changeprofile'])->name('profile.updated');
    Route::post('/getkabupaten', [AdminCustomerController::class, 'getkabupaten'])->name(('getkabupaten'));
    Route::post('/getkecamatan', [AdminCustomerController::class, 'getkecamatan'])->name(('getkecamatan'));
    Route::post('/getdesa', [AdminCustomerController::class, 'getdesa'])->name(('getdesa'));
});

Route::group(['middleware' => ['auth', 'level:admin']], function(){
    Route::resource('adminmanajemenuser', AdminManajemenuserController::class);
    Route::resource('adminbarang', AdminBarangController::class);
    Route::get('/adminbarang/{id}/tambahstok', [AdminBarangController::class, 'tambahStok'])->name('adminbarang.tambahstok');
    Route::post('/adminbarang/{id}/tambahstok', [AdminBarangController::class,'storeStok'])->name('adminbarang.storestok');
    Route::resource('admincustomer', AdminCustomerController::class);
    Route::resource('adminpembayaran', AdminPembayaran::class);
    Route::resource('adminpengiriman', AdminPengiriman::class);
    Route::resource('adminpengembalian', AdminPengembalian::class);

    Route::resource('adminpenjualan', AdminPenjualanController::class);
    Route::post('adminpenjualan/sementara', [AdminPenjualanController::class,'sementara'])->name('adminpenjualan.sementara');
    Route::delete('adminpenjualan/create/{id}', [AdminPenjualanController::class, 'destroysementara'])->name('adminpenjualan.destroysementara');
    Route::get('adminpenjualan/pdf/{id}', [AdminPenjualanController::class,'generatePDF'])->name('adminpenjualan.pdf');
});

Route::group(['middleware' => ['auth', 'level:kepalacabang']], function(){
    Route::resource('kepalacabangmanajemenuser', KepalaCabangManajemenuserController::class);
    Route::resource('kepalacabangbarang', KepalaCabangBarangController::class);
    Route::resource('kepalacabangcustomer', KepalaCabangCustomerController::class);
});

Route::group(['middleware' => ['auth', 'level:supervisor']], function(){
    Route::resource('supervisormanajemenuser', SupervisorManajemenuserController::class);
    Route::resource('supervisorbarang', SupervisorBarangController::class);
    Route::resource('supervisorcustomer', SupervisorCustomerController::class);
    Route::resource('supervisorpembayaran', SupervisorPembayaran::class);
    Route::resource('supervisorpengiriman', SupervisorPengiriman::class);
    Route::resource('supervisorpengembalian', SupervisorPengembalian::class);

    Route::resource('supervisorpenjualan', SupervisorPenjualanController::class);
    Route::get('supervisorpenjualan/pdf/{id}', [SupervisorPenjualanController::class,'generatePDF'])->name('supervisorpenjualan.pdf');

    Route::resource('supervisorlaporanpenjualan', SupervisorLaporanPenjualan::class);
    Route::get('supervisorlaporanpenjualan/pdf', [SupervisorLaporanPenjualan::class,'generatePDF'])->name('supervisorlaporanpenjualan.pdf');

    Route::resource('supervisorlaporanpendapatan', SupervisorLaporanPendapatan::class);
    Route::get('supervisorlaporanpendapatan/pdf', [SupervisorLaporanPendapatan::class,'generatePDF'])->name('supervisorlaporanpendapatan.pdf');

    Route::resource('supervisorstokbarang', SupervisorLaporanStokbarang::class);
    Route::get('supervisorstokbarang/pdf', [SupervisorLaporanStokbarang::class,'generatePDF'])->name('supervisorstokbarang.pdf');
});

Route::group(['middleware' => ['auth', 'level:sales']], function(){
    Route::resource('salesbarang', SalesBarangController::class);
    Route::resource('salescustomer', SalesCustomerController::class);
    Route::resource('salespembayaran', SalesPembayaran::class);
    Route::resource('salespengiriman', SalesPengiriman::class);
    Route::resource('salespengembalian', SalesPengembalian::class);

    Route::resource('salespenjualan', SalesPenjualanController::class);
    Route::post('salespenjualan/sementara', [SalesPenjualanController::class,'sementara'])->name('salespenjualan.sementara');
    Route::delete('salespenjualan/create/{id}', [SalesPenjualanController::class, 'destroysementara'])->name('salespenjualan.destroysementara');
    Route::get('salespenjualan/pdf/{id}', [SalesPenjualanController::class,'generatePDF'])->name('salespenjualan.pdf');
});

Route::group(['middleware' => ['auth', 'level:kurir']], function(){
    Route::resource('kurirpengiriman', KurirPengiriman::class);
    Route::resource('kurirpengembalian', KurirPengembalian::class);
});