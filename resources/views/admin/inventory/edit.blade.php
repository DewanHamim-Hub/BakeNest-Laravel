@extends('layouts.app')

@section('content')


<section class="max-w-5xl mx-auto px-6 py-12">


    <div class="flex justify-between items-center mb-10">
        <h1 class="text-4xl font-bold text-[#6F4E37]">
            Edit Ingredient
        </h1>
        <a href="{{ route('admin.inventory.index') }}"
           class="bg-gray-200 text-[#6F4E37] px-6 py-3 rounded-full hover:bg-gray-300 transition flex items-center gap-2">
            <i data-lucide="arrow-left"></i>
            Back to Inventory
        </a>
    </div>

<form method="POST" action="{{ route('admin.inventory.update',$ingredient->id) }}">
@csrf
@method('PUT')

<div class="bg-white rounded-3xl shadow-lg p-10">

    <input name="name" value="{{ $ingredient->name }}" class="w-full border rounded-xl p-3 mb-5">

    <input name="unit" value="{{ $ingredient->unit }}" class="w-full border rounded-xl p-3 mb-5">

    <input name="current_stock" value="{{ $ingredient->current_stock }}" class="w-full border rounded-xl p-3 mb-5">

    <input name="minimum_stock" value="{{ $ingredient->minimum_stock }}" class="w-full border rounded-xl p-3 mb-5">

    <div class="flex gap-4">

        <button
        type="submit"
        class="bg-[#6F4E37] text-white px-8 py-3 rounded-full hover:bg-[#5a3d2b] transition">
            Update Ingredient
        </button>
        
        <a href="{{ route('admin.inventory.index') }}"
        class="bg-gray-200 text-[#6F4E37] px-8 py-3 rounded-full hover:bg-gray-300 transition">
            Cancel    
        </a>
    </div>

</div>

</form>
</section>
@endsection