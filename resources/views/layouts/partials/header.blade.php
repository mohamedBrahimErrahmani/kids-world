<!-- TopAppBar -->
<header class="fixed top-0 w-full z-50 bg-white/80 dark:bg-slate-900/80 backdrop-blur-xl shadow-sm dark:shadow-none">
    <div class="flex justify-between items-center px-6 py-4 max-w-7xl mx-auto">
        <div class="flex items-center gap-4">
            <span class="material-symbols-outlined text-sky-700 dark:text-sky-400" data-icon="search">search</span>
            <span class="text-2xl font-black text-sky-800 dark:text-sky-300 tracking-tighter font-headline">Kids
                World</span>
        </div>
        <nav class="hidden md:flex gap-8 items-center">
            <a class="{{ request()->is('/') ? 'text-sky-700 dark:text-sky-400 font-bold border-b-2 border-sky-600' : 'text-slate-500 dark:text-slate-400 font-medium hover:text-sky-600 dark:hover:text-sky-300' }} transition-colors font-headline"
                href="{{ route('home') }}">Home</a>
            <a class="{{ request()->routeIs('category') ? 'text-sky-700 dark:text-sky-400 font-bold border-b-2 border-sky-600' : 'text-slate-500 dark:text-slate-400 font-medium hover:text-sky-600 dark:hover:text-sky-300' }} transition-colors font-headline"
                href="{{ route('category') }}">Categories</a>
            <a class="{{ request()->is('#trending') ? 'text-sky-700 dark:text-sky-400 font-bold border-b-2 border-sky-600' : 'text-slate-500 dark:text-slate-400 font-medium hover:text-sky-600 dark:hover:text-sky-300' }} transition-colors font-headline"
                href="{{ route('home') }}#trending">Trending</a>
            <a class="{{ request()->is('blog*') ? 'text-sky-700 dark:text-sky-400 font-bold border-b-2 border-sky-600' : 'text-slate-500 dark:text-slate-400 font-medium hover:text-sky-600 dark:hover:text-sky-300' }} transition-colors font-headline"
                href="{{ route('blog.index') }}">Guides</a>
        </nav>
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-full bg-surface-container-highest overflow-hidden">
                <img alt="Parent Profile" class="w-full h-full object-cover"
                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuBB7EgxsXHDuIh7tGbSsQapLAwoHMCO7JU6YeTaxU_hhJJqkZaNcJRM8vpIYD-CEUBTI5de14ZZfLVUGcxPeqzUmqUDRZeXj5k-SFdB_lTdoOcnZGJMcHIv0wLsgi3mB1HQXyAbPYgU6VTrGQ_v4DbfFWo5zjASowGdnBn-SoXsUOGgz7CZIbdLD4wqKPSKZeHKCqExYzKppMk3eO64pHY4i7PgSsSdsRwZc6lAxVli9__0Kj7vJLnXLcQ95PK2bQCtVmeR3ful6w" />
            </div>
        </div>
    </div>
</header>