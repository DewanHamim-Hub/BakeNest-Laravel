@extends('layouts.app')

@section('content')


<section class="max-w-5xl mx-auto px-6 py-16">


<h1 class="text-4xl font-bold text-[#6F4E37] mb-10">

    Checkout

</h1>



<div class="bg-white rounded-3xl shadow p-8">


    <h2 class="text-2xl font-bold text-[#6F4E37] mb-6">

        Order Summary

    </h2>



    @foreach($cart->items as $item)


    <div class="flex justify-between border-b py-4">


        <div>

            <h3 class="font-semibold">
                {{ $item->productVariant->product->name }}
            </h3>


            <p>
                {{ $item->productVariant->size_or_weight }}

                × {{ $item->quantity }}
            </p>
        </div>

         <div>
            {{ $item->productVariant->price * $item->quantity }} BDT
        </div>

    </div>


    @endforeach



    <form method="POST" action="{{ route('orders.store') }}">

        @csrf
        
        
        <div class="mt-8">
        
        
            <h2 class="text-2xl font-bold text-[#6F4E37] mb-4">
                Delivery Option
            </h2>
                       
            <label class="block mb-3">
            
                <input type="radio" name="delivery_type" value="delivery" checked>
                Delivery
            </label>
            
            <label class="block mb-5">
            
                <input type="radio" name="delivery_type" value="pickup">
                Store Pickup
            </label>
            
            
            
            
            <h2 class="text-2xl font-bold text-[#6F4E37] mb-4">
            
                Delivery Address
            
            </h2>
            
            
            <textarea name="delivery_address" class="w-full border rounded-xl p-3" rows="4" placeholder="Enter delivery address">
            
            </textarea>
            
            
            
            <button type="submit" class="mt-8 bg-[#6F4E37] text-white px-8 py-3 rounded-full">
            
                Place Order
            
            </button>
        
        
        </div>
        
        
    </form>


</div>


</section>


@endsection