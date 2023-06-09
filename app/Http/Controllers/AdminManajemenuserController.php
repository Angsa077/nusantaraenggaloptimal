<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AdminManajemenuserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = User::orderBy('id')->get();
        return view('admin.manajemenuser.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.manajemenuser.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session::flash('name', $request->name);
        Session::flash('level', $request->level);
        Session::flash('email', $request->email);
        Session::flash('nip', $request->nip);
        Session::flash('nik', $request->nik);
        Session::flash('npwp', $request->npwp);
        Session::flash('no_hp', $request->no_hp);
        Session::flash('alamat', $request->alamat);
        Session::flash('tp_lahir', $request->tp_lahir);
        Session::flash('tg_lahir', $request->tg_lahir);
        Session::flash('jk', $request->jk);
        Session::flash('tgl_masuk', $request->tgl_masuk);
        Session::flash('tgl_keluar', $request->tgl_keluar);

        $request->validate(
            [
                'name' => 'required',
                'level' => 'required',
                'email' => 'required',
                'nip' => 'required|numeric',
                'nik' => 'required|numeric|digits:16',
                'npwp' => 'required|numeric',
                'no_hp' => 'required|numeric',
                'alamat' => 'required',
                'tp_lahir' => 'required',
                'tg_lahir' => 'required',
                'jk' => 'required',
                'tgl_masuk' => 'required',
            ],
            [
                'name.required' => 'Nama Wajib Diisi',
                'level.required' => 'Jabatan Wajib Diisi',
                'email.required' => 'Alamat Email Wajib Diisi',
                'nip.required' => 'NIP Wajib Diisi',
                'nip.numeric' => 'NIP Hanya Bisa Diisi Oleh Angka Saja',
                'nik.required' => 'NIK Wajib Diisi',
                'nik.numeric' => 'NIK Hanya Bisa Diisi Oleh Angka Saja',
                'nik.digits' => 'NIK Harus 16 Digit',
                'npwp.required' => 'NPWP Wajib Diisi',
                'npwp.numeric' => 'NPWP Hanya Bisa Diisi Oleh Angka Saja',
                'no_hp.required' => 'No Handphone Wajib Diisi',
                'no_hp.numeric' => 'No Handphone Hanya Bisa Diisi Oleh Angka Saja',
                'alamat.required' => 'Alamat Tempat Tinggal Wajib Diisi',
                'tp_lahir.required' => 'Tempat Lahir Wajib Diisi',
                'tg_lahir.required' => 'Tanggal Lahir Wajib Diisi',
                'jk.required' => 'Jenis Kelamin Wajib Diisi',
                'tgl_masuk.required' => 'Tanggal Masuk Kerja Wajib Diisi',
            ]
        );

        $data = [
            'name' => $request->name,
            'level' => $request->level,
            'email' => $request->email,
            'password' => Hash::make('NEO2023'),
            'nip' => $request->nip,
            'nik' => $request->nik,
            'npwp' => $request->npwp,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'tp_lahir' => $request->tp_lahir,
            'tg_lahir' => $request->tg_lahir,
            'jk' => $request->jk,
            'tgl_masuk' => $request->tgl_masuk,
            'tgl_keluar' => $request->tgl_keluar,
            'status_akun' => 'nonaktif',
            'id_admin' => Auth::user()->id,
        ];

        User::create($data);
        return redirect()->route('admin.manajemenuser.index')->with('success', 'Berhasil Mengisi Biodata User');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::all();
        $data = User::where('id', $id)->first();
        return view('admin.manajemenuser.show', ['data' => $data, 'user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = User::where('id', $id)->first();
        return view('admin.manajemenuser.edit', ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(
            [
                'name' => 'required',
                'level' => 'required',
                'email' => 'required',
                'nip' => 'required|numeric',
                'nik' => 'required|numeric|digits:16',
                'npwp' => 'required|numeric',
                'no_hp' => 'required|numeric',
                'alamat' => 'required',
                'tp_lahir' => 'required',
                'tg_lahir' => 'required',
                'jk' => 'required',
                'tgl_masuk' => 'required',
            ],
            [
                'name.required' => 'Nama Wajib Diisi',
                'level.required' => 'Jabatan Wajib Diisi',
                'email.required' => 'Alamat Email Wajib Diisi',
                'nip.required' => 'NIP Wajib Diisi',
                'nip.numeric' => 'NIP Hanya Bisa Diisi Oleh Angka Saja',
                'nik.required' => 'NIK Wajib Diisi',
                'nik.numeric' => 'NIK Hanya Bisa Diisi Oleh Angka Saja',
                'nik.digits' => 'NIK Harus 16 Digit',
                'npwp.required' => 'NPWP Wajib Diisi',
                'npwp.numeric' => 'NPWP Hanya Bisa Diisi Oleh Angka Saja',
                'no_hp.required' => 'No Handphone Wajib Diisi',
                'no_hp.numeric' => 'No Handphone Hanya Bisa Diisi Oleh Angka Saja',
                'alamat.required' => 'Alamat Tempat Tinggal Wajib Diisi',
                'tp_lahir.required' => 'Tempat Lahir Wajib Diisi',
                'tg_lahir.required' => 'Tanggal Lahir Wajib Diisi',
                'jk.required' => 'Jenis Kelamin Wajib Diisi',
                'tgl_masuk.required' => 'Tanggal Masuk Kerja Wajib Diisi',
            ]
        );

        if ($request->simpan == 'Submit') {
            $data = [
                'name' => $request->name,
                'level' => $request->level,
                'email' => $request->email,
                'password' => Hash::make('NEO2023'),
                'nip' => $request->nip,
                'nik' => $request->nik,
                'npwp' => $request->npwp,
                'no_hp' => $request->no_hp,
                'alamat' => $request->alamat,
                'tp_lahir' => $request->tp_lahir,
                'tg_lahir' => $request->tg_lahir,
                'jk' => $request->jk,
                'tgl_masuk' => $request->tgl_masuk,
                'tgl_keluar' => $request->tgl_keluar,
                'status_akun' => 'nonaktif',
                'id_admin' => Auth::user()->id,
            ];
        } elseif ($request->simpan == 'Hapus') {
            $data['status_akun'] = 'hapus';
        }

        User::where('id', $id)->update($data);
        return redirect()->route('admin.manajemenuser.index')->with('success', 'Berhasil Memperbarui Data User');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::where('id', $id)->delete();
        return redirect()->route('admin.manajemenuser.index')->with('error', 'Berhasil Menghapus Biodata User');
    }
}
