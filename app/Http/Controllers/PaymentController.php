<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\CustomOrder;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PaymentController extends Controller
{
    public function create($type, $id)
    {
        if($type == 'order')
        {
            $payable = Order::findOrFail($id);
            $amount = $payable->total_amount;
        }
        else
        {
            $payable = CustomOrder::findOrFail($id);
            $amount = $payable->quoted_price;
        }

        return view('payment.create', compact(
            'type',
            'payable',
            'amount'
        ));
    }

    public function process(Request $request)
    {
        $request->validate([
            'type'=>'required',
            'id'=>'required',
            'card_number'=>'required',
            'expiry'=>'required',
            'cvv'=>'required',
            'otp'=>'required'
        ]);

        /*
        |--------------------------------------------------------------------------
        | Demo Payment Cards
        |--------------------------------------------------------------------------
        */

        $demoCards = [
            [
                'number'=>'424242424242',
                'expiry'=>'12/28',
                'cvv'=>'123',
                'otp'=>'111111'
            ],

            [
                'number'=>'555555555555',
                'expiry'=>'10/29',
                'cvv'=>'456',
                'otp'=>'222222'
            ],

            [
                'number'=>'411111111111',
                'expiry'=>'08/30',
                'cvv'=>'789',
                'otp'=>'333333'
            ]
        ];

        $cardNumber = str_replace(
            ' ',
            '',
            $request->card_number
        );

        $validCard = false;
        foreach($demoCards as $card)
        {
            if(
                $card['number'] == $cardNumber
                &&
                $card['expiry'] == $request->expiry
                &&
                $card['cvv'] == $request->cvv
                &&
                $card['otp'] == $request->otp

            )
            {
                $validCard = true;
                break;
            }
        }

        if(!$validCard)
        {
            return back()
            ->with(
                'error',
                'Invalid card details or OTP.'
            );
        }

        /*
        |--------------------------------------------------------------------------
        | Regular Order Payment
        |--------------------------------------------------------------------------
        */

        if($request->type === 'order')
        {
            $order = Order::findOrFail(
                $request->id
            );

            Payment::create([
                'order_id'=>$order->id,
                'amount'=>$order->total_amount,
                'payment_method'=>'card',
                'transaction_id'=>
                    'BN-'.strtoupper(Str::random(10)),
                'status'=>'success',
                'paid_at'=>now()
            ]);

            $order->update([
                'status'=>'confirmed',
                'payment_status'=>'paid'
            ]);
        }

        /*
        |--------------------------------------------------------------------------
        | Custom Order Payment
        |--------------------------------------------------------------------------
        */

        else
        {
            $customOrder = CustomOrder::findOrFail(
                $request->id
            );

            Payment::create([
                'custom_order_id'=>$customOrder->id,
                'amount'=>$customOrder->quoted_price,
                'payment_method'=>'card',
                'transaction_id'=>
                    'BN-'.strtoupper(Str::random(10)),
                'status'=>'success',
                'paid_at'=>now()
            ]);

            $customOrder->update([
                'status'=>'completed'
            ]);
        }

        return redirect()

            ->route('payment.success');
    }

    public function success()
    {
        return view('payment.success');
    }
}