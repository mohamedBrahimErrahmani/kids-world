<!-- Footer Shell Desktop -->
<footer class="full-width mt-auto bg-slate-100 py-16 px-12 border-none">
    <div class="grid grid-cols-2 md:grid-cols-4 gap-8 w-full max-w-screen-2xl mx-auto">
        <div>
            <div class="text-xl font-bold text-slate-800 mb-6 font-headline">Kids World</div>
            <p class="text-slate-500 text-sm leading-relaxed mb-6 font-body">Curated with love for modern parents who value quality over quantity.</p>
            <div class="flex space-x-4">
                <span class="material-symbols-outlined text-slate-400 hover:text-primary cursor-pointer">social_leaderboard</span>
                <span class="material-symbols-outlined text-slate-400 hover:text-primary cursor-pointer">camera</span>
                <span class="material-symbols-outlined text-slate-400 hover:text-primary cursor-pointer">play_circle</span>
            </div>
        </div>
        <div class="space-y-4">
            <h4 class="font-bold text-slate-800 text-sm font-headline">Quick Links</h4>
            <ul class="space-y-2">
                <li><a class="text-slate-500 hover:text-sky-500 transition-colors text-sm font-body" href="{{ route('home.desktop') }}">About Us</a></li>
                <li><a class="text-slate-500 hover:text-sky-500 transition-colors text-sm font-body" href="#">Sustainability</a></li>
                <li><a class="text-slate-500 hover:text-sky-500 transition-colors text-sm font-body" href="#">Contact</a></li>
            </ul>
        </div>
        <div class="space-y-4">
            <h4 class="font-bold text-slate-800 text-sm font-headline">Resources</h4>
            <ul class="space-y-2">
                <li><a class="text-slate-500 hover:text-sky-500 transition-colors text-sm font-body" href="{{ route('blog.desktop') }}">Parenting Guides</a></li>
                <li><a class="text-slate-500 hover:text-sky-500 transition-colors text-sm font-body" href="#">Affiliate Disclosure</a></li>
                <li><a class="text-slate-500 hover:text-sky-500 transition-colors text-sm font-body" href="#">Privacy Policy</a></li>
            </ul>
        </div>
        <div class="space-y-4">
            <h4 class="font-bold text-slate-800 text-sm font-headline">Contact</h4>
            <p class="text-slate-500 text-sm font-body">hello@kidsworld.co</p>
            <p class="text-slate-500 text-sm font-body">123 Playroom Ave,<br>Digital District</p>
        </div>
    </div>
    <div class="max-w-screen-2xl mx-auto mt-16 pt-8 border-t border-slate-200 text-center">
        <p class="text-slate-400 text-xs font-body">© {{ date('Y') }} Kids World. Curated with love for modern parents.</p>
    </div>
</footer>
