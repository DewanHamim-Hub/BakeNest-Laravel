@extends('layouts.app')

@section('content')


<section class="max-w-6xl mx-auto px-6 py-12">

    <div class="flex justify-between items-center mb-10">

        <h1 class="text-4xl font-bold text-[#6F4E37]">
            Product Details
        </h1>
    
        <a href="{{ route('admin.products.index') }}"
           class="bg-[#6F4E37] text-white px-5 py-2 rounded-full hover:bg-[#5a3d2c] transition">
            ← Back to Products
        </a>
    
    </div>

<div class="bg-white rounded-3xl shadow p-10">



<div class="grid md:grid-cols-2 gap-10">



<!-- Product Image -->

<div>


@if($product->image)


<img 
src="{{ asset('assets/images/'.$product->image)  }}"
class="w-full h-96 object-cover rounded-3xl shadow"
alt="{{ $product->name }}">



@else


<div class="w-full h-96 bg-gray-100 rounded-3xl flex items-center justify-center">

<p class="text-gray-400">
No Image Available
</p>

</div>


@endif


</div>





<!-- Product Information -->

<div>


<p class="text-[#D4A373] font-semibold mb-2">

{{ $product->category->name }}

</p>




<h1 class="text-4xl font-bold text-[#6F4E37] mb-5">

{{ $product->name }}

</h1>




<p class="text-gray-600 leading-relaxed mb-8">

{{ $product->description }}

</p>




<div class="flex gap-4">


<a href="{{ route('admin.products.edit',$product->id) }}"

class="bg-[#6F4E37] text-white px-6 py-3 rounded-full">

Edit Product

</a>




<form action="{{ route('admin.products.destroy',$product->id) }}"

method="POST"

onsubmit="return confirm('Are you sure you want to delete this product?');">


@csrf

@method('DELETE')


<button

class="bg-red-500 text-white px-6 py-3 rounded-full">

Delete

</button>


</form>



</div>


</div>


</div>







<!-- Variants Section -->


<div class="mt-12">


<h2 class="text-3xl font-bold text-[#6F4E37] mb-6">

Product Variants

</h2>



<div class="grid md:grid-cols-3 gap-5">



@foreach($product->productVariants as $variant)



<div class="border rounded-2xl p-6">


<h3 class="text-xl font-bold">

{{ $variant->size_or_weight }}

</h3>



<p class="mt-3">

Price:

<span class="font-semibold">

{{ $variant->price }} BDT

</span>

</p>




<p>

Stock:

<span class="font-semibold">

{{ $variant->stock_quantity }}

</span>

</p>




<p>

Status:

@if($variant->is_available)

<span class="text-green-600 font-semibold">

Available

</span>

@else

<span class="text-red-500 font-semibold">

Unavailable

</span>

@endif


</p>



</div>



@endforeach



</div>


</div>



</div>


</section>


@endsection