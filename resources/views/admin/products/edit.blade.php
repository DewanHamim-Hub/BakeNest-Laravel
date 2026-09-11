@extends('layouts.app')

@section('content')

<section class="max-w-4xl mx-auto px-6 py-12">


<h1 class="text-4xl font-bold text-[#6F4E37] mb-10">

Edit Product

</h1>



<form method="POST"
action="{{ route('admin.products.update',$product->id) }}">


@csrf

@method('PUT')



<div class="bg-white rounded-3xl shadow p-8 space-y-5">



<select name="category_id"
class="w-full border rounded-xl p-3">


@foreach($categories as $category)


<option value="{{ $category->id }}"

@if($product->category_id == $category->id)

selected

@endif>

{{ $category->name }}

</option>


@endforeach


</select>





<input type="text"
name="name"
value="{{ $product->name }}"
class="w-full border rounded-xl p-3">





<textarea name="description"
class="w-full border rounded-xl p-3">

{{ $product->description }}

</textarea>





<input type="text"
name="image"
value="{{ $product->image }}"
class="w-full border rounded-xl p-3">





<h2 class="text-2xl font-bold text-[#6F4E37]">

Variants

</h2>




@foreach($product->productVariants as $index=>$variant)


<div class="grid grid-cols-3 gap-3 mb-3">


<input type="hidden"
name="variants[{{ $index }}][id]"
value="{{ $variant->id }}">



<input 
name="variants[{{ $index }}][size_or_weight]"
value="{{ $variant->size_or_weight }}"
class="border rounded p-3">





<input 
name="variants[{{ $index }}][price]"
value="{{ $variant->price }}"
class="border rounded p-3">





<input 
name="variants[{{ $index }}][stock_quantity]"
value="{{ $variant->stock_quantity }}"
class="border rounded p-3">


</div>


@endforeach





<div class="flex gap-3">

    <button type="submit"
        class="bg-[#6F4E37] text-white px-6 py-2 rounded-full hover:bg-[#5a3d2c] transition">
        Update Product
    </button>


    <a href="{{ route('admin.products.index') }}"
       class="bg-gray-200 text-gray-700 px-6 py-2 rounded-full hover:bg-gray-300 transition">
        Cancel
    </a>

</div>



</div>


</form>


</section>


@endsection