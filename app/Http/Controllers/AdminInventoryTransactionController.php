<?php

namespace App\Http\Controllers;

use App\Models\InventoryTransaction;
use Illuminate\Http\Request;


class AdminInventoryTransactionController extends Controller
{
    public function index()
    {
        $transactions = InventoryTransaction::with([
            'ingredient',
            'productVariant.product'
        ])
        ->latest()
        ->get();
        return view(
            'admin.inventory_transactions.index',
            compact('transactions')
        );
    }
}