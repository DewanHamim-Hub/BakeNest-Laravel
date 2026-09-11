@extends('layouts.app')

@section('content')


<!-- Page Header -->

<section class="bg-[#FFF8F0] py-16">

    <div class="max-w-7xl mx-auto px-6 text-center">


        <h1 class="text-5xl font-bold text-[#6F4E37]">

            Our Bakery Collection

        </h1>


        <p class="mt-4 text-gray-600 text-lg">

            Explore our freshly baked cakes, breads, cookies and desserts.

        </p>


    </div>

</section>





<!-- Categories -->

<section class="max-w-7xl mx-auto px-6 py-8">


    <h2 class="text-3xl font-bold text-[#6F4E37] mb-6">

        Browse Categories

    </h2>



    <div class="flex flex-wrap gap-3">


        <button class="px-5 py-2 rounded-full bg-[#6F4E37] text-white">

            All

        </button>


        @foreach($categories as $category)


            <button 
                class="px-5 py-2 rounded-full bg-white shadow hover:bg-[#D4A373] hover:text-white transition">

                {{ $category->name }}

            </button>


        @endforeach


    </div>


</section>





<!-- Products -->

<section class="max-w-7xl mx-auto px-6 py-10">


    <div class="flex justify-between items-center mb-8">


        <h2 class="text-3xl font-bold text-[#6F4E37]">

            All Products

        </h2>


        <span class="text-gray-500">

            {{ $products->count() }} items available

        </span>


    </div>





    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8">



        @foreach($products as $product)



        <div class="bg-white rounded-3xl shadow-md overflow-hidden hover:-translate-y-2 transition duration-300">


            <img src="{{ asset('assets/images/'.$product->image) }}"
                 class="w-full h-64 object-cover">



            <div class="p-6">


                <p class="text-sm text-[#D4A373]">

                    {{ $product->category->name }}

                </p>



                <h3 class="text-2xl font-bold text-[#6F4E37] mt-2">

                    {{ $product->name }}

                </h3>



                <p class="text-gray-600 mt-3">

                    {{ $product->description }}

                </p>




                <a href="{{ route('products.show',$product->id) }}"
                   class="inline-block mt-5 bg-[#6F4E37] text-white px-6 py-2 rounded-full hover:bg-[#5a3d2c] transition">

                    View Details

                </a>


            </div>


        </div>



        @endforeach



    </div>


</section>



@endsection