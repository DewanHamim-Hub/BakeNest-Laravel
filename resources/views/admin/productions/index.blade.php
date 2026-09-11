@extends('layouts.app')

@section('content')

<section class="max-w-6xl mx-auto px-6 py-12">

    <h1 class="text-4xl font-bold text-[#6F4E37] mb-10">
        Production History
    </h1>
    <a href="{{ route('admin.productions.create') }}" class="bg-[#6F4E37] text-white px-6 py-3 rounded-full">
        Create Production
    </a>

    @if(session('success'))

    <div class="mt-6 bg-green-100 text-green-700 p-4 rounded-xl">
        {{ session('success') }}
    </div>

    @endif

    <div class="mt-10 space-y-6">

        @forelse($productions as $production)

        <div class="bg-white rounded-3xl shadow p-6">
            <div class="flex justify-between">
                <div>
                    <h2 class="text-xl font-bold text-[#6F4E37]">
                        {{ $production->productVariant->product->name }}
                    </h2>
                    <p class="text-gray-600">
                        Variant:
                        {{ $production->productVariant->size_or_weight }}
                    </p>
                    <p class="text-gray-600">
                        Quantity Produced:
                        {{ $production->quantity }}
                    </p>
                </div>

                <div class="text-right">
                    <p>
                        Date:
                        {{ $production->production_date }}
                    </p>
                    <p class="text-gray-600">
                        Created:
                        {{ $production->created_at->format('d M Y') }}
                    </p>
                </div>
            </div>

            @if($production->notes)

                <div class="mt-4 border-t pt-4">
                    <p>
                        Notes:
                        {{ $production->notes }}
                    </p>
                </div>

            @endif

        </div>

        @empty

            <div class="bg-white rounded-3xl shadow p-8 text-center">
                <h2 class="text-xl text-gray-600">
                    No production records found.
                </h2>
            </div>

        @endforelse

    </div>
</section>
@endsection