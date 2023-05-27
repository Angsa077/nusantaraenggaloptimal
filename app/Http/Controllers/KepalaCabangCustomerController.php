<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\District;
use App\Models\Province;
use App\Models\Regency;
use App\Models\User;
use App\Models\Village;
use Illuminate\Http\Request;

class KepalaCabangCustomerController extends Controller
{
    public function index()
    {
        $data = Customer::orderBy('kd_customer')->get();
        return view('kepalacabang.customer.index', ['data'=>$data]);
    }

    public function show(string $id)
    {
        $provinces = Province::all();
        $districs =District::all();
        $regencys = Regency::all();
        $villages = Village::all();
        $user = User::all();
        $data = Customer::where('kd_customer', $id)->first();
        return view('kepalacabang.customer.show', ['data'=>$data, 'user' => $user, 'provinces' => $provinces, 'districs' => $districs, 'regencys' => $regencys, 'villages' => $villages]);
    }
}
