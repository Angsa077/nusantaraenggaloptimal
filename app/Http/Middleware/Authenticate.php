<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class Authenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = auth()->user();
    
        if (!$user) {
            return redirect()->route('login');
        }
    
        if ($user->status_akun !== 'aktif') {
            // If the user's account is not active, log them out and redirect to the login page with an error message
            auth()->logout();
            return redirect()->route('login')->withErrors(['Maaf, akun Anda Masih Belum aktif. Silakan hubungi administrator untuk informasi lebih lanjut.']);
        }

        if (Hash::check('NEO2023', $user->password)) {
            return redirect()->route('password.changed');
        }
        return $next($request);
    }
}
