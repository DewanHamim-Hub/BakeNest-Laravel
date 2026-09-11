<?php

namespace App\Http\Controllers;

use App\Models\CustomOrder;
use Illuminate\Http\Request;

class AdminCustomOrderController extends Controller
{
    public function index()
    {
        $customOrders = CustomOrder::with('user')
                        ->latest()
                        ->get();

        return view(
            'admin.custom_orders.index',
            compact('customOrders')
        );
    }

    public function show(CustomOrder $customOrder)
    {
        $customOrder->load('user');
        return view(
            'admin.custom_orders.show',
            compact('customOrder')
        );
    }

    public function quote(Request $request, CustomOrder $customOrder)
    {
        $request->validate([
            'quoted_price'=>'required|numeric|min:1',
        ]);

        $customOrder->update([
            'quoted_price'=>$request->quoted_price,
            'status'=>'quoted',
        ]);

        return redirect()
            ->route(
                'admin.custom-orders.show',
                $customOrder->id
            )
            ->with(
                'success',
                'Quotation sent successfully.'
            );
    }

    public function reject(CustomOrder $customOrder)
    {
        $customOrder->update([
            'status'=>'rejected'
        ]);

        return back()
        ->with(
            'success',
            'Custom order rejected.'
        );
    }

    public function complete(CustomOrder $customOrder)
    {
        $customOrder->update([
            'status'=>'completed'
        ]);

        return back()
        ->with(
            'success',
            'Custom order marked as completed.'
        );
    }
}