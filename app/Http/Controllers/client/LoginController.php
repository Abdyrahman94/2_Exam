<?php

namespace App\Http\Controllers\client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{

    public function create()
    {
        // Bu ýerde diňe forma görkezilýär.
        // resources/views/client/auth/login.blade.php
        return view('client.auth.login');
    }

    public function store(Request $request)
    {
        // Formadan gelen maglumatlary barlaýarys
        $credentials = $request->validate([
            'username' => ['required', 'string', 'min:3'],
            'password' => ['required'],
        ]);

        // Ulanyjyny girişe synanyşdyrýarys
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

           return redirect()->route('products.index')->with([
                'success' => "Ustunlikli giris edildi"
            ]);
        }

        // Login nädogry bolsa, ýene formany görkezýär
       return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ])->onlyInput('username');
    }

    public function destroy(Request $request)
    {
        Auth::guard('web')->logout(); // Sessiony arassalaýar

        $request->session()->invalidate();  // Session pozulýar

        $request->session()->regenerateToken(); // CSRF token täzelenýär

        // Baş sahypa ugradyýar
        return redirect()->route('home.index')
            ->with([
                'success' => 'Ustunlikli cykys edildi',
            ]);
    }

}
