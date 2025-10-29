<?php

namespace App\Http\Controllers\client;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    //  public function index()
    // {
    //     // Kategoriýalary ady boýunça A→Z tertipde alýarys
    //     $categories = Category::orderBy('name_tm', 'asc')->get();

    //     // Görnüşe (view) ugradyarys
    //     // compact('categories') — bu ýerde "['categories' => $categories]" diýen manyda
    //     return view('client.categories.index', compact('categories'));
    // }

    // public function show($slug)
    // {
    //     // Slug boýunça kategoriýany tapýarys
    //     $category = Category::where('slug', $slug)->firstOrFail();

    //     // Şol kategoriýanyň degişli harytlaryny alýarys
    //     $products = Product::where('category_id', $category->id)
    //         ->orderBy('created_at', 'desc') // Täze harytlar öňde
    //         ->get();

    //     // Görnüşe ugradyarys
    //     return view('client.categories.show', compact('category', 'products'));
    // }


}
