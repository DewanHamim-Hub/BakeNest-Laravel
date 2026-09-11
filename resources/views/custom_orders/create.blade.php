@extends('layouts.app')


@section('content')


<section class="max-w-5xl mx-auto px-6 py-12">


<h1 class="text-4xl font-bold text-[#6F4E37] mb-10">

Create Custom Order

</h1>




<form method="POST"
action="{{ route('custom-orders.store') }}">


@csrf



<div class="bg-white rounded-3xl shadow p-8 space-y-6">





<div>

<label class="font-semibold">

Product Type

</label>


<input type="text"
name="product_type"

placeholder="Example: Wedding Cake"

class="w-full border rounded-xl p-3 mt-2">


</div>







<div class="grid grid-cols-2 gap-5">



<div>

<label class="font-semibold">

Size

</label>


<input type="text"

name="size"

placeholder="Example: 2 lb"

class="w-full border rounded-xl p-3 mt-2">


</div>




<div>

<label class="font-semibold">

Flavor

</label>


<input type="text"

name="flavor"

placeholder="Example: Chocolate"

class="w-full border rounded-xl p-3 mt-2">


</div>



</div>







<div>

<label class="font-semibold">

Design Instruction

</label>


<textarea

name="design_instruction"

rows="4"

placeholder="Describe your desired design..."

class="w-full border rounded-xl p-3 mt-2"></textarea>


</div>








<div>

<label class="font-semibold">

Custom Message

</label>


<input type="text"

name="custom_message"

placeholder="Example: Happy Birthday Rahim"

class="w-full border rounded-xl p-3 mt-2">


</div>









<div>

<label class="font-semibold">

Required Date

</label>


<input type="date"

name="required_date"

class="w-full border rounded-xl p-3 mt-2">


</div>








<h2 class="text-2xl font-bold text-[#6F4E37] mt-8">

Choose Reference Design

</h2>





<div class="grid grid-cols-2 md:grid-cols-4 gap-5">





<label class="cursor-pointer">


<input type="radio"

name="reference_image"

value="assets/images/custom-orders/wedding-cake.jpg"

class="hidden peer">



<div class="border rounded-2xl p-3 peer-checked:ring-4 peer-checked:ring-[#6F4E37]">


<img src="/assets/images/custom-orders/wedding-cake.jpg"

class="rounded-xl h-32 w-full object-cover">


<p class="text-center mt-2">

Wedding Cake

</p>


</div>



</label>








<label class="cursor-pointer">


<input type="radio"

name="reference_image"

value="assets/images/custom-orders/theme-cake.jpg"

class="hidden peer">



<div class="border rounded-2xl p-3 peer-checked:ring-4 peer-checked:ring-[#6F4E37]">


<img src="/assets/images/custom-orders/theme-cake.jpg"

class="rounded-xl h-32 w-full object-cover">


<p class="text-center mt-2">

Theme Cake

</p>


</div>



</label>








<label class="cursor-pointer">


<input type="radio"

name="reference_image"

value="assets/images/custom-orders/anniversary-cake.jpg"

class="hidden peer">



<div class="border rounded-2xl p-3 peer-checked:ring-4 peer-checked:ring-[#6F4E37]">


<img src="/assets/images/custom-orders/anniversary-cake.jpg"

class="rounded-xl h-32 w-full object-cover">


<p class="text-center mt-2">

Anniversary Cake

</p>


</div>



</label>








<label class="cursor-pointer">


<input type="radio"

name="reference_image"

value="assets/images/custom-orders/custom-cake.jpg"

class="hidden peer">



<div class="border rounded-2xl p-3 peer-checked:ring-4 peer-checked:ring-[#6F4E37]">


<img src="/assets/images/custom-orders/custom-cake.jpg" class="rounded-xl h-32 w-full object-cover">
<p class="text-center mt-2">
Custom Cake
</p>
</div>
</label>
</div>
    <div class="flex gap-4 mt-6">
        <a href="{{ route('custom-orders.index') }}"
        class="bg-gray-200 text-gray-700 px-8 py-3 rounded-full
        hover:bg-gray-300 transition">
            Back to Custom Orders
        </a>
        <button type="submit"
            class="bg-[#6F4E37] text-white px-8 py-3 rounded-full
            hover:bg-[#5A3B28] transition">
            Submit Request
        </button>
    </div>
</div>
</form>
</section>
@endsection