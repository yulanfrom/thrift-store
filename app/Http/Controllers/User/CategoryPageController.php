<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;

class CategoryPageController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('user.categories', compact('categories'));
    }

    public function show($id)
    {
        $category = Category::findOrFail($id);

        $products = Product::where('category_id', $id)->latest()->get();

        return view('user.products', compact('products','category'));
    }
}