@extends('layouts.app')


@section('content')

<section class="max-w-4xl mx-auto px-6 py-12">


    <div class="flex justify-between items-center mb-10">


        <h1 class="text-4xl font-bold text-[#6F4E37]">
            Create Recipe
        </h1>
    
    
    
        <a href="{{ route('admin.recipes.index') }}"
           class="bg-gray-200 text-[#6F4E37] px-6 py-3 rounded-full hover:bg-gray-300 transition flex items-center gap-2">
    
    
            <i data-lucide="arrow-left"></i>
    
            Back to Recipes
    
    
        </a>
    
    
    </div>



<form method="POST"
action="{{route('admin.recipes.store')}}">

@csrf



<div class="bg-white rounded-3xl shadow-lg p-10 space-y-5">


<select name="product_variant_id"
class="w-full border p-3 rounded">

<option>Select Product</option>

@foreach($productVariants as $variant)

<option value="{{$variant->id}}">

{{$variant->product->name}}
-
{{$variant->size_or_weight}}

</option>

@endforeach

</select>




<input type="text"
name="name"
placeholder="Recipe Name"
class="w-full border p-3 rounded">

<h2 class="text-xl font-bold">
    Ingredients
</h2>


<div id="ingredients">


<div class="grid grid-cols-2 gap-3 mb-3">


<select name="ingredients[0][id]"
class="border p-3 rounded">


@foreach($ingredients as $ingredient)

<option value="{{ $ingredient->id }}">

{{ $ingredient->name }}

</option>

@endforeach


</select>



<input type="number"
step="0.01"
name="ingredients[0][quantity]"
placeholder="Required Quantity"
class="border p-3 rounded">


</div>


</div>



<button type="button"
onclick="addIngredient()"
class="bg-gray-300 px-4 py-2 rounded">
Add Ingredient
</button>
<button
class="bg-[#6F4E37] text-white px-6 py-3 rounded-full">
Save Recipe
</button>



</div>


</form>


</section>



<script>

    let count = 1;
    
    
    function addIngredient()
    {
    
    let html = `
    
    <div class="grid grid-cols-2 gap-3 mb-3">
    
    
    <select name="ingredients[${count}][id]"
    class="border p-3 rounded">
    
    
    @foreach($ingredients as $ingredient)
    
    <option value="{{ $ingredient->id }}">
    
    {{ $ingredient->name }}
    
    </option>
    
    @endforeach
    
    
    </select>
    
    
    
    <input type="number"
    step="0.01"
    name="ingredients[${count}][quantity]"
    placeholder="Required Quantity"
    class="border p-3 rounded">
    
    
    </div>
    
    `;
    
    
    document.getElementById('ingredients')
    .insertAdjacentHTML('beforeend', html);
    
    
        count++;  
    } 
</script>
@endsection