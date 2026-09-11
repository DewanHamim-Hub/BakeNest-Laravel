<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\ProductVariant;
use Illuminate\Http\Request;

class CartController extends Controller
{


    public function index()
    {
        $cart = Cart::where('user_id', auth()->id())
            ->with('items.productVariant.product')
            ->first();


        return view('cart.index', compact('cart'));
    }




    public function add(Request $request, ProductVariant $productVariant)
    {

        $cart = Cart::firstOrCreate([
            'user_id' => auth()->id()
        ]);



        $cartItem = CartItem::where('cart_id', $cart->id)
            ->where('product_variant_id', $productVariant->id)
            ->first();



        if($cartItem)
        {

            $cartItem->increment('quantity');

        }

        else
        {

            CartItem::create([

                'cart_id' => $cart->id,

                'product_variant_id' => $productVariant->id,

                'quantity' => 1

            ]);

        }



        return redirect()
            ->route('cart.index')
            ->with('success','Product added to cart.');

    }





    public function remove(CartItem $cartItem)
    {

        $cartItem->delete();


        return redirect()
            ->route('cart.index');

    }





    public function update(Request $request, CartItem $cartItem)
    {

        $request->validate([

            'quantity'=>'required|integer|min:1'

        ]);



        $cartItem->update([

            'quantity'=>$request->quantity

        ]);



        return redirect()
            ->route('cart.index');

    }


}