<?php

use Illuminate\Support\Facades\Route;
use App\Models\Product;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminCustomerController;
use App\Http\Controllers\AdminCustomOrderController;
use App\Http\Controllers\AdminIngredientController;
use App\Http\Controllers\AdminInventoryTransactionController;
use App\Http\Controllers\AdminOrderController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\AdminProductionController;
use App\Http\Controllers\AdminRecipeController;
use App\Http\Controllers\AdminReportController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CustomOrderController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;

require __DIR__.'/auth.php';


// ===============================
// Customer Home Page
// ===============================
Route::get('/', function () {
    $featuredProducts = Product::take(4)->get();
    return view('welcome', compact('featuredProducts'));
})->name('home');
// ===============================
// Customer Product Pages
// ===============================

Route::get('/products', 
    [ProductController::class, 'index']
)->name('products.index');

Route::get('/products/{product}', 
    [ProductController::class, 'show']
)->name('products.show');
// ===============================
// Customer Authenticated Routes
// ===============================

Route::middleware('auth')->group(function () {

    // Cart
    Route::get('/cart', 
        [CartController::class, 'index']
    )->name('cart.index');

    Route::post('/cart/add/{productVariant}', 
        [CartController::class, 'add']
    )->name('cart.add');

    Route::put('/cart/update/{cartItem}', 
        [CartController::class, 'update']
    )->name('cart.update');

    Route::delete('/cart/remove/{cartItem}', 
        [CartController::class, 'remove']
    )->name('cart.remove');

    // Checkout
    Route::get('/checkout',
        [CheckoutController::class,'index']
    )->name('checkout.index');

    // Orders
    Route::post('/orders',
        [OrderController::class,'store']
    )->name('orders.store');

    Route::get('/orders',
        [OrderController::class,'index']
    )->name('orders.history');

    //Custom Orders
    Route::get('/custom-orders',
        [CustomOrderController::class,'index'])
    ->name('custom-orders.index');

    Route::get('/custom-orders/create',
        [CustomOrderController::class,'create'])
    ->name('custom-orders.create');

    Route::post('/custom-orders',
        [CustomOrderController::class,'store'])
    ->name('custom-orders.store');

    Route::get('/custom-orders/{customOrder}',
        [CustomOrderController::class,'show'])
    ->name('custom-orders.show');

    Route::put('/custom-orders/{customOrder}/accept',
        [CustomOrderController::class,'accept'])
    ->name('custom-orders.accept');

    Route::put('/custom-orders/{customOrder}/reject',
        [CustomOrderController::class,'reject'])
    ->name('custom-orders.reject');

    //Payment
    Route::get('/payment/{type}/{id}',
        [PaymentController::class,'create'])
    ->name('payment.create');

    Route::post('/payment/process',
        [PaymentController::class,'process'])
    ->name('payment.process');

    Route::get('/payment-success',
        [PaymentController::class,'success'])
    ->name('payment.success');

});
// ===============================
// Admin Dashboard
// ===============================

Route::get('/admin/dashboard',
    [AdminController::class,'dashboard']
)->middleware(['auth','role:admin'])
->name('admin.dashboard');

// ===============================
// Admin Routes
// ===============================

Route::middleware(['auth','role:admin'])->group(function(){

    // Admin Order Management

    Route::get('/admin/orders',
        [AdminOrderController::class,'index']
    )->name('admin.orders.index');

    Route::get('/admin/orders/{order}',
        [AdminOrderController::class,'show']
    )->name('admin.orders.show');

    Route::put('/admin/orders/{order}/status',
        [AdminOrderController::class,'updateStatus']
    )->name('admin.orders.updateStatus');

    Route::resource('/admin/products',
        AdminProductController::class
    )->names([
        'index' => 'admin.products.index',
        'create' => 'admin.products.create',
        'store' => 'admin.products.store',
        'show' => 'admin.products.show',
        'edit' => 'admin.products.edit',
        'update' => 'admin.products.update',
        'destroy' => 'admin.products.destroy',
    ]);

    Route::get('/admin/inventory/low-stock',
        [\App\Http\Controllers\AdminIngredientController::class,'lowStock'])
    ->name('admin.inventory.lowstock');

    Route::resource('/admin/inventory',
        AdminIngredientController::class
    )->names([
        'index'=>'admin.inventory.index',
        'create'=>'admin.inventory.create',
        'store'=>'admin.inventory.store',
        'edit'=>'admin.inventory.edit',
        'update'=>'admin.inventory.update',
        'destroy'=>'admin.inventory.destroy',
    ]);

    Route::resource('/admin/recipes',
        AdminRecipeController::class)
    ->names([
        'index'=>'admin.recipes.index',
        'create'=>'admin.recipes.create',
        'store'=>'admin.recipes.store',
        'show'=>'admin.recipes.show',
        'edit'=>'admin.recipes.edit',
        'update'=>'admin.recipes.update',
        'destroy'=>'admin.recipes.destroy',
    ]);

    Route::resource('/admin/productions',
        AdminProductionController::class)
    ->only([
        'index',
        'create',
        'store'
    ])
    ->names([
        'index'=>'admin.productions.index',
        'create'=>'admin.productions.create',
        'store'=>'admin.productions.store',
    ]);

    Route::get('/admin/inventory-transactions',
        [AdminInventoryTransactionController::class,'index'])
    ->name('admin.inventory_transactions.index');

    Route::get('/admin/custom-orders',
        [AdminCustomOrderController::class,'index'])
    ->name('admin.custom-orders.index');

    Route::get('/admin/custom-orders/{customOrder}',
        [AdminCustomOrderController::class,'show'])
    ->name('admin.custom-orders.show');

    Route::put('/admin/custom-orders/{customOrder}/quote',
        [AdminCustomOrderController::class,'quote'])
    ->name('admin.custom-orders.quote');

    Route::put('/admin/custom-orders/{customOrder}/reject',
        [AdminCustomOrderController::class,'reject'])
    ->name('admin.custom-orders.reject');

    Route::put('/admin/custom-orders/{customOrder}/complete',
        [AdminCustomOrderController::class,'complete'])
    ->name('admin.custom-orders.complete');

    Route::get('/admin/reports',
        [AdminReportController::class,'index'])
    ->name('admin.reports.index');

    Route::get('/admin/reports/sales/pdf',
        [AdminReportController::class,'salesPdf'])
    ->name('admin.reports.sales.pdf');

    Route::get('/admin/reports/inventory/pdf',
        [AdminReportController::class,'inventoryPdf'])
    ->name('admin.reports.inventory.pdf');

    Route::get('/admin/customers',
        [AdminCustomerController::class,'index'])
    ->name('admin.customers.index');

    Route::get('/admin/customers/{user}',
        [AdminCustomerController::class,'show'])
    ->name('admin.customers.show');

    Route::put('/admin/customers/{user}/restrict',
        [AdminCustomerController::class,'restrict'])
    ->name('admin.customers.restrict');

    Route::put('/admin/customers/{user}/unrestrict',
        [AdminCustomerController::class,'unrestrict'])
    ->name('admin.customers.unrestrict');

    });