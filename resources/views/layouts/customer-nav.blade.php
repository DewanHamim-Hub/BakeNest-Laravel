<nav class="bg-[#6F4E37] text-white shadow-md">

    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">

        <!-- Logo -->
        <a href="{{ route('home') }}"
           class="flex items-center gap-3 text-2xl font-bold">

            <i data-lucide="cake"></i>

            <span>
                BakeNest
            </span>

        </a>


        <!-- Menu -->
        <div class="flex items-center gap-7 text-sm font-medium">


            <a href="{{ route('home') }}"
               class="flex items-center gap-2 hover:text-[#F5E6D3] transition">

                <i data-lucide="house" class="w-4 h-4"></i>
                Home

            </a>


            <a href="{{ route('products.index') }}"
               class="flex items-center gap-2 hover:text-[#F5E6D3] transition">

                <i data-lucide="shopping-bag" class="w-4 h-4"></i>
                Products

            </a>


            <a href="{{ route('cart.index') }}"
               class="flex items-center gap-2 hover:text-[#F5E6D3] transition">

                <i data-lucide="shopping-cart" class="w-4 h-4"></i>
                Cart

            </a>


            <a href="{{ route('orders.history') }}"
               class="flex items-center gap-2 hover:text-[#F5E6D3] transition">

                <i data-lucide="clipboard-list" class="w-4 h-4"></i>
                My Orders

            </a>


            <a href="{{ route('custom-orders.index') }}"
               class="flex items-center gap-2 hover:text-[#F5E6D3] transition">

                <i data-lucide="cake-slice" class="w-4 h-4"></i>
                Custom Orders

            </a>


            <!-- User -->
            <div class="flex items-center gap-2 text-[#F5E6D3]">
                <i data-lucide="user-circle"
                   class="w-5 h-5"></i>
                @auth
                    {{ auth()->user()->name }}
                @else
                    Guest
                @endauth
            </div>

            <form method="POST" action="{{ route('logout') }}">

                @csrf

                <button
                class="flex items-center gap-2 text-red-200 hover:text-red-400 transition">

                    <i data-lucide="log-out"
                       class="w-4 h-4"></i>

                    Logout
                </button>
            </form>
        </div>
    </div>
</nav>

<script src="https://unpkg.com/lucide@latest"></script>

<script>
    lucide.createIcons();
</script>