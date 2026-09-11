@extends('layouts.app')

@section('content')


<!-- Hero Section -->

<section class="bg-[#FFF8F0]">

    <div class="max-w-7xl mx-auto px-6 py-20 grid md:grid-cols-2 gap-12 items-center">


        <div>


            <h1 class="text-5xl md:text-6xl font-bold text-[#6F4E37] leading-tight">

                Freshly Baked
                <br>
                Happiness

            </h1>



            <p class="mt-6 text-lg text-gray-600">

                Premium cakes, breads, cookies and desserts
                crafted with love at BakeNest.

            </p>



            <a href="{{ route('products.index') }}"
               class="inline-block mt-8 bg-[#6F4E37] text-white px-8 py-3 rounded-full hover:bg-[#5a3d2c] transition">

                Explore Products

            </a>


        </div>




        <div>


            <img src="{{ asset('assets/images/hero-1.jpg') }}"
                 class="rounded-3xl shadow-xl w-full h-[420px] object-cover">


        </div>


    </div>

</section>




<!-- Featured Products -->

<section class="max-w-7xl mx-auto px-6 py-16">


    <div class="flex justify-between items-center mb-8">


        <h2 class="text-4xl font-bold text-[#6F4E37]">

            Our Best Sellers

        </h2>


        <a href="{{ route('products.index') }}"
           class="text-[#D4A373]">

            View All →

        </a>


    </div>




    <div class="grid md:grid-cols-4 gap-6">


        @foreach($featuredProducts as $product)


        <div class="bg-white rounded-3xl shadow hover:-translate-y-2 transition overflow-hidden">


            <img src="{{ asset('assets/images/'.$product->image) }}"
                 class="h-48 w-full object-cover">



            <div class="p-5">


                <h3 class="text-xl font-bold text-[#6F4E37]">

                    {{ $product->name }}

                </h3>


                <a href="{{ route('products.show',$product->id) }}"
                   class="inline-block mt-4 text-[#D4A373]">

                    View Details

                </a>


            </div>


        </div>


        @endforeach


    </div>


</section>





<!-- Custom Order Section -->

<section class="max-w-7xl mx-auto px-6 pb-16">


    <div class="bg-[#6F4E37] rounded-3xl p-10 text-center text-white">
        <h2 class="text-4xl font-bold">
            Create Your Dream Cake
        </h2>
        <p class="mt-4 text-lg">
            Birthday, wedding or special occasion?
            Order a custom cake designed for you.
        </p>
        <a href="{{route('custom-orders.index')}}"
           class="inline-block mt-6 bg-[#D4A373] px-8 py-3 rounded-full">
            Request Custom Order
        </a>
    </div>
</section>
@endsection