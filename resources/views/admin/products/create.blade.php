@extends('layouts.app')

@section('content')


<section class="max-w-4xl mx-auto px-6 py-12">


<h1 class="text-4xl font-bold text-[#6F4E37] mb-10">

Add Product

</h1>



<form method="POST"
action="{{ route('admin.products.store') }}">

@csrf



<div class="bg-white rounded-3xl shadow p-8 space-y-5">



<select name="category_id"
class="w-full border rounded-xl p-3">


<option value="">
Select Category
</option>


@foreach($categories as $category)

<option value="{{ $category->id }}">

{{ $category->name }}

</option>

@endforeach


</select>




<input type="text"
name="name"
placeholder="Product Name"
class="w-full border rounded-xl p-3">



<textarea name="description"
placeholder="Description"
class="w-full border rounded-xl p-3"></textarea>



<input type="text"
name="image"
placeholder="Image path"
class="w-full border rounded-xl p-3">





<h2 class="text-2xl font-bold text-[#6F4E37] mt-8">

Variants

</h2>




<div class="grid grid-cols-3 gap-3">


<input name="variants[0][size_or_weight]"
placeholder="Size"
class="border rounded p-3">


<input name="variants[0][price]"
placeholder="Price"
class="border rounded p-3">


<input name="variants[0][stock_quantity]"
placeholder="Stock"
class="border rounded p-3">


</div>





<div class="grid grid-cols-3 gap-3 mt-3">


<input name="variants[1][size_or_weight]"
placeholder="Size"
class="border rounded p-3">


<input name="variants[1][price]"
placeholder="Price"
class="border rounded p-3">


<input name="variants[1][stock_quantity]"
placeholder="Stock"
class="border rounded p-3">


</div>





<div class="mt-8 flex gap-4">


    <button
    type="submit"
    class="bg-[#6F4E37] text-white px-8 py-3 rounded-full hover:bg-[#5a3d2b] transition">
    
    Save Product
    
    </button>
    
    
    
    <a href="{{ route('admin.products.index') }}"
    class="bg-gray-200 text-[#6F4E37] px-8 py-3 rounded-full hover:bg-gray-300 transition">
    
    Cancel
    
    </a>
    
    
    </div>

</div>
</form>
</section>
@endsection