<!-- SideNavBar Component -->
<aside class="h-screen w-64 border-r-0 rounded-r-3xl sticky top-0 left-0 bg-slate-50 dark:bg-slate-900 flex flex-col p-4 z-50">
    <div class="mb-10 px-4">
        <h1 class="text-xl font-bold text-slate-800 dark:text-white tracking-tighter">Kids World</h1>
        <p class="text-[10px] uppercase tracking-widest text-slate-400 font-bold">Affiliate Platform</p>
    </div>
    <nav class="flex-1 space-y-1">
        <!-- Dashboard -->
        <a class="flex items-center gap-3 px-4 py-3 {{ request()->routeIs('admin.dashboard') ? 'bg-white dark:bg-slate-800 text-blue-600 dark:text-blue-400 rounded-xl shadow-sm' : 'text-slate-500 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800/80' }} font-['Plus_Jakarta_Sans'] font-medium text-sm tracking-tight transition-all scale-98 active:opacity-80" href="{{ route('admin.dashboard') }}">
            <span class="material-symbols-outlined">dashboard</span>
            Dashboard
        </a>
        <!-- Products -->
        <a class="flex items-center gap-3 px-4 py-3 {{ request()->routeIs('admin.products') ? 'bg-white dark:bg-slate-800 text-blue-600 dark:text-blue-400 rounded-xl shadow-sm' : 'text-slate-500 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800/80' }} font-['Plus_Jakarta_Sans'] font-medium text-sm tracking-tight transition-all scale-98 active:opacity-80" href="{{ route('admin.products') }}">
            <span class="material-symbols-outlined">inventory_2</span>
            Products
        </a>
        <!-- Users -->
        <a class="flex items-center gap-3 px-4 py-3 {{ request()->routeIs('admin.users') ? 'bg-white dark:bg-slate-800 text-blue-600 dark:text-blue-400 rounded-xl shadow-sm' : 'text-slate-500 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800/80' }} font-['Plus_Jakarta_Sans'] font-medium text-sm tracking-tight transition-all scale-98 active:opacity-80" href="{{ route('admin.users') }}">
            <span class="material-symbols-outlined">group</span>
            Users
        </a>
        <!-- Roles -->
        <a class="flex items-center gap-3 px-4 py-3 {{ request()->routeIs('admin.roles') ? 'bg-white dark:bg-slate-800 text-blue-600 dark:text-blue-400 rounded-xl shadow-sm' : 'text-slate-500 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800/80' }} font-['Plus_Jakarta_Sans'] font-medium text-sm tracking-tight transition-all scale-98 active:opacity-80" href="{{ route('admin.roles') }}">
            <span class="material-symbols-outlined">admin_panel_settings</span>
            Roles
        </a>
        <!-- TikTok Tracker -->
        <a class="flex items-center gap-3 px-4 py-3 {{ request()->routeIs('admin.tiktok') ? 'bg-white dark:bg-slate-800 text-blue-600 dark:text-blue-400 rounded-xl shadow-sm' : 'text-slate-500 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800/80' }} font-['Plus_Jakarta_Sans'] font-medium text-sm tracking-tight transition-all scale-98 active:opacity-80" href="{{ route('admin.tiktok') }}">
            <span class="material-symbols-outlined">movie_filter</span>
            TikTok Tracker
        </a>
        <!-- Analytics -->
        <a class="flex items-center gap-3 px-4 py-3 {{ request()->routeIs('admin.analytics') ? 'bg-white dark:bg-slate-800 text-blue-600 dark:text-blue-400 rounded-xl shadow-sm' : 'text-slate-500 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800/80' }} font-['Plus_Jakarta_Sans'] font-medium text-sm tracking-tight transition-all scale-98 active:opacity-80" href="{{ route('admin.analytics') }}">
            <span class="material-symbols-outlined">analytics</span>
            Analytics
        </a>
        <!-- Logs -->
        <a class="flex items-center gap-3 px-4 py-3 {{ request()->routeIs('admin.logs') ? 'bg-white dark:bg-slate-800 text-blue-600 dark:text-blue-400 rounded-xl shadow-sm' : 'text-slate-500 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800/80' }} font-['Plus_Jakarta_Sans'] font-medium text-sm tracking-tight transition-all scale-98 active:opacity-80" href="{{ route('admin.logs') }}">
            <span class="material-symbols-outlined">history</span>
            Activity Logs
        </a>
    </nav>
    <div class="px-2 mt-auto pt-6 border-t border-slate-100 dark:border-slate-800">
        <a class="text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800 rounded-xl px-4 py-3 flex items-center gap-3 hover:translate-x-1 transition-transform duration-200" href="#">
            <span class="material-symbols-outlined">help</span>
            <span class="text-sm font-medium">Support</span>
        </a>
        <a class="text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800 rounded-xl px-4 py-3 flex items-center gap-3 hover:translate-x-1 transition-transform duration-200" href="#">
            <span class="material-symbols-outlined">logout</span>
            <span class="text-sm font-medium">Sign Out</span>
        </a>
    </div>

    <div class="mt-4 p-4 bg-blue-50 dark:bg-blue-900/20 rounded-2xl">
        <p class="text-xs font-semibold text-blue-700 dark:text-blue-300 mb-2">Upgrade Plan</p>
        <p class="text-[10px] text-blue-600/70 dark:text-blue-400/70 mb-3 leading-tight">Get advanced TikTok insights and custom tracking links.</p>
        <button class="w-full py-2 bg-blue-600 text-white rounded-lg text-xs font-bold shadow-md shadow-blue-200">Upgrade Now</button>
    </div>
</aside>
