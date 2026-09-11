@extends('layouts.guest')


@section('content')


<div class="min-h-screen bg-[#FDF6EE] flex items-center justify-center px-6">


<div class="w-full max-w-md">



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


<p class="text-gray-600">

Create your bakery account

</p>


</div>





<div class="bg-white rounded-3xl shadow-xl p-8">


<h2 class="text-2xl font-bold text-[#6F4E37] mb-6 text-center">

Register

</h2>




<form method="POST" action="{{route('register')}}">

@csrf



<div class="mb-4">

<label>Name</label>

<input 
type="text"
name="name"
required
class="w-full mt-2 rounded-xl border-gray-300"
>

</div>





<div class="mb-4">

<label>Email</label>

<input 
type="email"
name="email"
required
class="w-full mt-2 rounded-xl border-gray-300"
>

</div>





<div class="mb-4">

<label>Password</label>

<input 
type="password"
name="password"
required
class="w-full mt-2 rounded-xl border-gray-300"
>

</div>





<div class="mb-6">

<label>Confirm Password</label>

<input 
type="password"
name="password_confirmation"
required
class="w-full mt-2 rounded-xl border-gray-300"
>

</div>





<button
class="w-full bg-[#6F4E37] text-white py-3 rounded-full hover:bg-[#5a3d2b] transition">


Create Account


</button>



</form>



<p class="text-center mt-6 text-gray-600">


Already have an account?


<a href="{{route('login')}}"
class="text-[#6F4E37] font-semibold">

Login

</a>


</p>



</div>



</div>


</div>



<script>

lucide.createIcons();

</script>


@endsection