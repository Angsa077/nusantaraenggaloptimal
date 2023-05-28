<?php

use App\Http\Controllers\AdminBarangController;
use App\Http\Controllers\AdminCustomerController;
use App\Http\Controllers\AdminManajemenuserController;
use App\Http\Controllers\AdminPenjualanController;
use App\Http\Controllers\ChangedPasswordController;
use App\Http\Controllers\KepalaCabangBarangController;
use App\Http\Controllers\KepalaCabangCustomerController;
use App\Http\Controllers\KepalaCabangManajemenuserController;
use App\Http\Controllers\ProfiledController;
use App\Http\Controllers\SalesBarangController;
use App\Http\Controllers\SalesCustomerController;
use App\Http\Controllers\SalesPenjualanController;
use App\Http\Controllers\SupervisorBarangController;
use App\Http\Controllers\SupervisorCustomerController;
use App\Http\Controllers\SupervisorManajemenuserController;
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
    Route::resource('admincustomer', AdminCustomerController::class);
    Route::resource('adminpenjualan', AdminPenjualanController::class);
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
});

Route::group(['middleware' => ['auth', 'level:sales']], function(){
    Route::resource('salesbarang', SalesBarangController::class);
    Route::resource('salescustomer', SalesCustomerController::class);
    Route::resource('salespenjualan', SalesPenjualanController::class);
});