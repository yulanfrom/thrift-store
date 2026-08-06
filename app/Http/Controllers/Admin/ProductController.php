<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Menampilkan semua produk
    public function index()
    {
        $products = Product::latest()->get();

        return view('admin.products.index', compact('products'));
    }

    // Menampilkan form tambah produk
    public function create()
    {
        $categories = Category::all();

        return view('admin.products.create', compact('categories'));
    }

    // Menampilkan detail produk
    public function show($id)
    {
        $product = Product::findOrFail($id);

        return view('admin.products.show', compact('product'));
    }

   // Menyimpan produk baru
public function store(Request $request)
{
    $request->validate([
        'category_id' => 'required',
        'name' => 'required',
        'brand' => 'required',
        'price' => 'required|numeric',
        'stock' => 'required|numeric',
        'size' => 'nullable',
        'condition' => 'required',
        'description' => 'required',
        'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    $imageName = time() . '.' . $request->image->extension();

    $request->image->move(public_path('products'), $imageName);

    Product::create([
        'category_id' => $request->category_id,
        'name' => $request->name,
        'brand' => $request->brand,
        'price' => $request->price,
        'stock' => $request->stock,
        'size' => $request->size,
        'condition' => $request->condition,
        'description' => $request->description,
        'image' => $imageName,
    ]);

    return redirect()->route('admin.products.index')
        ->with('success', 'Produk berhasil ditambahkan.');
}

    // Menampilkan form edit produk
    public function edit($id)
    {
        $product = Product::findOrFail($id);

        $categories = Category::all();

        return view('admin.products.edit', compact('product', 'categories'));
    }

    // Update produk
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $request->validate([
            'category_id' => 'required',
            'name' => 'required',
            'brand' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
            'size' => 'nullable',
            'condition' => 'required',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('image')) {

            if ($product->image && file_exists(public_path('products/' . $product->image))) {
                unlink(public_path('products/' . $product->image));
            }

            $imageName = time() . '.' . $request->image->extension();

            $request->image->move(public_path('products'), $imageName);

            $product->image = $imageName;
        }

        $product->category_id = $request->category_id;
        $product->name = $request->name;
        $product->brand = $request->brand;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->size = $request->size;
        $product->condition = $request->condition;
        $product->description = $request->description;

        $product->save();

        return redirect()->route('admin.products.index')
            ->with('success', 'Produk berhasil diupdate.');
    }

    // Hapus produk
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        if ($product->image && file_exists(public_path('products/' . $product->image))) {
            unlink(public_path('products/' . $product->image));
        }

        $product->delete();

        return redirect()->route('admin.products.index')
            ->with('success', 'Produk berhasil dihapus.');
    }
}