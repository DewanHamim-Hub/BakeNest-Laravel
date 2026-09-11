<?php

namespace App\Http\Controllers;

use App\Models\CustomOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CustomOrderController extends Controller
{


    public function index()
    {
        $customOrders = CustomOrder::where('user_id', Auth::id())
                            ->latest()
                            ->get();

        return view(
            'custom_orders.index',
            compact('customOrders')
        );

    }

    public function create()
    {
        return view(
            'custom_orders.create'
        );
    }

    public function store(Request $request)
    {
        $request->validate([

            'product_type'=>'required|string|max:255',

            'size'=>'nullable|string|max:255',

            'flavor'=>'nullable|string|max:255',

            'design_instruction'=>'nullable|string',

            'custom_message'=>'nullable|string',

            'reference_image'=>'nullable|string',

            'required_date'=>'nullable|date',

        ]);

        CustomOrder::create([

            'user_id'=>Auth::id(),

            'product_type'=>$request->product_type,

            'size'=>$request->size,

            'flavor'=>$request->flavor,

            'design_instruction'=>$request->design_instruction,

            'custom_message'=>$request->custom_message,

            'reference_image'=>$request->reference_image,

            'required_date'=>$request->required_date,

            'status'=>'pending',

        ]);

        return redirect()

            ->route('custom-orders.index')

            ->with(
                'success',
                'Custom order request submitted successfully.'
            );

    }

    public function show(CustomOrder $customOrder)
    {

        if($customOrder->user_id != Auth::id())
        {
            abort(403);
        }

      return view(
            'custom_orders.show',
            compact('customOrder')
        );


    }

    public function accept(CustomOrder $customOrder)
    {
        if($customOrder->user_id != Auth::id())
        {
            abort(403);
        }

        $customOrder->update([
            'status'=>'accepted'
        ]);

        return redirect()
        ->route('payment.create', [
            'type'=>'custom-order',
            'id'=>$customOrder->id
        ]);
    }

    public function reject(CustomOrder $customOrder)
    {
        if($customOrder->user_id != Auth::id())
        {
            abort(403);
        }

        $customOrder->update([

            'status'=>'rejected'

        ]);

        return back()

            ->with(
                'success',
                'Quotation rejected.'
            );
    }
}