@extends('layouts.app')

@section('content')

<section class="max-w-7xl mx-auto px-6 py-12">

    <h1 class="text-4xl font-bold text-[#6F4E37] mb-10">
        Inventory Transaction History
    </h1>

    <div class="bg-white rounded-3xl shadow overflow-hidden">
        <table class="w-full text-left">
            <thead class="bg-[#6F4E37] text-white">
                <tr>
                    <th class="p-4">
                        Date
                    </th>

                    <th class="p-4">
                        Item
                    </th>

                    <th class="p-4">
                        Type
                    </th>

                    <th class="p-4">
                        Quantity
                    </th>

                    <th class="p-4">
                        Reference
                    </th>
                    
                    <th class="p-4">
                        Notes
                    </th>
                </tr>
            </thead>
            <tbody>

                @forelse($transactions as $transaction)

                    <tr class="border-b">
                        <td class="p-4">
                            {{ $transaction->created_at->format('d M Y') }}
                        </td>

                        <td class="p-4">
                            @if($transaction->ingredient)
                            {{ $transaction->ingredient->name }}
                            ({{ $transaction->ingredient->unit }})
                            @elseif($transaction->productVariant)
                            {{ $transaction->productVariant->product->name }} - {{ $transaction->productVariant->size_or_weight }}
                            @endif
                        </td>

                        <td class="p-4 font-semibold">
                            {{ $transaction->type }}
                        </td>

                        <td class="p-4">
                            {{ $transaction->quantity }}
                            @if($transaction->ingredient)
                            {{ $transaction->ingredient->unit }}
                            @endif
                        </td>

                        <td class="p-4">
                            @if($transaction->reference_type) {{ $transaction->reference_type }} #{{ $transaction->reference_id }}
                            @else - @endif
                        </td>

                        <td class="p-4">
                            {{ $transaction->notes ?? '-' }}
                        </td>
                    </tr>

                    @empty

                        <tr>
                            <td colspan="6" class="p-8 text-center text-gray-500">
                                No transactions found.
                            </td>
                        </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</section>
@endsection