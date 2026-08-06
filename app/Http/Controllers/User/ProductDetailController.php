<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;

class ProductDetailController extends Controller
{
    public function index($id)
    {
        $product = Product::findOrFail($id);

        return view('user.product-detail', compact('product'));
    }
}