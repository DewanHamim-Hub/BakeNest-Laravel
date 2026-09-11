@extends('layouts.app')

@section('content')

<section class="max-w-7xl mx-auto px-6 py-12">
    <h1 class="text-4xl font-bold text-[#6F4E37] mb-10">
        Reports Dashboard
    </h1>
    <div class="flex gap-4 mb-8">
        <a href="{{route('admin.reports.sales.pdf')}}" class="bg-[#6F4E37] text-white px-6 py-3 rounded-full">
            Download Sales PDF
        </a>
        
        <a href="{{route('admin.reports.inventory.pdf')}}" class="bg-[#D4A373] text-white px-6 py-3 rounded-full">
            Download Inventory PDF
        </a>
    </div>

<!-- Summary Cards -->
<div class="grid md:grid-cols-4 gap-6 mb-10">
    <div class="bg-white rounded-3xl shadow p-6">
        <p class="text-gray-500">
            Total Sales
        </p>

<h2 class="text-3xl font-bold text-[#6F4E37]">

{{ number_format($totalSales,2) }}

BDT

</h2>

</div>





<div class="bg-white rounded-3xl shadow p-6">

<p class="text-gray-500">

Total Orders

</p>

<h2 class="text-3xl font-bold text-[#6F4E37]">

{{ $totalOrders }}

</h2>

</div>





<div class="bg-white rounded-3xl shadow p-6">

<p class="text-gray-500">

Completed Orders

</p>

<h2 class="text-3xl font-bold text-[#6F4E37]">

{{ $completedOrders }}

</h2>

</div>





<div class="bg-white rounded-3xl shadow p-6">

<p class="text-gray-500">

Ingredients

</p>

<h2 class="text-3xl font-bold text-[#6F4E37]">

{{ $totalIngredients }}

</h2>

</div>



</div>

<div class="grid md:grid-cols-2 gap-8 mb-10">


    <div class="bg-white rounded-3xl shadow p-8">
    
    
    <h2 class="text-xl font-bold text-[#6F4E37] mb-5">
    
    Sales Performance
    
    </h2>
    
    
    <canvas id="salesChart"></canvas>
    
    
    </div>
    
    
    
    
    
    <div class="bg-white rounded-3xl shadow p-8">
    
    
    <h2 class="text-xl font-bold text-[#6F4E37] mb-5">
    
    Product Distribution
    
    </h2>
    
    
    <canvas id="productChart"></canvas>
    
    
    </div>
    
    
    
    </div>

<!-- Best Selling Products -->


<div class="bg-white rounded-3xl shadow p-8 mb-10">


<h2 class="text-2xl font-bold text-[#6F4E37] mb-6">

Best Selling Products

</h2>




<table class="w-full">


<thead>

<tr class="border-b">

<th class="text-left p-3">

Product

</th>


<th class="text-left p-3">

Quantity Sold

</th>

</tr>


</thead>



<tbody>



@foreach($bestSellingProducts as $item)



<tr class="border-b">


<td class="p-3">


{{ $item->productVariant->product->name }}

-

{{ $item->productVariant->size_or_weight }}


</td>



<td class="p-3">

{{ $item->total_quantity }}

</td>



</tr>



@endforeach



</tbody>


</table>



</div>









<!-- Low Stock -->

<div class="bg-white rounded-3xl shadow p-8 mb-10">


<h2 class="text-2xl font-bold text-[#6F4E37] mb-6">

Low Stock Ingredients

</h2>
<table class="w-full">
    <thead>
        <tr class="border-b">
            <th class="p-3 text-left">
                Ingredient
            </th>
            <th class="p-3 text-left">
                Current
            </th>
            <th class="p-3 text-left">
                Minimum
            </th>
        </tr>
    </thead>
    <tbody>
        @forelse($lowStockIngredients as $ingredient)

            <tr class="border-b">
                <td class="p-3">
                    {{ $ingredient->name }}
                </td>

                <td class="p-3">
                    {{ $ingredient->current_stock }}
                    {{ $ingredient->unit }}
                </td>

                <td class="p-3">
                    {{ $ingredient->minimum_stock }}
                    {{ $ingredient->unit }}
                </td>
            </tr>
        @empty


<tr>

<td colspan="3"
class="p-5 text-center">

No low stock items.

</td>

</tr>


@endforelse



</tbody>



</table>
</div>

    <!-- Recent Transactions -->
    <div class="bg-white rounded-3xl shadow p-8">
        <h2 class="text-2xl font-bold text-[#6F4E37] mb-6">
            Recent Inventory Transactions
        </h2>

        <div class="space-y-3">
            @foreach($recentTransactions as $transaction)
                <div class="border-b pb-3">
                    <p class="font-semibold">
                        @if($transaction->ingredient)

                            {{ $transaction->ingredient->name }}

                        @elseif($transaction->productVariant)

                            {{ $transaction->productVariant->product->name }}

                        @endif
                    </p>

                    <p class="text-gray-600">
                        {{ $transaction->type }} - {{ $transaction->quantity }}
                    </p>
                </div>
            @endforeach
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const labels = @json($salesChartLabels);
    const data = @json($salesChartData);

    new Chart(
    document.getElementById('salesChart'),
    {
        type:'bar',
        data:{
        labels:labels,
            datasets:[{
                label:'Units Sold',
            data:data}]},

        options:{
            responsive:true,
        }
    });

    new Chart(
        document.getElementById('productChart'),
        {
            type:'pie',

                data:{
                    labels:labels,
                    datasets:[{
                        data:data}]
                }
        }
    );
</script>
@endsection