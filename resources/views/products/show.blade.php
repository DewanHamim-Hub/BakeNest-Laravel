@extends('layouts.app')

@section('content')


<section class="max-w-7xl mx-auto px-6 py-16">


    <div class="grid md:grid-cols-2 gap-12 items-start">


        <!-- Product Image -->

        <div>

            <img src="{{ asset('assets/images/'.$product->image) }}"
                 class="rounded-3xl shadow-xl w-full h-[500px] object-cover">

        </div>





        <!-- Product Details -->

        <div>


            <p class="text-[#D4A373] font-semibold">

                {{ $product->category->name }}

            </p>



            <h1 class="text-5xl font-bold text-[#6F4E37] mt-3">

                {{ $product->name }}

            </h1>



            <p class="mt-6 text-gray-600 text-lg">

                {{ $product->description }}

            </p>




            <h2 class="text-2xl font-bold text-[#6F4E37] mt-8">

                Choose Size

            </h2>




            <div class="mt-4 space-y-3">


                @foreach($product->productVariants as $variant)


                <div class="bg-white rounded-xl shadow p-4 flex justify-between items-center">


                    <div>

                        <h3 class="font-semibold">

                            {{ $variant->size_or_weight }}

                        </h3>


                        <p class="text-gray-500">

                            Stock:
                            {{ $variant->stock_quantity }}

                        </p>

                    </div>




                    <div class="text-right">


                        <p class="text-xl font-bold text-[#6F4E37]">

                            {{ number_format($variant->price) }} BDT

                        </p>


                        <form method="POST" action="{{ route('cart.add', $variant->id) }}">

                            @csrf
                        
                            <button
                                class="mt-2 bg-[#6F4E37] text-white px-5 py-2 rounded-full hover:bg-[#5a3d2c] transition">
                        
                                Add To Cart
                        
                            </button>
                        
                        </form>


                    </div>


                </div>


                @endforeach


            </div>


        </div>


    </div>


</section>


@endsection