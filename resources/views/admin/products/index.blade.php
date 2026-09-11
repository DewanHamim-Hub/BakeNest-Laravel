@extends('layouts.app')

@section('content')

<section class="max-w-7xl mx-auto px-6 py-12">

<div class="flex justify-between items-center mb-10">
    <h1 class="text-4xl font-bold text-[#6F4E37]">
        Manage Products
    </h1>
    <a href="{{ route('admin.products.create') }}"
    class="bg-[#6F4E37] text-white px-6 py-3 rounded-full">
        Add Product
    </a>
</div>

@if($products->count()==0)

<div class="bg-white rounded-3xl shadow p-8 text-center">
    No products found.
</div>

@else

@foreach($products as $product)

<div class="bg-white rounded-3xl shadow p-8 mb-8">

<div class="flex justify-between">

<div>

<h2 class="text-2xl font-bold text-[#6F4E37]">
    {{ $product->name }}
</h2>


<p class="text-gray-600">
Category:
{{ $product->category->name }}
</p>
</div>



<div class="flex gap-3">

    <a href="{{ route('admin.products.show',$product->id) }}" 
        class="bg-[#D4A373] text-white px-5 py-1 rounded-full hover:bg-[#6F4E37] transition">
        View Details
    </a>

    <a href="{{ route('admin.products.edit',$product->id) }}"
    class="bg-[#D4A373] text-white px-5 py-1 rounded-full">
        Edit
    </a>



    <form action="{{ route('admin.products.destroy',$product->id) }}"
        method="POST"
        onsubmit="return confirm('Are you sure you want to delete this product?');">
                
        @csrf
        
        @method('DELETE')

        <button class="bg-red-500 text-white px-5 py-2 rounded-full hover:bg-red-700 transition">        
            Delete       
        </button>
        
    </form>


</div>


</div>





<h3 class="font-bold mt-6 mb-3">

Variants

</h3>



@foreach($product->productVariants as $variant)


<div class="border-b py-3 flex justify-between">


<div>

{{ $variant->size_or_weight }}

</div>


<div>

{{ $variant->price }} BDT

</div>


<div>

Stock:
{{ $variant->stock_quantity }}

</div>


</div>


@endforeach



</div>


@endforeach


@endif



</section>


@endsection