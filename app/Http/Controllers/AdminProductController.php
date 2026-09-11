<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\ProductVariant;
use Illuminate\Http\Request;

class AdminProductController extends Controller
{


    public function index()
    {

        $products = Product::with([
            'category',
            'productVariants'
        ])
        ->latest()
        ->get();


        return view('admin.products.index', compact('products'));

    }

    public function create()
    {

        $categories = Category::all();


        return view('admin.products.create', compact('categories'));

    }


    public function store(Request $request)
    {

        $request->validate([

            'category_id'=>'required',
            'name'=>'required',
            'description'=>'required',
            'image'=>'nullable'

        ]);



        $product = Product::create([

            'category_id'=>$request->category_id,

            'name'=>$request->name,

            'description'=>$request->description,

            'image'=>$request->image

        ]);




        foreach($request->variants as $variant)
        {

            if(
                !empty($variant['size_or_weight']) &&
                !empty($variant['price']) &&
                !empty($variant['stock_quantity'])
            )
            {

                ProductVariant::create([

                    'product_id'=>$product->id,

                    'size_or_weight'=>$variant['size_or_weight'],

                    'price'=>$variant['price'],

                    'stock_quantity'=>$variant['stock_quantity'],

                    'is_available'=>true

                ]);

            }

        }



        return redirect()
            ->route('admin.products.index')
            ->with('success','Product created successfully.');

    }


    public function show(Product $product)
    {
        $product->load([
            'category',
            'productVariants'
        ]);

        return view('admin.products.show', compact('product'));
    }


    public function edit(Product $product)
    {

        $categories = Category::all();


        $product->load('productVariants');


        return view('admin.products.edit',
        compact(
            'product',
            'categories'
        ));

    }


    public function update(Request $request, Product $product)
    {

        $request->validate([

            'category_id' => 'required',
            'name' => 'required',
            'description' => 'required',

        ]);


        $product->update([

            'category_id' => $request->category_id,

            'name' => $request->name,

            'description' => $request->description,

            'image' => $request->image,

        ]);



        foreach($request->variants as $variant)
        {

            if(
                isset($variant['id']) &&
                $variant['id'] != null
            )
            {

                // Update existing variant

                ProductVariant::where('id',$variant['id'])
                    ->update([

                        'size_or_weight'=>$variant['size_or_weight'],

                        'price'=>$variant['price'],

                        'stock_quantity'=>$variant['stock_quantity'],

                        'is_available'=>true

                    ]);

            }

            else if(
                !empty($variant['size_or_weight'])
            )
            {

                // Create new variant

                ProductVariant::create([

                    'product_id'=>$product->id,

                    'size_or_weight'=>$variant['size_or_weight'],

                    'price'=>$variant['price'],

                    'stock_quantity'=>$variant['stock_quantity'],

                    'is_available'=>true

                ]);

            }

        }

        return redirect()
            ->route('admin.products.index')
            ->with('success','Product updated successfully.');

    }


    public function destroy(Product $product)
    {

        $product->delete();


        return redirect()
            ->route('admin.products.index')
            ->with('success','Product deleted successfully.');

    }


}