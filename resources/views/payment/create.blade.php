@extends('layouts.app')


@section('content')


<section class="max-w-5xl mx-auto px-6 py-12">

<h1 class="text-4xl font-bold text-[#6F4E37] mb-10 text-center">
BakeNest Secure Payment
</h1>
@if(session('error'))

<div class="bg-red-100 text-red-700 p-4 rounded-xl mb-6">

{{ session('error') }}

</div>

@endif






<div class="grid md:grid-cols-2 gap-8">





<!-- Payment Summary -->


<div class="bg-white rounded-3xl shadow p-8">


<h2 class="text-2xl font-bold text-[#6F4E37] mb-6">

Order Summary

</h2>



<div class="space-y-4">



<p class="text-gray-600">

Payment Type

</p>


<p class="font-semibold">

{{ ucfirst($type) }}

</p>





<p class="text-gray-600 mt-4">

Amount Payable

</p>



<p class="text-3xl font-bold text-[#6F4E37]">

{{ number_format($amount,2) }} BDT

</p>



</div>





<div class="mt-8 bg-[#FFF8F0] rounded-2xl p-5">


<h3 class="font-bold text-[#6F4E37]">

Demo Payment Credentials

</h3>


<p class="text-sm mt-3">

Card:
<span class="font-semibold">

4242 4242 4242

</span>

</p>


<p class="text-sm">

Expiry:

<span class="font-semibold">

12/28

</span>

</p>


<p class="text-sm">

CVV:

<span class="font-semibold">

123

</span>

</p>


<p class="text-sm">

OTP:

<span class="font-semibold">

111111

</span>

</p>



<hr class="my-4">



<p class="text-sm">

Other demo cards:

</p>


<p class="text-sm">

5555 5555 5555

</p>


<p class="text-sm">

4111 1111 1111

</p>


</div>





</div>









<!-- Payment Form -->


<div class="bg-white rounded-3xl shadow p-8">



<h2 class="text-2xl font-bold text-[#6F4E37] mb-6">

Card Payment

</h2>






<form method="POST"

action="{{ route('payment.process') }}">


@csrf




<input type="hidden"

name="type"

value="{{ $type }}">



<input type="hidden"

name="id"

value="{{ $payable->id }}">








<div class="space-y-5">





<div>

<label class="font-semibold">

Card Number

</label>


<input type="text"

name="card_number"

placeholder="4242 4242 4242"

class="w-full border rounded-xl p-3 mt-2">


</div>

    <div class="grid grid-cols-2 gap-4">
        <div>
            <label class="font-semibold">
                Expiry
            </label>
            <input type="text" name="expiry" placeholder="12/28" class="w-full border rounded-xl p-3 mt-2">
        </div>

        <div>
            <label class="font-semibold">
                CVV
            </label>
            <input type="password" name="cvv" placeholder="123" class="w-full border rounded-xl p-3 mt-2">
        </div>
    </div>

    <div>
        <label class="font-semibold">
            OTP Verification
        </label>
        <input type="text" name="otp" placeholder="Enter OTP" class="w-full border rounded-xl p-3 mt-2">
    </div>
    <button class="w-full bg-[#6F4E37] text-white py-3 rounded-full text-lg font-semibold hover:bg-[#5c3f2c] transition">
        Pay {{ number_format($amount,2) }} BDT
    </button>
</div>
</form>
    <div class="mt-6 text-center text-sm text-gray-500">
        🔒 Secure demo payment gateway powered by BakeNest
    </div>
</div>
</div>
</section>
@endsection