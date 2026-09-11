@extends('layouts.app')

@section('content')


<section class="max-w-7xl mx-auto px-6 py-12">



<!-- Page Header -->

<div class="mb-10">


<h1 class="text-4xl font-bold text-[#6F4E37]">

    Order Details

</h1>


<p class="text-gray-600 mt-2">

    Order #{{ $order->order_number }}

</p>


</div>





<!-- Order Information -->

<div class="grid grid-cols-1 md:grid-cols-2 gap-8">



<!-- Customer Information -->

<div class="bg-white rounded-3xl shadow p-8">


<h2 class="text-xl font-bold text-[#6F4E37] mb-5">

Customer Information

</h2>



<p>

<strong>Name:</strong>

{{ $order->user->name }}

</p>



<p class="mt-2">

<strong>Email:</strong>

{{ $order->user->email }}

</p>



</div>





<!-- Delivery Information -->

<div class="bg-white rounded-3xl shadow p-8">


<h2 class="text-xl font-bold text-[#6F4E37] mb-5">

Delivery Information

</h2>



<p>

<strong>Type:</strong>

{{ ucfirst($order->delivery_type) }}

</p>



@if($order->delivery_address)

<p class="mt-2">

<strong>Address:</strong>

{{ $order->delivery_address }}

</p>

@endif



</div>



</div>






<!-- Products -->

<div class="bg-white rounded-3xl shadow p-8 mt-8">


<h2 class="text-xl font-bold text-[#6F4E37] mb-6">

Ordered Products

</h2>




<div class="space-y-4">


@foreach($order->items as $item)


<div class="flex justify-between border-b pb-4">


<div>


<p class="font-semibold">

{{ $item->productVariant->product->name }}

</p>


<p class="text-gray-600 text-sm">

Size:

{{ $item->productVariant->size_or_weight }}

</p>


<p class="text-gray-600 text-sm">

Quantity:

{{ $item->quantity }}

</p>


</div>



<div class="font-semibold">

{{ $item->subtotal }} BDT

</div>



</div>


@endforeach


</div>





<div class="mt-6 text-right">


<p class="text-2xl font-bold text-[#6F4E37]">

Total:

{{ $order->total_amount }} BDT

</p>


</div>



</div>







<!-- Payment + Status -->

<div class="grid grid-cols-1 md:grid-cols-2 gap-8 mt-8">





<!-- Payment -->

<div class="bg-white rounded-3xl shadow p-8">


<h2 class="text-xl font-bold text-[#6F4E37] mb-5">

Payment Information

</h2>



<p>

<strong>Status:</strong>

{{ ucfirst($order->payment_status) }}

</p>



@if($order->payment_method)

<p class="mt-2">

<strong>Method:</strong>

{{ ucfirst($order->payment_method) }}

</p>

@endif



</div>








<!-- Status Update -->

<div class="bg-white rounded-3xl shadow p-8">


<h2 class="text-xl font-bold text-[#6F4E37] mb-5">

Update Order Status

</h2>



<form method="POST"
action="{{ route('admin.orders.updateStatus',$order->id) }}">


@csrf

@method('PUT')



<select name="status"

class="w-full border rounded-xl px-4 py-3 mb-5">


<option value="pending"
@if($order->status=='pending') selected @endif>

Pending

</option>



<option value="confirmed"
@if($order->status=='confirmed') selected @endif>

Confirmed

</option>



<option value="preparing"
@if($order->status=='preparing') selected @endif>

Preparing

</option>



<option value="completed"
@if($order->status=='completed') selected @endif>

Completed

</option>



<option value="cancelled"
@if($order->status=='cancelled') selected @endif>

Cancelled

</option>



</select>




<button type="submit"

class="bg-[#6F4E37] text-white px-6 py-3 rounded-full hover:bg-[#5a3d2c] transition">


Update Status

</button>



</form>



</div>




</div>





<!-- Back Button -->

<div class="mt-10">


<a href="{{ route('admin.orders.index') }}"

class="text-[#6F4E37] font-semibold">

← Back to Orders

</a>


</div>



</section>


@endsection