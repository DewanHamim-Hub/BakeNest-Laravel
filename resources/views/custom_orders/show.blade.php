@extends('layouts.app')


@section('content')


<section class="max-w-5xl mx-auto px-6 py-12">


    <div class="flex justify-between items-center mb-8">
        <h1 class="text-4xl font-bold">
            Custom Order Details
        </h1>
        <a href="{{ route('custom-orders.index') }}"
           class="bg-[#6F4E37] text-white px-5 py-2 rounded-full hover:bg-[#5a3d2c] transition">
            ← Back to Custom Orders
        </a>
    </div>

@if(session('success'))

<div class="bg-green-100 text-green-700 p-4 rounded-xl mb-6">

{{ session('success') }}

</div>

@endif

<div class="bg-white rounded-3xl shadow p-8">
<div class="flex justify-between mb-8">
<div>
    <h2 class="text-2xl font-bold text-[#6F4E37]">
        {{ $customOrder->product_type }}
    </h2>



<p>

Status:

<span class="font-semibold">

{{ ucfirst($customOrder->status) }}

</span>


</p>


</div>






@if($customOrder->reference_image)


<img src="/{{ $customOrder->reference_image }}" class="w-72 h-52 object-cover rounded-xl shadow-md">


@endif





</div>









<div class="space-y-4">



<p>

<strong>Size:</strong>

{{ $customOrder->size ?? 'Not specified' }}

</p>




<p>

<strong>Flavor:</strong>

{{ $customOrder->flavor ?? 'Not specified' }}

</p>





<p>

<strong>Design Instruction:</strong>

<br>

{{ $customOrder->design_instruction ?? 'None' }}

</p>






<p>

<strong>Custom Message:</strong>

{{ $customOrder->custom_message ?? 'None' }}

</p>





<p>

<strong>Required Date:</strong>

{{ $customOrder->required_date ?? 'Not specified' }}

</p>





</div>








@if($customOrder->quoted_price)


<div class="mt-8 bg-[#F8F1EA] rounded-xl p-5">


<h3 class="text-xl font-bold text-[#6F4E37]">

Quotation

</h3>


<p class="text-2xl font-bold mt-2">

{{ $customOrder->quoted_price }} BDT

</p>



</div>



@endif







@if($customOrder->status == 'quoted')



<div class="mt-8 flex gap-4">



<form method="POST"

action="{{ route('custom-orders.accept',$customOrder->id) }}">


@csrf

@method('PUT')


<button

class="bg-[#6F4E37] text-white px-6 py-3 rounded-full">


Accept Price


</button>


</form>








    <form method="POST" action="{{ route('custom-orders.reject',$customOrder->id) }}">
        @csrf
        @method('PUT')
            <button class="bg-red-600 text-white px-6 py-3 rounded-full">
                Reject
            </button>
    </form>
</div>
@endif
</div>
</section>
@endsection