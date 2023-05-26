<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\File;

class ProfiledController extends Controller
{
    public function showProfile()
    {
        $user = Auth::user();
        return view('profile.show-profile', compact('user'));
    }

    public function changeprofile(Request $request)
    {
        $user = Auth::user();

        $validatedData = $request->validate([
            'profile_photo_path' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'no_hp' => 'required|string|max:20',
            'password' => 'required|string|min:8',
        ]);
    
        // Verifikasi password yang dimasukkan dengan password di database
        if (!Hash::check($request->password, $user->password)) {
            return back()->withErrors(['password' => 'Password yang dimasukkan salah.']);
        }
    
        // Update data profil
        $user->email = $validatedData['email'];
        $user->no_hp = $validatedData['no_hp'];
    
        if ($request->hasFile('profile_photo_path')) {
            // Mengupload foto profil baru
            $image = $request->file('profile_photo_path');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/profile_photos', $filename);
            $user->profile_photo_path = 'profile_photos/' . $filename;
        }
    
        $user->update();

        return redirect()->route('profile.changed')->with('success', 'Profil berhasil diperbarui');
    }
}
