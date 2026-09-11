@extends('layouts.app')

@section('content')


<section class="max-w-7xl mx-auto px-6 py-12">


<h1 class="text-4xl font-bold text-[#6F4E37] mb-10">

    Manage Orders

</h1>

@if($orders->count() == 0)


<div class="bg-white rounded-3xl shadow p-8 text-center">

    <h2 class="text-xl text-gray-600">

        No orders found.

    </h2>

</div>


@else



@foreach($orders as $order)


<div class="bg-white rounded-3xl shadow p-8 mb-8">


<!-- Order Header -->

<div class="flex justify-between mb-6">


<div>


<h2 class="text-xl font-bold text-[#6F4E37]">

Order #{{ $order->order_number }}

</h2>


<p class="text-gray-600">

Customer:
{{ $order->user->name }}

</p>


<p class="text-gray-500 text-sm">

{{ $order->user->email }}

</p>


<p class="text-gray-500 text-sm mt-1">

{{ $order->created_at->format('d M Y, h:i A') }}

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





<!-- Products -->

<h3 class="font-bold text-lg mb-4">

Products

</h3>



<div class="space-y-3">


@foreach($order->items as $item)


<div class="flex justify-between border-b pb-3">


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


</div>





<!-- Order Footer -->

<div class="mt-6 flex justify-between items-center">


<div>


<p>

Delivery:

{{ ucfirst($order->delivery_type) }}

</p>


@if($order->delivery_address)

<p class="text-gray-600">

Address:
{{ $order->delivery_address }}

</p>

@endif


</div>



<div class="text-right">


<p class="text-xl font-bold text-[#6F4E37]">

Total:

{{ $order->total_amount }} BDT

</p>


</div>


</div>





<!-- Action Area -->

<div class="mt-8 border-t pt-5">


<a href="{{ route('admin.orders.show', $order->id) }}"

class="inline-block bg-[#6F4E37] text-white px-6 py-3 rounded-full hover:bg-[#5a3d2c] transition">


View Details

</a>


</div>



</div>


@endforeach



@endif


</section>


@endsection