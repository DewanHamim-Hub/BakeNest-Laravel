@extends('layouts.app')


@section('content')

<section class="max-w-4xl mx-auto px-6 py-12">


    <div class="flex justify-between items-center mb-10">

        <h1 class="text-4xl font-bold text-[#6F4E37]">
            Edit Recipe
        </h1>
    
        <a href="{{ route('admin.products.index') }}"
           class="bg-[#6F4E37] text-white px-5 py-2 rounded-full hover:bg-[#5a3d2c] transition">
            ← Back to Recipes
        </a>
    
    </div>




<form method="POST"
action="{{route('admin.recipes.update',$recipe->id)}}">

@csrf
@method('PUT')



<div class="bg-white rounded-3xl shadow p-8 space-y-5">



<select name="product_variant_id"
class="w-full border p-3 rounded">


@foreach($productVariants as $variant)


<option value="{{$variant->id}}"

@if($recipe->product_variant_id == $variant->id)

selected

@endif

>

{{$variant->product->name}}
-
{{$variant->size_or_weight}}

</option>


@endforeach


</select>




<input type="text"
name="name"
value="{{$recipe->name}}"
class="w-full border p-3 rounded">





<h2 class="text-xl font-bold">

Ingredients

</h2>




<div id="ingredients">


@foreach($recipe->recipeIngredients as $index=>$item)



<div class="grid grid-cols-2 gap-3 mb-3">


<select name="ingredients[{{$index}}][id]"
class="border p-3 rounded">


@foreach($ingredients as $ingredient)


<option value="{{$ingredient->id}}"

@if($ingredient->id == $item->ingredient_id)

selected

@endif

>

{{$ingredient->name}}

</option>


@endforeach


</select>




<input type="number"
step="0.01"
name="ingredients[{{$index}}][quantity]"
value="{{$item->quantity_required}}"
class="border p-3 rounded">



</div>



@endforeach


</div>





<button type="button"
onclick="addIngredient()"
class="bg-gray-300 px-4 py-2 rounded">

Add Ingredient

</button>




<button
class="bg-[#6F4E37] text-white px-6 py-3 rounded-full">

Update Recipe

</button>



</div>


</form>



</section>





<script>

let count = {{$recipe->recipeIngredients->count()}};


function addIngredient()
{

let html = `


<div class="grid grid-cols="2 gap-3 mb-3">


<select name="ingredients[${count}][id]"
class="border p-3 rounded">


@foreach($ingredients as $ingredient)

<option value="{{$ingredient->id}}">

{{$ingredient->name}}

</option>

@endforeach


</select>




<input type="number"
step="0.01"
name="ingredients[${count}][quantity]"
class="border p-3 rounded">


</div>


`;



document.getElementById('ingredients')
.innerHTML += html;


count++;

}


</script>


@endsection