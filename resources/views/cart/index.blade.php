@extends('layouts.app')

@section('content')


<section class="max-w-7xl mx-auto px-6 py-16">


<h1 class="text-4xl font-bold text-[#6F4E37] mb-10">

    Your Shopping Cart

</h1>



@if(!$cart || $cart->items->count() == 0)


<div class="text-center py-20">


    <h2 class="text-2xl text-gray-600">

        Your cart is empty.

    </h2>


    <a href="{{ route('products.index') }}"
       class="inline-block mt-6 bg-[#6F4E37] text-white px-6 py-3 rounded-full">

        Browse Products

    </a>


</div>


@else



<div class="space-y-5">


    @foreach($cart->items as $item)


    <div class="bg-white shadow rounded-2xl p-6 flex justify-between items-center">


    <div>


    <h2 class="text-xl font-bold text-[#6F4E37]">

    {{ $item->productVariant->product->name }}

    </h2>


    <p>

    {{ $item->productVariant->size_or_weight }}

    </p>


    <p class="text-[#D4A373] font-semibold">

    {{ $item->productVariant->price }} BDT

    </p>


</div>




<div class="flex items-center gap-4">


<form method="POST"
      action="{{ route('cart.update',$item->id) }}">

@csrf
@method('PUT')


<input type="number"
       name="quantity"
       value="{{ $item->quantity }}"
       min="1"
       class="w-20 border rounded p-2">


<button class="bg-[#6F4E37] text-white px-4 py-2 rounded">

Update

</button>


</form>




<form method="POST"
      action="{{ route('cart.remove',$item->id) }}">

@csrf
@method('DELETE')


<button class="text-red-500">

Remove

</button>


</form>


</div>



</div>


@endforeach


</div>

<div class="mt-10 text-right">
    <div class="flex justify-end gap-4 mt-10">
        <a href="{{ route('products.index') }}"
           class="bg-gray-200 text-gray-700 px-8 py-3 rounded-full
           hover:bg-gray-300 transition">
            Continue Shopping
        </a>
        <a href="{{ route('checkout.index') }}"
           class="bg-[#6F4E37] text-white px-8 py-3 rounded-full
           hover:bg-[#5A3B28] transition">
            Proceed To Checkout
        </a>
    </div>
</div>

@endif


</section>


@endsection