<!-- BottomNavBar (Mobile Only) -->
<nav class="md:hidden fixed bottom-0 left-0 w-full flex justify-around items-center px-4 pb-6 pt-3 bg-white/90 dark:bg-slate-900/90 backdrop-blur-lg shadow-[0_-10px_40px_rgba(0,0,0,0.05)] z-50">
    <a class="flex flex-col items-center justify-center {{ request()->is('/') ? 'bg-sky-100 dark:bg-sky-900/40 text-sky-800 dark:text-sky-200 rounded-[2rem]' : 'text-slate-400 dark:text-slate-500' }} px-5 py-2 transition-all" href="{{ route('home') }}">
        <span class="material-symbols-outlined" data-icon="home_app_logo">home_app_logo</span>
        <span class="font-['Be_Vietnam_Pro'] text-[11px] font-semibold uppercase tracking-wider mt-1">Home</span>
    </a>
    <a class="flex flex-col items-center justify-center {{ request()->is('category*') ? 'bg-sky-100 dark:bg-sky-900/40 text-sky-800 dark:text-sky-200 rounded-[2rem]' : 'text-slate-400 dark:text-slate-500' }} px-5 py-2 hover:bg-slate-50 dark:hover:bg-slate-800 transition-all" href="{{ route('category') }}">
        <span class="material-symbols-outlined" data-icon="grid_view">grid_view</span>
        <span class="font-['Be_Vietnam_Pro'] text-[11px] font-semibold uppercase tracking-wider mt-1">Categories</span>
    </a>
    <a class="flex flex-col items-center justify-center text-slate-400 dark:text-slate-500 px-5 py-2 hover:bg-slate-50 dark:hover:bg-slate-800 transition-all" href="#">
        <span class="material-symbols-outlined" data-icon="auto_awesome">auto_awesome</span>
        <span class="font-['Be_Vietnam_Pro'] text-[11px] font-semibold uppercase tracking-wider mt-1">Trending</span>
    </a>
    <a class="flex flex-col items-center justify-center {{ request()->is('blog*') ? 'bg-sky-100 dark:bg-sky-900/40 text-sky-800 dark:text-sky-200 rounded-[2rem]' : 'text-slate-400 dark:text-slate-500' }} px-5 py-2 hover:bg-slate-50 dark:hover:bg-slate-800 transition-all" href="{{ route('blog') }}">
        <span class="material-symbols-outlined" data-icon="menu_book">menu_book</span>
        <span class="font-['Be_Vietnam_Pro'] text-[11px] font-semibold uppercase tracking-wider mt-1">Guides</span>
    </a>
</nav>
