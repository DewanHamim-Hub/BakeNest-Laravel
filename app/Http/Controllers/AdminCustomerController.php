<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminCustomerController extends Controller
{
    public function index()
    {
        $customers = User::where(
            'role',
            'customer'
        )
        ->latest()
        ->get();

        return view(
            'admin.customers.index',
            compact('customers')
        );
    }

    public function show(User $user)
    {
        if($user->role !== 'customer')
        {
            abort(403);
        }

        $user->load([
            'orders.items.productVariant.product',
            'customOrders'
        ]);

        return view(
            'admin.customers.show',
            compact('user')
        );

    }

    public function restrict(User $user)
    {
        if($user->role !== 'customer')
        {
            abort(403);
        }

        $user->update([
            'is_restricted'=>true
        ]);

        return back()

            ->with(
                'success',
                'Customer account restricted.'
            );
    }

    public function unrestrict(User $user)
    {
        if($user->role !== 'customer')
        {
            abort(403);
        }

        $user->update([

            'is_restricted'=>false

        ]);

        return back()

            ->with(
                'success',
                'Customer account restored.'
            );
    }
}