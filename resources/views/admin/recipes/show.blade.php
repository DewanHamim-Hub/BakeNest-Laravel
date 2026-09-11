@extends('layouts.app')


@section('content')

<section class="max-w-5xl mx-auto px-6 py-12">


<h1 class="text-4xl font-bold text-[#6F4E37] mb-8">
Recipe Details
</h1>



<div class="bg-white rounded-3xl shadow p-8">


<h2 class="text-2xl font-bold text-[#6F4E37]">

{{ $recipe->name }}

</h2>


<p class="mt-3">

Product:

<strong>
{{ $recipe->productVariant->product->name }}
</strong>

</p>


<p>

Variant:

<strong>
{{ $recipe->productVariant->size_or_weight }}
</strong>

</p>



<hr class="my-6">



<h3 class="text-xl font-bold mb-4">

Ingredients

</h3>



<div class="space-y-3">


@foreach($recipe->recipeIngredients as $item)


<div class="flex justify-between bg-[#FFF8F0] p-4 rounded-xl">


<div>

{{ $item->ingredient->name }}

</div>


<div class="font-semibold">

{{ $item->quantity_required }}

{{ $item->ingredient->unit }}

</div>


</div>


@endforeach


</div>



<div class="mt-8">


<a href="{{route('admin.recipes.edit',$recipe->id)}}"
class="bg-[#6F4E37] text-white px-6 py-3 rounded-full">

Edit Recipe

</a>


<a href="{{route('admin.recipes.index')}}"
class="ml-3 bg-gray-200 px-6 py-3 rounded-full">

Back

</a>


</div>



</div>



</section>


@endsection