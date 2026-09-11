<nav class="bg-[#6F4E37] text-white shadow-lg">

    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
    
        <!-- Logo -->
        <a href="{{ route('admin.dashboard') }}"
        class="flex items-center gap-3 text-2xl font-bold">
            <i data-lucide="cake"></i>
            BakeNest Admin
        </a>
    
        <!-- Menu -->
        <div class="flex items-center gap-6 text-sm font-medium">
            <a href="{{ route('admin.dashboard') }}"
            class="flex items-center gap-2 hover:text-[#D4A373]">
                <i data-lucide="layout-dashboard" class="w-4"></i>
                Dashboard
            </a>

            <a href="{{ route('admin.products.index') }}"
            class="flex items-center gap-2 hover:text-[#D4A373]">
                <i data-lucide="package"></i>
                Products
            </a>
        
            <a href="{{ route('admin.orders.index') }}"
            class="flex items-center gap-2 hover:text-[#D4A373]">
                <i data-lucide="shopping-bag"></i>
                Orders
            </a>

            <a href="{{ route('admin.customers.index') }}"
            class="flex items-center gap-2 hover:text-[#D4A373]">
                <i data-lucide="users"></i>
                Customers
            </a>

            <a href="{{ route('admin.inventory.index') }}"
            class="flex items-center gap-2 hover:text-[#D4A373]">
                <i data-lucide="warehouse"></i>
                Inventory
            </a>

            <a href="{{ route('admin.recipes.index') }}"
            class="flex items-center gap-2 hover:text-[#D4A373]">
                <i data-lucide="chef-hat"></i>
                Recipes
            </a>

            <a href="{{ route('admin.productions.index') }}"
            class="flex items-center gap-2 hover:text-[#D4A373]">
                <i data-lucide="factory"></i> 
                Production
            </a>

            <a href="{{ route('admin.reports.index') }}"
            class="flex items-center gap-2 hover:text-[#D4A373]">
                <i data-lucide="chart-column"></i>
                Reports
            </a>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="flex items-center gap-2 hover:text-[#D4A373]">
                    <i data-lucide="log-out"></i>
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