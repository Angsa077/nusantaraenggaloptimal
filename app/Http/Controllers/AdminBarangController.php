<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class AdminBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Barang::orderBy('kd_barang')->get();
        return view('admin.barang.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.barang.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session::flash('kd_barang', $request->kd_barang);
        Session::flash('nama', $request->nama);
        Session::flash('merek', $request->merek);
        Session::flash('harga_beli', $request->harga_beli);
        Session::flash('harga_jual', $request->harga_jual);
        Session::flash('jumlah', $request->jumlah);
        Session::flash('expired', $request->expired);
        Session::flash('catatan', $request->catatan);

        $request->validate(
            [
                'kd_barang' => 'required',
                'nama' => 'required',
                'merek' => 'required',
                'harga_beli' => 'required',
                'harga_jual' => 'required',
                'jumlah' => 'required|min:1',
                'expired' => 'required',
                'gambar' => 'mimes:jpeg,jpg,png,gif|max:1024',
            ],
            [
                'kd_barang.required' => 'Kode Barang Wajib Diisi',
                'nama.required' => 'Nama Barang Wajib Diisi',
                'merek.required' => 'Merek Barang Wajib Diisi',
                'harga_beli.required' => 'Harga Beli Barang Wajib Diisi',
                'harga_jual.required' => 'Harga Jual Barang Wajib Diisi',
                'jumlah.required' => 'Jumlah Barang Wajib Diisi',
                'jumlah.min' => 'Jumlah Barang Minimal Satu',
                'expired.required' => 'Expired Barang Wajib Diisi',
                'gambar.mimes' => 'Gambar Barang Yang Diperbolehkan Hanya Berektensi JPEG, JPG, PNG, GIF',
                'gambar.max' => 'Gambar Barang Yang Diperbolehkan Maksimal 1MB',
            ]
        );

        if ($request->hasFile('gambar')) {
            $foto_file = $request->file('gambar');
            if ($foto_file != null) {
                $foto_ekstensi = $foto_file->extension();
                $foto_nama = date('ymdhis') . "." . $foto_ekstensi;
                $foto_file->move(public_path('gambar_barang'), $foto_nama);
            } else {
                $foto_nama = null;
            }
        }

        $numericHargaJual = (int) str_replace('.', '', $request->harga_jual);
        $numericHargaBeli = (int) str_replace('.', '', $request->harga_beli);

        $data = [
            'kd_barang' => $request->kd_barang,
            'nama' => $request->nama,
            'merek' => $request->merek,
            'harga_beli' => $numericHargaBeli,
            'harga_jual' => $numericHargaJual, 
            'jumlah' => $request->jumlah,
            'expired' => $request->expired,
            'status_barang' => 'proses',
            'catatan' => $request->catatan,
            'id_staf' => Auth::user()->id,
            'gambar' => $foto_nama,
        ];

        Barang::create($data);
        return redirect()->route('admin.barang.index')->with('success', 'Berhasil Mengisi Data Barang');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $spv = User::all();
        $user = User::all();
        $barang = Barang::all();
        $data = Barang::where('kd_barang', $id)->first();
        return view('admin.barang.show', ['data' => $data, 'barang' => $barang, 'user' => $user, 'spv' => $spv]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Barang::where('id_barang', $id)->first();
        return view('admin.barang.edit', ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(
            [
                'kd_barang' => 'required',
                'nama' => 'required',
                'merek' => 'required',
                'harga_beli' => 'required',
                'harga_jual' => 'required',
                'jumlah' => 'required|min:1',
                'expired' => 'required',
                'gambar' => 'mimes:jpeg,jpg,png,gif|max:1024',
            ],
            [
                'kd_barang.required' => 'Kode Barang Wajib Diisi',
                'nama.required' => 'Nama Barang Wajib Diisi',
                'merek.required' => 'Merek Barang Wajib Diisi',
                'harga_beli.required' => 'Harga Beli Barang Wajib Diisi',
                'harga_jual.required' => 'Harga Jual Barang Wajib Diisi',
                'jumlah.required' => 'Jumlah Barang Wajib Diisi',
                'jumlah.min' => 'Jumlah Barang Minimal Satu',
                'expired.required' => 'Expired Barang Wajib Diisi',
                'gambar.mimes' => 'Gambar Barang Yang Diperbolehkan Hanya Berektensi JPEG, JPG, PNG, GIF',
                'gambar.max' => 'Gambar Barang Yang Diperbolehkan Maksimal 1MB',
            ]
        );

        if ($request->hasFile('gambar')) {
            $foto_file = $request->file('gambar');
            if ($foto_file != null) {
                $foto_ekstensi = $foto_file->extension();
                $foto_nama = date('ymdhis') . "." . $foto_ekstensi;
                $foto_file->move(public_path('gambar_barang'), $foto_nama);

                $data = Barang::where('id_barang', $id)->first();
                File::delete(public_path('gambar_barang') . '/' . $data->gambar);
            } else {
                $foto_nama = null;
            }

            $data = [
                'gambar' => $foto_nama,
            ];
        }

        $data = [
            'kd_barang' => $request->kd_barang,
            'nama' => $request->nama,
            'merek' => $request->merek,
            'harga_beli' => $request->harga_beli,
            'harga_jual' => $request->harga_jual,
            'jumlah' => $request->jumlah,
            'expired' => $request->expired,
            'status_barang' => 'proses',
            'catatan' => $request->catatan,
            'id_staf' => Auth::user()->id,
        ];

        if ($request->simpan == 'Hapus') {
            $data['status_barang'] = 'hapus';
        }

        Barang::where('id_barang', $id)->update($data);
        return redirect()->route('admin.barang.index')->with('success', 'Berhasil memperbarui Data barang');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Barang::where('id_barang', $id)->first();
        File::delete(public_path('gambar_barang') . '/' . $data->gambar);

        Barang::where('id_barang', $id)->delete();
        return redirect()->route('admin.barang.index')->with('error', 'Berhasil Menghapus Data Barang');
    }

    public function tambahStok(string $id)
    {
        $data = Barang::where('kd_barang', $id)->firstOrFail();
        return view('admin.barang.tambahstok', compact('data'));
    }

    public function storeStok(Request $request, string $id)
    {
        Session::flash('harga_beli', $request->harga_beli);
        Session::flash('harga_jual', $request->harga_jual);
        Session::flash('jumlah', $request->jumlah);
        Session::flash('expired', $request->expired);
        Session::flash('catatan', $request->catatan);

        $request->validate(
            [
                'harga_beli' => 'required',
                'harga_jual' => 'required',
                'jumlah' => 'required|min:1',
                'expired' => 'required',
                'gambar' => 'mimes:jpeg,jpg,png,gif|max:1024',
            ],
            [
                'harga_beli.required' => 'Harga Beli Barang Wajib Diisi',
                'harga_jual.required' => 'Harga Jual Barang Wajib Diisi',
                'jumlah.required' => 'Jumlah Barang Wajib Diisi',
                'jumlah.min' => 'Jumlah Barang Minimal Satu',
                'expired.required' => 'Expired Barang Wajib Diisi',
                'gambar.mimes' => 'Gambar Barang Yang Diperbolehkan Hanya Berektensi JPEG, JPG, PNG, GIF',
                'gambar.max' => 'Gambar Barang Yang Diperbolehkan Maksimal 1MB',
            ]
        );

        $barang = Barang::where('kd_barang', $id)->firstOrFail();

        if ($request->hasFile('gambar')) {
            $foto_file = $request->file('gambar');
            if ($foto_file != null) {
                $foto_ekstensi = $foto_file->extension();
                $foto_nama = date('ymdhis') . "." . $foto_ekstensi;
                $foto_file->move(public_path('gambar_barang'), $foto_nama);
            } else {
                $foto_nama = null;
            }
        }

        $data = [
            'kd_barang' => $barang->kd_barang,
            'nama' => $barang->nama,
            'merek' => $barang->merek,
            'harga_beli' => $request->harga_beli,
            'harga_jual' => $request->harga_jual,
            'jumlah' => $request->jumlah,
            'expired' => $request->expired,
            'status_barang' => 'tambah',
            'catatan' => $request->catatan,
            'id_staf' => Auth::user()->id,
            'gambar' => $foto_nama
        ];

        Barang::create($data);
        return redirect()->route('admin.barang.index')->with('success', 'Berhasil memperbarui Data barang');
    }
}
