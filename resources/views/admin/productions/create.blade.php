@extends('layouts.app')

@section('content')

<section class="max-w-4xl mx-auto px-6 py-12">

        <h1 class="text-4xl font-bold text-[#6F4E37] mb-10">
        Create Production
        </h1>

    <form method="POST" action="{{ route('admin.productions.store') }}">

        @csrf

        <div class="bg-white rounded-3xl shadow p-8 space-y-6">
            <div>
                <label class="font-semibold">
                    Product Variant
                </label>
                <select name="product_variant_id" class="w-full border rounded-xl p-3 mt-2">
                    <option value="">
                        Select Product
                    </option>

                    @foreach($productVariants as $variant)

                        <option value="{{ $variant->id }}">
                            {{ $variant->product->name }} - {{ $variant->size_or_weight }}
                            (Current Stock:{{ $variant->stock_quantity }})
                        </option>

                    @endforeach
                </select>
            </div>

            <div>
                <label class="font-semibold">
                    Production Quantity
                </label>
                <input type="number" name="quantity" min="1" class="w-full border rounded-xl p-3 mt-2" placeholder="Example: 20">
            </div>

            <div>
                <label class="font-semibold">
                Production Date
                </label>
                <input type="date" name="production_date" value="{{ date('Y-m-d') }}" class="w-full border rounded-xl p-3 mt-2">
            </div>

            <div>
                <label class="font-semibold">
                    Notes
                </label>
                <textarea name="notes" rows="4" class="w-full border rounded-xl p-3 mt-2" placeholder="Optional notes">

                </textarea>
            </div>
            <div class="flex gap-4">
                <button type="submit" class="bg-[#6F4E37] text-white px-8 py-3 rounded-full hover:bg-[#5a3d2b] transition">
                    Create Production
                </button>
                <a href="{{ route('admin.productions.index') }}" class="bg-gray-200 text-[#6F4E37] px-8 py-3 rounded-full hover:bg-gray-300 transition">
                    Cancel
                </a>
            </div>
        </div>
    </form>
</section>
@endsection