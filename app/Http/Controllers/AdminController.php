<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use App\Models\Ingredient;
use App\Models\CustomOrder;
use App\Models\InventoryTransaction;


class AdminController extends Controller
{
    public function dashboard()
    {
        /*
        |--------------------------------------------------------------------------
        | Basic Statistics
        |--------------------------------------------------------------------------
        */
        $totalProducts = Product::count();

        $totalOrders = Order::count();

        $pendingOrders = Order::where(
            'status',
            'pending'
        )->count();

        $totalCustomers = User::where(
            'role',
            'customer'
        )->count();
        /*
        |--------------------------------------------------------------------------
        | Financial Data
        |--------------------------------------------------------------------------
        */
        $totalRevenue = Order::where(
            'payment_status',
            'paid'
        )
        ->sum('total_amount');
        /*
        |--------------------------------------------------------------------------
        | Inventory Alerts
        |--------------------------------------------------------------------------
        */
        $lowStockIngredients = Ingredient::whereColumn(
            'current_stock',
            '<=',
            'minimum_stock'
        )
        ->count();
        /*
        |--------------------------------------------------------------------------
        | Custom Orders
        |--------------------------------------------------------------------------
        */
        $pendingCustomOrders = CustomOrder::where(
            'status',
            'pending'
        )
        ->count();
        /*
        |--------------------------------------------------------------------------
        | Recent Activities
        |--------------------------------------------------------------------------
        */
        $recentOrders = Order::with('user')
            ->latest()
            ->take(5)
            ->get();

        $recentTransactions = InventoryTransaction::with(
            'ingredient'
        )
        ->latest()
        ->take(5)
        ->get();

        return view(
            'admin.dashboard',
            compact(
                'totalProducts',
                'totalOrders',
                'pendingOrders',
                'totalCustomers',
                'totalRevenue',
                'lowStockIngredients',
                'pendingCustomOrders',
                'recentOrders',
                'recentTransactions'
            )
        );
    }
}