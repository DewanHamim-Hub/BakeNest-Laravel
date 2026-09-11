@extends('layouts.app')


@section('content')

<section class="max-w-7xl mx-auto px-6 py-12">

<h1 class="text-4xl font-bold text-[#6F4E37] mb-10">
    Manage Custom Orders
</h1>

@if(session('success'))

<div class="bg-green-100 text-green-700 p-4 rounded-xl mb-6">

{{ session('success') }}

</div>

@endif

<div class="space-y-6">
    @forelse($customOrders as $order)
        <div class="bg-white rounded-3xl shadow p-6">
            <div class="flex justify-between">
                <div>
                    <h2 class="text-xl font-bold text-[#6F4E37]">
                        {{ $order->product_type }}
                    </h2>
                    <p>
                        Customer:
                        {{ $order->user->name }}
                    </p>

                    <p>
                        Status:
                        <span class="font-semibold">
                            {{ ucfirst($order->status) }}
                        </span>
                    </p>
                </div>

                <div class="text-right">
                    @if($order->quoted_price)

                        <p>
                            Price:
                            {{ $order->quoted_price }} BDT
                        </p>

                    @endif

                    <a href="{{ route('admin.custom-orders.show',$order->id) }}" class="inline-block mt-3 bg-[#6F4E37] text-white px-5 py-2 rounded-full">
                        View Details
                    </a>
                </div>
            </div>
        </div>
    @empty

        <div class="bg-white p-8 rounded-3xl shadow">
            No custom orders found.
        </div>

    @endforelse
</div>
</section>
@endsection