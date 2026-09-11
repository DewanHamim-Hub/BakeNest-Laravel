@extends('layouts.app')


@section('content')


<section class="max-w-6xl mx-auto px-6 py-12">



    <div class="flex justify-between items-center mb-10">


        <h1 class="text-4xl font-bold text-[#6F4E37]">
        
        Customer Details
        
        </h1>
        
        
        
        <a href="{{ route('admin.customers.index') }}"
        class="bg-gray-200 text-[#6F4E37] px-6 py-3 rounded-full hover:bg-gray-300 transition flex items-center gap-2">
        
        
        <i data-lucide="arrow-left"></i>
        
        Back to Customers
        
        
        </a>
        
        
        
        </div>






@if(session('success'))

<div class="bg-green-100 text-green-700 p-4 rounded-xl mb-6">

{{ session('success') }}

</div>

@endif






<!-- Customer Information -->


<div class="bg-white rounded-3xl shadow p-8 mb-10">



<div class="flex justify-between">


<div>


<h2 class="text-2xl font-bold text-[#6F4E37]">

{{ $user->name }}

</h2>



<p class="text-gray-600">

{{ $user->email }}

</p>



</div>




<div>


@if($user->is_restricted)


<form method="POST"

action="{{ route('admin.customers.unrestrict',$user->id) }}">


@csrf

@method('PUT')


<button

class="bg-green-600 text-white px-6 py-3 rounded-full">


Unrestrict Account


</button>


</form>




@else


<form method="POST"

action="{{ route('admin.customers.restrict',$user->id) }}">


@csrf

@method('PUT')


<button

onclick="return confirm('Restrict this customer account?')"

class="bg-red-600 text-white px-6 py-3 rounded-full">


Restrict Account


</button>


</form>



@endif



</div>




</div>



</div>








<!-- Order History -->


<div class="bg-white rounded-3xl shadow p-8 mb-10">



<h2 class="text-2xl font-bold text-[#6F4E37] mb-6">

Regular Order History

</h2>




@if($user->orders->count())



<div class="space-y-4">


@foreach($user->orders as $order)



<div class="border rounded-xl p-5">



<div class="flex justify-between">


<div>


<h3 class="font-bold">

Order #{{ $order->order_number }}

</h3>



<p class="text-gray-600">

Status:

{{ ucfirst($order->status) }}

</p>



</div>




<div class="font-semibold">

{{ $order->total_amount }} BDT

</div>



</div>






<div class="mt-4 text-sm text-gray-600">


@foreach($order->items as $item)


<p>

{{ $item->productVariant->product->name }}

-

{{ $item->quantity }}

pcs

</p>


@endforeach


</div>





</div>



@endforeach


</div>




@else


<p class="text-gray-500">

No regular orders found.

</p>



@endif




</div>








<!-- Custom Order History -->


<div class="bg-white rounded-3xl shadow p-8">



<h2 class="text-2xl font-bold text-[#6F4E37] mb-6">

Custom Order History

</h2>





@if($user->customOrders->count())



<div class="space-y-4">



@foreach($user->customOrders as $customOrder)



<div class="border rounded-xl p-5 flex justify-between">



<div>


<h3 class="font-bold">

{{ $customOrder->product_type }}

</h3>


<p>

Status:

{{ ucfirst($customOrder->status) }}

</p>



</div>





<div>


@if($customOrder->quoted_price)


<span class="font-semibold">

{{ $customOrder->quoted_price }} BDT

</span>


@endif



</div>




</div>



@endforeach



</div>




@else


<p class="text-gray-500">

No custom orders found.

</p>

@endif
</div>
</section>
@endsection