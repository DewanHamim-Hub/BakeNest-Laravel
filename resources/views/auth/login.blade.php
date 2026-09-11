@extends('layouts.guest')


@section('content')

<div class="min-h-screen bg-[#FDF6EE] flex items-center justify-center px-6">


    <div class="w-full max-w-md">


        <!-- Logo -->

        <div class="text-center mb-8">

            <div class="flex justify-center mb-4">

                <div class="bg-[#6F4E37] p-4 rounded-full">

                    <i data-lucide="cake"
                       class="text-white w-8 h-8"></i>

                </div>

            </div>


            <h1 class="text-4xl font-bold text-[#6F4E37]">

                BakeNest

            </h1>


            <p class="text-gray-600 mt-2">

                Freshly baked happiness every day.

            </p>


        </div>





        <!-- Card -->


        <div class="bg-white rounded-3xl shadow-xl p-8">


            <h2 class="text-2xl font-bold text-[#6F4E37] mb-6 text-center">

                Welcome Back

            </h2>



            <form method="POST" action="{{ route('login') }}">

                @csrf



                <!-- Email -->

                <div class="mb-5">

                    <label class="text-gray-700">

                        Email

                    </label>


                    <input 
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    required
                    class="w-full mt-2 rounded-xl border-gray-300 focus:ring-[#6F4E37] focus:border-[#6F4E37]"
                    >

                </div>





                <!-- Password -->

                <div class="mb-5">

                    <label class="text-gray-700">

                        Password

                    </label>


                    <input 
                    type="password"
                    name="password"
                    required
                    class="w-full mt-2 rounded-xl border-gray-300 focus:ring-[#6F4E37] focus:border-[#6F4E37]"
                    >

                </div>





                <div class="flex justify-between items-center mb-6">


                    <label class="flex items-center gap-2 text-sm">

                        <input type="checkbox"
                        name="remember">

                        Remember me

                    </label>



                    @if(Route::has('password.request'))

                    <a href="{{route('password.request')}}"
                    class="text-sm text-[#6F4E37]">

                        Forgot password?

                    </a>

                    @endif


                </div>





                <button
                class="w-full bg-[#6F4E37] text-white py-3 rounded-full hover:bg-[#5a3d2b] transition">


                    Login


                </button>




            </form>



            <p class="text-center mt-6 text-gray-600">


                Don't have an account?


                <a href="{{route('register')}}"
                class="text-[#6F4E37] font-semibold">

                    Register

                </a>


            </p>



        </div>



    </div>


</div>



<script>

lucide.createIcons();

</script>


@endsection