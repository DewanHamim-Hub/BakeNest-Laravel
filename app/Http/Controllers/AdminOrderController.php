<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{

    public function index()
    {
        $orders = Order::with([
            'user',
            'items.productVariant.product'
        ])
        ->latest()
        ->get();


        return view('admin.orders.index', compact('orders'));
    }





    public function show(Order $order)
    {

        $order->load([
            'user',
            'items.productVariant.product'
        ]);


        return view('admin.orders.show', compact('order'));

    }






    public function updateStatus(Request $request, Order $order)
    {

        $request->validate([

            'status' => [
                'required',
                'in:pending,confirmed,preparing,completed,cancelled'
            ]

        ]);



        $order->update([

            'status' => $request->status

        ]);



        return redirect()
            ->back()
            ->with('success','Order status updated successfully.');

    }


}