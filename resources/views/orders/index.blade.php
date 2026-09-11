@extends('layouts.app')

@section('content')

<section class="max-w-6xl mx-auto px-6 py-16">


<h1 class="text-4xl font-bold text-[#6F4E37] mb-10">
    My Orders
</h1>



@if($orders->count() == 0)

<div class="bg-white rounded-2xl shadow p-8 text-center">

    <h2 class="text-xl text-gray-600">
        You have no orders yet.
    </h2>

</div>


@else


@foreach($orders as $order)


<div class="bg-white rounded-3xl shadow p-8 mb-8">


<div class="flex justify-between items-center mb-6">


<div>

<h2 class="text-xl font-bold text-[#6F4E37]">

Order #{{ $order->order_number }}

</h2>


<p class="text-gray-600">

{{ $order->created_at->format('d M Y') }}

</p>


</div>



<div class="text-right">


<p>

Status:

<span class="font-semibold text-[#D4A373]">

{{ ucfirst($order->status) }}

</span>

</p>


<p>

Payment:

{{ ucfirst($order->payment_status) }}

</p>


</div>


</div>





<h3 class="font-bold text-lg mb-4">

Items

</h3>



@foreach($order->items as $item)


<div class="flex justify-between border-b py-3">


<div>


<p class="font-semibold">

{{ $item->productVariant->product->name }}

</p>


<p class="text-sm text-gray-600">

{{ $item->productVariant->size_or_weight }}

×

{{ $item->quantity }}

</p>


</div>



<div class="font-semibold">


{{ $item->subtotal }} BDT


</div>


</div>


@endforeach





<div class="mt-6 text-right">


<p class="text-lg font-bold text-[#6F4E37]">

Total:

{{ $order->total_amount }} BDT

</p>


<p class="text-gray-600">

Delivery:

{{ ucfirst($order->delivery_type) }}

</p>


</div>


</div>



@endforeach


@endif


</section>


@endsection