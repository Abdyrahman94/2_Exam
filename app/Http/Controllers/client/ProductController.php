<?php

namespace App\Http\Controllers\client;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function index(Request $request)
    {

        // 🔹 Ulanyjynyň girizen maglumatlaryny barla
        $request->validate([
            'drink' => ['nullable', 'integer', 'min:1'],
            'sweet' => ['nullable', 'integer', 'min:1'],
            'snack' => ['nullable', 'integer', 'min:1'],
            'fruit' => ['nullable', 'integer', 'min:1'],
            'q' => ['nullable', 'string', 'max:255'],
        ]);

        // 🔹 Ulanyjynyň saýlan filtrleriniň bahalary
        $f_drink = $request->drink ? $request->drink : 0;
        $f_sweet = $request->sweet ? $request->sweet : 0;
        $f_snack = $request->snack ? $request->snack : 0;
        $f_fruit = $request->fruit ? $request->fruit : 0;
        $f_q = $request->q ?? '';

        // 🔹 Harytlary sorag arkaly alýarys
        $products = Product::query()
            ->when($f_q, function ($query) use ($f_q) {
                $query->where('name_tm', 'like', "%{$f_q}%")
                ->orWhere('name', 'like', "%{$f_q}%");
            })
            ->when($f_drink, function ($query) use ($f_drink) {
                return $query->where('id', $f_drink);
            })
            ->when($f_sweet, function ($query) use ($f_sweet) {
                return $query->orWhere('id', $f_sweet);
            })
            ->when($f_snack, function ($query) use ($f_snack) {
                return $query->orWhere('id', $f_snack);
            })
            ->when($f_fruit, function ($query) use ($f_fruit) {
                return $query->orWhere('id', $f_fruit);
            })
            ->orderBy('created_at', 'desc')
            ->paginate(12)
            ->withQueryString();


        // 🔹 Ähli kategoriýalar (dropdown üçin)
        $categories = Category::with('products')->get();

        // 🔹 Görnüşe ugradyarys
        return view('client.products.index')->with([
            'products' => $products,
            'categories' => $categories,
            'f_drink' => $f_drink,
            'f_sweet' => $f_sweet,
            'f_snack' => $f_snack,
            'f_fruit' => $f_fruit,
            'f_q' => $f_q,
        ]);

    }

    public function show($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();

        return view('client.products.show')->with([
            'product' => $product,
        ]);
    }
}
