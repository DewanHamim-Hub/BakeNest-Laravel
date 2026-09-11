@extends('layouts.app')


@section('content')


<section class="max-w-7xl mx-auto px-6 py-12">


<!-- Header -->

<div class="mb-10">

<h1 class="text-4xl font-bold text-[#6F4E37]">

Admin Dashboard

</h1>


<p class="text-gray-600 mt-2">

Welcome back, BakeNest Admin. Manage your bakery operations from one place.

</p>

</div>

<!-- Statistics Cards -->
<div class="grid md:grid-cols-4 gap-6 mb-10">

    <!-- Products -->
    <div class="bg-white rounded-3xl shadow p-6 border transition duration-300 hover:-translate-y-2 hover:shadow-xl cursor-pointer">
        <div class="flex justify-between items-center">
            <div>
                <p class="text-gray-500">
                    Products
                </p>

                <h2 class="text-3xl font-bold text-[#6F4E37]">
                    {{ $totalProducts }}
                </h2>
            </div>

            <div class="bg-[#F5EBDD] p-3 rounded-full">
                <i data-lucide="cake"
                class="text-[#6F4E37]"></i>
            </div>
        </div>
    </div>

<!-- Orders -->
<div class="bg-white rounded-3xl shadow p-6 border transition duration-300 hover:-translate-y-2 hover:shadow-xl cursor-pointer">
<div class="flex justify-between">
<div>
<p class="text-gray-500">

Orders

</p>


<h2 class="text-3xl font-bold text-[#6F4E37]">

{{ $totalOrders }}

</h2>


</div>



<div class="bg-[#F5EBDD] p-3 rounded-full">

<i data-lucide="shopping-bag"
class="text-[#6F4E37]"></i>

</div>

</div>


</div>

<!-- Revenue -->


<div class="bg-white rounded-3xl shadow p-6 border transition duration-300 hover:-translate-y-2 hover:shadow-xl cursor-pointer">


<div class="flex justify-between">


<div>


<p class="text-gray-500">

Revenue

</p>


<h2 class="text-2xl font-bold text-[#6F4E37]">

{{ number_format($totalRevenue,2) }}

</h2>


<p class="text-sm">

BDT

</p>


</div>


<div class="bg-[#F5EBDD] p-3 rounded-full">


<i data-lucide="banknote"
class="text-[#6F4E37]"></i>


</div>


</div>


</div>

<!-- Customers -->


<div class="bg-white rounded-3xl shadow p-6 border transition duration-300 hover:-translate-y-2 hover:shadow-xl cursor-pointer">


<div class="flex justify-between">


<div>


<p class="text-gray-500">

Customers

</p>


<h2 class="text-3xl font-bold text-[#6F4E37]">

{{ $totalCustomers }}

</h2>


</div>


<div class="bg-[#F5EBDD] p-3 rounded-full">


<i data-lucide="users"
class="text-[#6F4E37]"></i>


</div>


</div>


</div>



</div>

    <!-- Secondary Status Cards -->
    <div class="grid md:grid-cols-3 gap-6 mb-12">
        <div class="bg-[#6F4E37] text-white rounded-3xl p-6 transition duration-300 hover:-translate-y-2 hover:shadow-xl cursor-pointer">
            <p class="opacity-80">
                Pending Orders
            </p>
            <h2 class="text-3xl font-bold">
                {{ $pendingOrders }}
            </h2>
        </div>

        <a href="{{ route('admin.inventory.lowstock') }}"
        class="block bg-white rounded-3xl shadow p-6 border transition duration-300 hover:-translate-y-2 hover:shadow-xl cursor-pointer">
            <p class="text-gray-500">
                Low Stock Ingredients
            </p>
            <h2 class="text-3xl font-bold text-red-600">
                {{ $lowStockIngredients }}
            </h2>
            <p class="text-sm text-gray-500 mt-2">
            Click to view stock alerts
            </p>
        </a>

        <div class="bg-[#6F4E37] text-white rounded-3xl p-6 transition duration-300 hover:-translate-y-2 hover:shadow-xl cursor-pointer">
            <p class="opacity-80">
                Pending Custom Orders
            </p>
            <h2 class="text-3xl font-bold">
                {{ $pendingCustomOrders }}
            </h2>
        </div>
    </div>

<!-- Quick Actions -->

<h2 class="text-2xl font-bold text-[#6F4E37] mb-6">

Quick Actions

</h2>



<div class="grid md:grid-cols-4 gap-6 mb-12">





<a href="{{route('admin.products.index')}}"
class="bg-white rounded-3xl shadow p-6 hover:shadow-lg transition">


<i data-lucide="package"
class="mb-4 text-[#6F4E37]"></i>


<h3 class="font-bold text-xl">

Products

</h3>


<p class="text-gray-500 text-sm">

Manage bakery items

</p>


</a>

<a href="{{route('admin.orders.index')}}"
class="bg-white rounded-3xl shadow p-6 hover:shadow-lg transition">


<i data-lucide="shopping-cart"
class="mb-4 text-[#6F4E37]"></i>


<h3 class="font-bold text-xl">

Orders

</h3>


<p class="text-gray-500 text-sm">

Process customer orders

</p>


</a>

<a href="{{route('admin.reports.index')}}"
class="bg-white rounded-3xl shadow p-6 hover:shadow-lg transition">


<i data-lucide="chart-column"
class="mb-4 text-[#6F4E37]"></i>


<h3 class="font-bold text-xl">

Reports

</h3>


<p class="text-gray-500 text-sm">

View analytics

</p>


</a>

<a href="{{route('admin.customers.index')}}"
class="bg-white rounded-3xl shadow p-6 hover:shadow-lg transition">


<i data-lucide="users"
class="mb-4 text-[#6F4E37]"></i>


<h3 class="font-bold text-xl">

Customers

</h3>


<p class="text-gray-500 text-sm">

Manage accounts

</p>


</a>

</div>

<!-- Recent Activity -->


<div class="grid md:grid-cols-2 gap-8">





<!-- Orders -->


<div class="bg-white rounded-3xl shadow p-8">


<h2 class="text-xl font-bold text-[#6F4E37] mb-6">

Recent Orders

</h2>




@forelse($recentOrders as $order)


<div class="border-b py-3 flex justify-between">


<div>


<p class="font-semibold">

{{ $order->order_number }}

</p>


<p class="text-sm text-gray-500">

{{ $order->user->name }}

</p>


</div>


<p class="font-semibold">

{{ $order->total_amount }}

BDT

</p>


</div>



@empty


<p class="text-gray-500">

No orders available.

</p>


@endforelse

</div>

<!-- Inventory -->


<div class="bg-white rounded-3xl shadow p-8">


<h2 class="text-xl font-bold text-[#6F4E37] mb-6">

Inventory Activity

</h2>

@forelse($recentTransactions as $transaction)


<div class="border-b py-3">


<p class="font-semibold">


@if($transaction->ingredient)

{{ $transaction->ingredient->name }}

@else

Product Movement

@endif


</p>


<p class="text-sm text-gray-500">


{{ $transaction->type }}

-

{{ $transaction->quantity }}


</p>


</div>
@empty
<p class="text-gray-500">

No transactions yet.

</p>

@endforelse

</div>
</div>
</section>

<script>
lucide.createIcons();
</script>
@endsection