<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Ingredient;
use App\Models\InventoryTransaction;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class AdminReportController extends Controller
{

    public function index()
    {
        /*
        |--------------------------------------------------------------------------
        | Sales Data
        |--------------------------------------------------------------------------
        */
        $totalSales = Order::where(
            'payment_status',
            'paid'
        )
        ->sum('total_amount');

        $totalOrders = Order::count();

        $completedOrders = Order::where(
            'status',
            'completed'
        )
        ->count();

        /*
        |--------------------------------------------------------------------------
        | Best Selling Products
        |--------------------------------------------------------------------------
        */
        $bestSellingProducts = OrderItem::select(
                'product_variant_id',
                DB::raw('SUM(quantity) as total_quantity')
            )
            ->groupBy('product_variant_id')
            ->orderByDesc('total_quantity')
            ->with(
                'productVariant.product'
            )
            ->take(5)
            ->get();

        // Chart Data
        $salesChartLabels = $bestSellingProducts
        ->map(function($item){
            return $item->productVariant->product->name
            .' - '.
            $item->productVariant->size_or_weight;
        });

        $salesChartData = $bestSellingProducts
        ->pluck('total_quantity');

        /*
        |--------------------------------------------------------------------------
        | Inventory Data
        |--------------------------------------------------------------------------
        */
        $totalIngredients = Ingredient::count();

        $lowStockIngredients = Ingredient::whereColumn(
                'current_stock',
                '<=',
                'minimum_stock'
            )
            ->get();

        $recentTransactions = InventoryTransaction::with(
            'ingredient',
            'productVariant.product'
        )
        ->latest()
        ->take(10)
        ->get();

        return view(
            'admin.reports.index',
            compact(
                'totalSales',
                'totalOrders',
                'completedOrders',
                'bestSellingProducts',
                'totalIngredients',
                'lowStockIngredients',
                'recentTransactions',
                'salesChartLabels',
                'salesChartData',
            )
        );
    }

    public function salesPdf()
    {
        $orders = Order::where(
            'payment_status',
            'paid'
        )
        ->with('items.productVariant.product')
        ->get();

        $pdf = Pdf::loadView(
            'admin.reports.pdf.sales',
            compact('orders')
        );

        return $pdf->download(
            'sales-report.pdf'
        );
    }

    public function inventoryPdf()
    {
        $ingredients = Ingredient::all();

        $transactions = InventoryTransaction::with(
            'ingredient',
            'productVariant.product'
        )
        ->latest()
        ->get();

        $pdf = Pdf::loadView(
            'admin.reports.pdf.inventory',
            compact(
                'ingredients',
                'transactions'
            )
        );

        return $pdf->download(
            'inventory-report.pdf'
        );
    }
}