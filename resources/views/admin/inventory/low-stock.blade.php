@extends('layouts.app')


@section('content')


<section class="max-w-6xl mx-auto px-6 py-12">


<h1 class="text-4xl font-bold text-[#6F4E37] mb-10">

Low Stock Ingredients

</h1>



<div class="bg-white rounded-3xl shadow overflow-hidden">


<table class="w-full">


<thead class="bg-[#6F4E37] text-white">


<tr>


<th class="p-4 text-left">
Ingredient
</th>


<th class="p-4 text-left">
Current Stock
</th>


<th class="p-4 text-left">
Minimum Required
</th>


<th class="p-4 text-left">
Unit
</th>


</tr>
</thead>

    <tbody>
        @forelse($ingredients as $ingredient)
            <tr class="border-b">
                <td class="p-4 font-semibold">
                    {{ $ingredient->name }}
                </td>
                <td class="p-4 text-red-600 font-bold">
                    {{ $ingredient->current_stock }}
                </td>

                <td class="p-4">
                    {{ $ingredient->minimum_stock }}
                </td>

                <td class="p-4">
                    {{ $ingredient->unit }}
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="p-8 text-center text-gray-500">
                    No low stock ingredients.
                </td>
            </tr>
        @endforelse
    </tbody>
</table>
</div>
</section>
@endsection