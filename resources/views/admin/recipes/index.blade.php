@extends('layouts.app')


@section('content')

<section class="max-w-6xl mx-auto px-6 py-12">


<h1 class="text-4xl font-bold text-[#6F4E37] mb-10">
Manage Recipes
</h1>


<a href="{{route('admin.recipes.create')}}"
class="bg-[#6F4E37] text-white px-6 py-3 rounded-full">

Create Recipe

</a>



<div class="mt-10 space-y-6">


@foreach($recipes as $recipe)


<div class="bg-white rounded-3xl shadow p-6">


<h2 class="text-xl font-bold text-[#6F4E37]">

{{$recipe->name}}

</h2>


<p>

Product:
{{$recipe->productVariant->product->name}}

-
{{$recipe->productVariant->size_or_weight}}

</p>


<div class="mt-4">

<a href="{{route('admin.recipes.show',$recipe->id)}}"
class="bg-[#6F4E37] text-white px-4 py-2 rounded">

View

</a>


<a href="{{route('admin.recipes.edit',$recipe->id)}}"
class="bg-gray-200 px-4 py-2 rounded">

Edit

</a>


<form method="POST"
action="{{route('admin.recipes.destroy',$recipe->id)}}"
class="inline">

@csrf
@method('DELETE')


<button
onclick="return confirm('Delete this recipe?')"
class="bg-red-500 text-white px-4 py-2 rounded">

Delete

</button>


</form>


</div>


</div>


@endforeach


</div>


</section>

@endsection