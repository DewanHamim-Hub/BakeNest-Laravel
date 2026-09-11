@extends('layouts.app')

@section('content')
    <section class="max-w-xl mx-auto px-6 py-20">
        <div class="bg-white rounded-3xl shadow p-10 text-center">
            <div class="w-20 h-20 mx-auto bg-green-100 rounded-full flex items-center justify-center">
                <span class="text-4xl">
                    ✔
                </span>
            </div>
            <h1 class="text-3xl font-bold text-[#6F4E37] mt-6">
                Payment Successful
            </h1>
            <p class="text-gray-600 mt-4">
                Your payment has been completed successfully.
            </p>
            <div class="mt-8 bg-[#FFF8F0] rounded-2xl p-5">
                <p>
                    Transaction Status:
                    <span class="font-bold text-green-600">
                        Success
                    </span>
                </p>
                <p class="mt-2">
                    Thank you for choosing BakeNest.
                </p>
            </div>
            <a href="/" class="inline-block mt-8 bg-[#6F4E37] text-white px-8 py-3 rounded-full">
                Back To Home
            </a>
        </div>
    </section>
@endsection