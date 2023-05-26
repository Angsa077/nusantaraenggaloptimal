<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class ChangedPasswordController extends Controller
{
    public function showChangedPasswordForm()
    {
        return view('auth.changed-password');
    }

    public function changedPassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = Auth::user();
        $hashedPassword = $user->password;

        if (Hash::check($request->current_password, $hashedPassword)) {
            DB::table('users')
                ->where('id', $user->id)
                ->update(['password' => Hash::make($request->password)]);

            return redirect()->back()->with('success', 'Password updated successfully!');
        } else {
            return redirect()->back()->withErrors(['current_password' => 'Incorrect current password.']);
        }
    }
}
