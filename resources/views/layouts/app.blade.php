<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        {{ config('app.name', 'BakeNest') }}
    </title>


    <!-- Google Fonts -->

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">


    <!-- Tailwind CDN -->

    <script src="https://cdn.tailwindcss.com"></script>


    <style>

        body {
            font-family: 'Inter', sans-serif;
        }

        h1, h2, h3 {
            font-family: 'Playfair Display', serif;
        }

    </style>

</head>



<body class="bg-[#FFF8F0] text-[#2D2424] min-h-screen flex flex-col">



    <!-- Navigation -->

    @if(auth()->check() && auth()->user()->role === 'admin')

        @include('layouts.admin-nav')

    @else

        @include('layouts.customer-nav')

    @endif





    <!-- Main Content -->

    <main class="flex-grow">

        @yield('content')

    </main>





    <!-- Footer -->

    <footer class="bg-[#6F4E37] text-white py-8 text-center mt-16">


        <h3 class="text-2xl">

            BakeNest

        </h3>


        <p class="mt-2">

            Freshly baked happiness every day.

        </p>


    </footer>



</body>

</html>