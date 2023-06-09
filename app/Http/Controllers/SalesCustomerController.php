<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use App\Models\Province;
use App\Models\Regency;
use App\Models\District;
use App\Models\Village;

class SalesCustomerController extends Controller
{
    public function index()
    {
        $data = Customer::orderBy('kd_customer')->get();
        return view('sales.customer.index', ['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $provinces = Province::all();
        return view('sales.customer.create', compact('provinces'));
    }

    public function getkabupaten(Request $request){
        $id_provinsi = $request->id_provinsi;
        $kabupatens = Regency::where('province_id', $id_provinsi)->get();

        $option = "<option>Pilih Kota / kabupaten Anda</option>";
        foreach ($kabupatens as $kabupaten){
            $option .= "<option value='$kabupaten->id'>$kabupaten->name</option>";
        }
        echo $option;
    }

    public function getkecamatan(Request $request){
        $id_kabupaten = $request->id_kabupaten;
        $kecamatans = District::where('regency_id', $id_kabupaten)->get();

        $option = "<option>Pilih Kecamatan Anda</option>";
        foreach ($kecamatans as $kecamatan){
            $option .= "<option value='$kecamatan->id'>$kecamatan->name</option>";
        }
        echo $option;
    }

    public function getdesa(Request $request){
        $id_kecamatan = $request->id_kecamatan;
        $desas = Village::where('district_id', $id_kecamatan)->get();

        $option = "<option>Pilih Kelurahan / Desa Anda</option>";
        foreach ($desas as $desa){
            $option .= "<option value='$desa->id'>$desa->name</option>";
        }
        echo $option;
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Session::flash('kd_customer', $request->kd_customer);
        Session::flash('nama_toko', $request->nama_toko);
        Session::flash('nama_pemilik', $request->nama_pemilik);
        Session::flash('no_hp', $request->no_hp);
        Session::flash('alamat', $request->alamat);
        Session::flash('catatan', $request->catatan);

        $request->validate(
            [
                // 'kd_customer' => 'required',
                'nama_toko' => 'required',
                'nama_pemilik' => 'required',
                'no_hp' => 'required',
                'alamat' => 'required',
                'provinsi' => 'required',
                'kabupaten' => 'required',
                'kecamatan' => 'required',
                'desa' => 'required',
                'gambar' => 'mimes:jpeg,jpg,png,gif|max:1024',
            ],
            [
                // 'kd_customer.required' => 'Kode Customer Wajib Diisi',
                'nama_toko.required' => 'Nama Toko Wajib Diisi',
                'nama_pemilik.required' => 'Nama Pemilik Wajib Diisi',
                'no_hp.required' => 'No HP Customer Wajib Diisi',
                'alamat.required' => 'Alamat Customer Wajib Diisi',
                'provinsi.required' => 'Provinsi Customer Wajib Diisi',
                'kabupaten.required' => 'Kota / Kabupaten Customer Wajib Diisi',
                'kecamatan.required' => 'Kecamatan Customer Wajib Diisi',
                'desa.required' => 'Kelurahan / Desa Customer Wajib Diisi',
                'gambar.mimes' => 'Gambar Customer Yang Diperbolehkan Hanya Berektensi JPEG, JPG, PNG, GIF',
                'gambar.max' => 'Gambar Customer Yang Diperbolehkan Maksimal 1MB',
            ]
            );

            if ($request->hasFile('gambar')) {
                $foto_file = $request->file('gambar');
            if ($foto_file != null) {
                $foto_ekstensi = $foto_file->extension();
                $foto_nama = date('ymdhis') . "." . $foto_ekstensi;
                $foto_file->move(public_path('gambar_customer'), $foto_nama);

            } else {
                $foto_nama = null;
            }
        }

            $data = [
                // 'kd_customer' => $request->kd_customer,
                'nama_toko' => $request->nama_toko,
                'nama_pemilik' => $request->nama_pemilik,
                'no_hp' => $request->no_hp,
                'alamat' => $request->alamat,
                'provinsi' => $request->provinsi,
                'kabupaten' => $request->kabupaten,
                'kecamatan' => $request->kecamatan,
                'desa' => $request->desa,
                'catatan' => $request->catatan,
                'id_staf' => Auth::user()->id,
                'gambar' => $foto_nama,
            ];

        Customer::create($data);
        return redirect()->route('sales.customer.index')->with('success','Berhasil Mengisi Data Customer');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $provinces = Province::all();
        $districs =District::all();
        $regencys = Regency::all();
        $villages = Village::all();
        $user = User::all();
        $data = Customer::where('kd_customer', $id)->first();
        return view('sales.customer.show', ['data'=>$data, 'user' => $user, 'provinces' => $provinces, 'districs' => $districs, 'regencys' => $regencys, 'villages' => $villages]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $provinces = Province::all();
        $districs =District::all();
        $regencys = Regency::all();
        $villages = Village::all();
        $data = Customer::where('kd_customer', $id)->first();
        return view('sales.customer.edit', ['data'=>$data, 'provinces' => $provinces, 'districs' => $districs, 'regencys' => $regencys, 'villages' => $villages]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(
            [
                // 'kd_customer' => 'required',
                'nama_toko' => 'required',
                'nama_pemilik' => 'required',
                'no_hp' => 'required',
                'alamat' => 'required',
                'gambar' => 'mimes:jpeg,jpg,png,gif|max:1024',
            ],
            [
                // 'kd_customer.required' => 'Kode Customer Wajib Diisi',
                'nama_toko.required' => 'Nama Toko Wajib Diisi',
                'nama_pemilik.required' => 'Nama Pemilik Wajib Diisi',
                'no_hp.required' => 'No HP Customer Wajib Diisi',
                'alamat.required' => 'Alamat Customer Wajib Diisi',
                'gambar.mimes' => 'Gambar Customer Yang Diperbolehkan Hanya Berektensi JPEG, JPG, PNG, GIF',
                'gambar.max' => 'Gambar Customer Yang Diperbolehkan Maksimal 1MB',
            ]
            );

            if ($request->hasFile('gambar')) {
                $foto_file = $request->file('gambar');
            if ($foto_file != null) {
                $foto_ekstensi = $foto_file->extension();
                $foto_nama = date('ymdhis') . "." . $foto_ekstensi;
                $foto_file->move(public_path('gambar_customer'), $foto_nama);

                $data = Customer::where('kd_customer', $id)->first();
                File::delete(public_path('gambar_customer') . '/' . $data->gambar);
            } else {
                $foto_nama = null;
            }

            $data = [ 
                'gambar' => $foto_nama,
            ];
        }

            $data = [
                // 'kd_customer' => $request->kd_customer,
                'nama_toko' => $request->nama_toko,
                'nama_pemilik' => $request->nama_pemilik,
                'no_hp' => $request->no_hp,
                'alamat' => $request->alamat,
                'catatan' => $request->catatan,
                'id_staf' => Auth::user()->id,
            ];

            Customer::where('kd_customer', $id)->update($data);
            return redirect()->route('sales.customer.index')->with('success','Berhasil memperbarui Data Customer');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Customer::where('kd_customer', $id)->first();
        File::delete(public_path('gambar_customer') . '/' . $data->gambar);

        Customer::where('kd_customer', $id)->delete();
        return redirect()->route('sales.customer.index')->with('error', 'Berhasil Menghapus Data Customer');
    }
}
