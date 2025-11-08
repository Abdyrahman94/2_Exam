<?php

namespace App\Http\Controllers\admin;

use App\Models\Country;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
        // with(['category', 'country']) => her bir product bilen bilelikde degişli kategoriýa we ýurduň adyny hem getirýär.
        // latest() => iň soňky goşulanlary ilkinji görkezýär.
        $products = Product::with(['category', 'country'])->latest()->get();

        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        $countries = Country::all();

        return view('admin.products.create', compact('categories', 'countries'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required','string','max:255'], // ady hökmany
            'price' => ['required','numeric','min:0'], // baha hökmany we 0-dan uly
            'description' => ['nullable','string'], // düşündiriş hökmany däl
            'image' => ['nullable','image','mimes:jpg,jpeg,png','max:2048'], // surat hökmany däl, ýöne JPG/PNG formatda bolmaly
            'category_id' => ['required','exists:categories,id'], // kategoriýa hökmany we bar bolmaly
            'country_id' => ['required','exists:countries,id'], // ýurt hökmany we bar bolmaly
        ]);

        // Surat bar bolsa, public/storage/products içine ýatda saklaýar
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('products', 'public');
        }

        // Product döretmek — goşmaça meýdanlar bilen bilelikde
        Product::create(array_merge($validated, [
            'name_tm' => $request->name, // türkmençe ady (häzirki wagtda birmeňzeş goýulýar)
            'name_ru' => $request->name, // rusça ady (häzirki wagtda birmeňzeş goýulýar)
            'slug' => Str::slug($request->name), // sluga adyndan awtomatiki döredilýär (mysal: "Aloe Vera" → "aloe-vera")
        ]));

        // Baş sahypa ugrat we üstünlik habaryny görkez
        return redirect()->route('admin.products.index')
            ->with('success', 'Product successfully created!');
    }

    public function edit($id)
    {
        // ID boýunça producty tapýar, tapylmasa 404 berýär
        $product = Product::findOrFail($id);

        // Kategoriýalaryň sanawyny harplaryň tertibinde alýar
        $categories = Category::orderBy('name')->get();

        // Ýurtlaryň sanawyny harplaryň tertibinde alýar
        $countries = Country::orderBy('name')->get();

        // Edit sahypasyna product, kategoriýalar, ýurtlar ugradýar
        return view('admin.products.edit', compact('product', 'categories', 'countries'));
    }

    public function update(Request $request, $id)
    {
        // Üýtgediljek producty ID boýunça tapýar
        $product = Product::findOrFail($id);

        $validated = $request->validate([
            'name' => ['required','string','max:255'], // ady hökmany
            'price' => ['required','numeric','min:0'], // baha hökmany we 0-dan uly
            'description' => ['nullable','string'], // düşündiriş hökmany däl
            'image' => ['nullable','image','mimes:jpg,jpeg,png','max:2048'], // surat hökmany däl, ýöne JPG/PNG formatda bolmaly
            'category_id' => ['required','exists:categories,id'], // kategoriýa hökmany we bar bolmaly
            'country_id' => ['required','exists:countries,id'], // ýurt hökmany we bar bolmaly
        ]);

        // Täze surat ýüklenýän bolsa:
        if ($request->hasFile('image')) {
            // Eger öň surat bar bolsa, Storage-dan poz
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
            // Täze suraty ýatda sakla
            $validated['image'] = $request->file('image')->store('products', 'public');
        }

        // Product maglumatlaryny täzeden ýazmak
        $product->update(array_merge($validated, [
            'name_tm' => $request->name, // türkmençe adyny täzeden ýaz
            'name_ru' => $request->name, // rusça adyny täzeden ýaz
            'slug' => Str::slug($request->name), // täze sluga döret
        ]));

        // Baş sahypa ugrat we üstünlik habaryny görkez
        return redirect()->route('admin.products.index')
            ->with('success', 'Product updated successfully!');
    }

    public function destroy($id)
    {
        // ID boýunça producty tapýar
        $product = Product::findOrFail($id);

        // Eger suraty bar bolsa, public/storage-den poz
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }

        // Producty bazadan poz
        $product->delete();

        // Üstünlik habary bilen yzyna ugrat
        return redirect()->route('admin.products.index')
            ->with('success', 'Product deleted successfully!');
    }
}
