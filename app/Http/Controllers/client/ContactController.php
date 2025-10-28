<?php

namespace App\Http\Controllers\client;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
     public function index()
    {
        return view('client.contact.index');
    }

     public function store(Request $request)
    {
        // 1️⃣ Ulanyjynyň girizen maglumatlaryny barlaýarys
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email'],
            'message' => ['required', 'string', 'min:10'],
        ]);

        // 2️⃣ Eger model bar bolsa — maglumatlary database-e ýazmak
        Contact::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'message' => $validated['message'],
        ]);

        // 3️⃣ Netijede ulanyjyny yzyna ugradýarys we üstünlik habaryny berýäris
        return to_route('contact.index')->with([
            'success' => 'Hatyňyz üstünlikli ugradyldy! ✉️',
        ]);
    }
}
