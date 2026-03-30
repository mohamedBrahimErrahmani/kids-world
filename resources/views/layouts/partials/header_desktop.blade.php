<!-- Desktop Navigation Shell -->
<nav class="docked full-width top-0 sticky z-50 bg-white/80 backdrop-blur-xl shadow-sm">
    <div class="flex justify-between items-center w-full px-8 py-4 max-w-screen-2xl mx-auto">
        <div class="text-2xl font-black text-sky-800 tracking-tighter font-headline">Kids World</div>
        <div class="hidden md:flex items-center space-x-8">
            <a class="{{ request()->routeIs('home.desktop') ? 'text-sky-700 font-bold border-b-2 border-sky-600 pb-1' : 'text-slate-500 hover:text-sky-600' }} transition-colors font-body text-sm" href="{{ route('home.desktop') }}">Playrooms</a>
            <a class="text-slate-500 hover:text-sky-600 transition-colors font-body text-sm" href="#">Nursery</a>
            <a class="{{ request()->is('#trending') ? 'text-sky-700 font-bold border-b-2 border-sky-600 pb-1' : 'text-slate-500 hover:text-sky-600' }} transition-colors font-body text-sm" href="{{ route('home') }}#trending">Trending</a>
            <a class="{{ request()->routeIs('category.desktop') ? 'text-sky-700 font-bold border-b-2 border-sky-600 pb-1' : 'text-slate-500 hover:text-sky-600' }} transition-colors font-body text-sm" href="{{ route('category.desktop') }}">Toys</a>
            <a class="text-slate-500 hover:text-sky-600 transition-colors font-body text-sm" href="#">Gifts</a>
        </div>
        <div class="flex items-center space-x-6">
            <div class="hidden lg:flex items-center bg-surface-container-highest rounded-full px-4 py-2 w-64">
                <span class="material-symbols-outlined text-on-surface-variant text-sm">search</span>
                <input class="bg-transparent border-none focus:ring-0 text-sm w-full font-body" placeholder="Search curated picks..." type="text">
            </div>
            <div class="flex space-x-4 text-on-surface-variant">
                <span class="material-symbols-outlined hover:bg-sky-50 p-2 rounded-full cursor-pointer transition-all">shopping_basket</span>
                <span class="material-symbols-outlined hover:bg-sky-50 p-2 rounded-full cursor-pointer transition-all">favorite</span>
                <span class="material-symbols-outlined hover:bg-sky-50 p-2 rounded-full cursor-pointer transition-all">account_circle</span>
            </div>
            <button class="bg-gradient-to-b from-primary to-primary-container text-on-primary px-6 py-2.5 rounded-xl font-bold text-sm shadow-sm hover:brightness-105 active:scale-95 transition-all">
                Sign Up
            </button>
        </div>
    </div>
</nav>
