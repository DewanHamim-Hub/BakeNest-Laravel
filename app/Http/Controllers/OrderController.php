<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class OrderController extends Controller
{

    public function index()
    {
        $orders = Order::where('user_id', auth()->id())
            ->with('items.productVariant.product')
            ->latest()
            ->get();
        return view('orders.index', compact('orders'));
    }

    public function store(Request $request)
    {
        $cart = Cart::where('user_id', auth()->id())
            ->with('items.productVariant')
            ->first();

        if(!$cart || $cart->items->count() == 0)
        {
            return redirect()
                ->route('cart.index');
        }

        $totalAmount = 0;
        foreach($cart->items as $item)
        {
            $totalAmount += 
                $item->productVariant->price * $item->quantity;
        }

        $order = Order::create([
            'user_id' => auth()->id(),
            'order_number' => 'BN-' . strtoupper(Str::random(8)),
            'total_amount' => $totalAmount,
            'status' => 'pending',
            'delivery_type' => $request->delivery_type,
            'delivery_address' => $request->delivery_address,
            'payment_status' => 'pending'
        ]);

        foreach($cart->items as $item)
        {
            $price = $item->productVariant->price;
            OrderItem::create([
                'order_id' => $order->id,
                'product_variant_id' => 
                    $item->product_variant_id,
                'quantity' => $item->quantity,
                'price' => $price,
                'subtotal' => $price * $item->quantity
            ]);
        }

        $cart->items()->delete();
        return redirect()
        ->route('payment.create',[
            'type'=>'order',
            'id'=>$order->id
        ]);
    }
}