@extends('layouts.app')

@section('content')


<section class="max-w-7xl mx-auto px-6 py-12">


<div class="flex justify-between items-center mb-10">


<h1 class="text-4xl font-bold text-[#6F4E37]">

Ingredient Inventory

</h1>



<a href="{{ route('admin.inventory.create') }}"
class="bg-[#6F4E37] text-white px-6 py-3 rounded-full">

Add Ingredient

</a>


</div>





@if($ingredients->count()==0)


<div class="bg-white rounded-3xl shadow p-8 text-center">

No ingredients found.

</div>


@else



<div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">



@foreach($ingredients as $ingredient)



<div class="bg-white rounded-3xl shadow p-6">



<h2 class="text-2xl font-bold text-[#6F4E37]">

{{ $ingredient->name }}

</h2>



<p class="mt-3">

Unit:

<strong>
{{ $ingredient->unit }}
</strong>

</p>



<p>

Current Stock:

<strong>

{{ $ingredient->current_stock }}

</strong>

</p>



<p>

Minimum Stock:

<strong>

{{ $ingredient->minimum_stock }}

</strong>

</p>




@if($ingredient->current_stock <= $ingredient->minimum_stock)


<p class="mt-3 text-red-500 font-semibold">

⚠ Low Stock

</p>


@else


<p class="mt-3 text-green-600 font-semibold">

✓ Stock Available

</p>


@endif





<div class="mt-6 flex gap-3">

    <a href="{{ route('admin.inventory.edit',$ingredient->id) }}" class="bg-[#D4A373] text-white px-5 py-2 rounded-full">
        Edit
    </a>

    <form action="{{ route('admin.inventory.destroy',$ingredient->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this ingredient?');">
        @csrf
        @method('DELETE')
        <button type="submit" class="bg-red-500 text-white px-5 py-2 rounded-full"> 
            Delete
        </button>
    </form>

</div>



</div>


@endforeach



</div>


@endif



</section>


@endsection