<?php

namespace App\Http\Controllers\client;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function home_index()
    {
        // Täze gelen harytlary alýarys (is_new = true bolanlar)
        $products = Product::where('is_new', true)
            ->orderBy('created_at', 'desc')
            ->take(8)
            ->get();

        // Kategoriýalary alýarys (öňde görkezmek üçin)
        $categories = Category::orderBy('name_tm', 'asc')->get();

        // Görnüşe ugradýarys
        return view('client.home.index', compact('products', 'categories'));
    }
    
    public function locale($locale)
    {
        $locale = in_array($locale, ['tm', 'ru']) ? $locale : 'en';
        session()->put('locale', $locale);

        return redirect()->back();
    }
}
