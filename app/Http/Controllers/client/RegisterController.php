<?php

namespace App\Http\Controllers\client;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function create()
    {
        return view('client.auth.register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'alpha', "min:3", "max:25"],
            'username' => ['required', 'string', "alpha_num", "min:3", "max:25", Rule::unique('users')],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'string', "min:8", "confirmed"],
        ]);

        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        $request->session()->regenerate();

        return to_route('products.index')->with([
            'success' => "Siz üstünlikli hasaba alyndyňyz"
        ]);
    }
}
