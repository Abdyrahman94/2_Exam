<?php

namespace App\Http\Controllers\Client;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []); // session-dan sebet maglumatlaryny al
        return view('client.cart.index', compact('cart'));
    }

    public function add(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                'name' => $product->name_tm,
                'price' => $product->price,
                'image' => $product->image,
                'quantity' => 1,
            ];
        }

        session()->put('cart', $cart);

        // AJAX arkaly jogap
        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'count' => count($cart),
            ]);
        }

        return redirect()->back()->with('success', 'Haryt sebede goşuldy 🛒');
    }
    public function remove($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            if ($cart[$id]['quantity'] > 1) {
                $cart[$id]['quantity']--; // diňe 1 sanysyny azalt
            } else {
                unset($cart[$id]); // soňky bolsa poz
            }
            session()->put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Haryt sebetden aýryldy.');
    }

    public function clear()
    {
        session()->forget('cart');
        return redirect()->back()->with('success', 'Sebet boşadylan boldy.');
    }
}
