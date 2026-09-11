@extends('layouts.app')


@section('content')


<section class="max-w-6xl mx-auto px-6 py-12">


<h1 class="text-4xl font-bold text-[#6F4E37] mb-10">

My Custom Orders

</h1>



<a href="{{ route('custom-orders.create') }}"
class="bg-[#6F4E37] text-white px-6 py-3 rounded-full">

Create Custom Order

</a>





@if(session('success'))

<div class="mt-6 bg-green-100 p-4 rounded-xl text-green-700">

{{ session('success') }}

</div>

@endif





<div class="mt-10 space-y-6">



@forelse($customOrders as $order)



<div class="bg-white rounded-3xl shadow p-6">



<h2 class="text-xl font-bold text-[#6F4E37]">

{{ $order->product_type }}

</h2>


<p>

Status:

<span class="font-semibold">

{{ ucfirst($order->status) }}

</span>

</p>


@if($order->quoted_price)

<p>

Quoted Price:

{{ $order->quoted_price }} BDT

</p>

@endif

    <a href="{{ route('custom-orders.show',$order->id) }}" class="inline-block mt-4 text-[#6F4E37] font-semibold">
    View Details →
    </a>
</div>
@empty
    <div class="bg-white rounded-3xl shadow p-8">
        No custom orders yet.
    </div>
@endforelse
</div>
</section>
@endsection