@extends('layouts.app')


@section('content')


<section class="max-w-5xl mx-auto px-6 py-12">


<h1 class="text-4xl font-bold text-[#6F4E37] mb-10">

Custom Order Details

</h1>




@if(session('success'))

<div class="bg-green-100 text-green-700 p-4 rounded-xl mb-6">

{{ session('success') }}

</div>

@endif






<div class="bg-white rounded-3xl shadow p-8">





<!-- Header -->

<div class="flex justify-between mb-8">



<div>


<h2 class="text-2xl font-bold text-[#6F4E37]">

{{ $customOrder->product_type }}

</h2>



<p class="text-gray-600">

Customer:

{{ $customOrder->user->name }}

</p>


<p class="text-gray-600">

Email:

{{ $customOrder->user->email }}

</p>



</div>






<div class="text-right">


<p>

Status:

<span class="font-semibold">

{{ ucfirst($customOrder->status) }}

</span>


</p>




@if($customOrder->quoted_price)


<p>

Quoted Price:

<span class="font-bold">

{{ $customOrder->quoted_price }} BDT

</span>


</p>


@endif



</div>




</div>







<!-- Reference Image -->


@if($customOrder->reference_image)



<div class="mb-8">


<h3 class="text-xl font-bold text-[#6F4E37] mb-3">

Reference Design

</h3>



<img src="/{{ $customOrder->reference_image }}"

class="w-72 h-52 object-cover rounded-2xl shadow">


</div>



@endif







<!-- Requirements -->

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

</p>


<div class="bg-gray-50 rounded-xl p-4">

{{ $customOrder->design_instruction ?? 'No instructions provided' }}

</div>





<p>

<strong>Custom Message:</strong>

{{ $customOrder->custom_message ?? 'None' }}

</p>






<p>

<strong>Required Date:</strong>

{{ $customOrder->required_date ?? 'Not specified' }}

</p>




</div>








<!-- Quotation -->

@if($customOrder->status == 'pending')



<div class="mt-10 border-t pt-8">


<h3 class="text-xl font-bold text-[#6F4E37] mb-4">

Set Quotation Price

</h3>





<form method="POST"

action="{{ route('admin.custom-orders.quote',$customOrder->id) }}">


@csrf

@method('PUT')



<div class="flex gap-4">



<input type="number"

name="quoted_price"

placeholder="Enter price"

class="border rounded-xl p-3 flex-1">





<button

class="bg-[#6F4E37] text-white px-6 py-3 rounded-full">


Send Quote


</button>




</div>



</form>



</div>



@endif







<!-- Admin Actions -->


<div class="mt-10 flex gap-4">





@if($customOrder->status != 'rejected'
&&
$customOrder->status != 'completed')



<form method="POST"

action="{{ route('admin.custom-orders.reject',$customOrder->id) }}">


@csrf

@method('PUT')


<button

onclick="return confirm('Reject this custom order?')"

class="bg-red-600 text-white px-6 py-3 rounded-full">


Reject Order


</button>



</form>



@endif








@if($customOrder->status == 'accepted')



<form method="POST"

action="{{ route('admin.custom-orders.complete',$customOrder->id) }}">


@csrf

@method('PUT')


<button

class="bg-green-600 text-white px-6 py-3 rounded-full">


Mark Completed


</button>


</form>
@endif
</div>
</div>
</section>
@endsection