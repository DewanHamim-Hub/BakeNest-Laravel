<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')
            ->where('is_available', true)
            ->get();

        $categories = Category::all();

        return view('products.index', compact('products', 'categories'));
    }


    public function show(Product $product)
    {
        $product->load('productVariants');

        return view('products.show', compact('product'));
    }
}