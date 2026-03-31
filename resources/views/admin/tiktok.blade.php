@extends('layouts.admin')

@section('title', 'TikTok Tracker | Kids World Admin')

@section('content')
    <!-- Hero Header Section -->
    <div class="flex justify-between items-end mb-10">
        <div>
            <h1 class="font-headline text-4xl font-extrabold tracking-tight text-on-background mb-2">TikTok Tracker</h1>
            <p class="text-on-surface-variant font-body text-lg">Measure viral impact and affiliate conversion in real-time.
            </p>
        </div>
        <div class="flex gap-4">
            <button
                class="flex items-center gap-2 px-6 py-3 bg-surface-container-lowest text-primary font-headline font-bold rounded-xl shadow-sm hover:bg-surface-container-low transition-colors">
                <span class="material-symbols-outlined">sync</span>
                Sync TikTok Data
            </button>
            <button
                class="flex items-center gap-2 px-6 py-3 bg-gradient-to-b from-primary to-primary-container text-on-primary font-headline font-bold rounded-xl shadow-md hover:brightness-105 transition-all">
                <span class="material-symbols-outlined">add_circle</span>
                Add New Video
            </button>
        </div>
    </div>

    <!-- Stats Bento Grid -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-12">
        <div class="bg-surface-container-lowest p-6 rounded-lg shadow-sm">
            <div class="flex items-center justify-between mb-4">
                <span class="p-2 bg-primary-container/10 rounded-lg text-primary">
                    <span class="material-symbols-outlined">visibility</span>
                </span>
                <span class="text-secondary text-xs font-bold">+12.5%</span>
            </div>
            <p class="text-on-surface-variant font-label text-xs uppercase tracking-wider mb-1">Total Video Views</p>
            <p class="text-2xl font-headline font-extrabold">{{ $totalViews }}</p>
        </div>
        <div class="bg-surface-container-lowest p-6 rounded-lg shadow-sm border-l-4 border-secondary">
            <div class="flex items-center justify-between mb-4">
                <span class="p-2 bg-secondary-container/30 rounded-lg text-secondary">
                    <span class="material-symbols-outlined">ads_click</span>
                </span>
                <span class="text-secondary text-xs font-bold">+5.2%</span>
            </div>
            <p class="text-on-surface-variant font-label text-xs uppercase tracking-wider mb-1">Total Clicks</p>
            <p class="text-2xl font-headline font-extrabold">{{ $totalClicks }}</p>
        </div>
        <div class="bg-surface-container-lowest p-6 rounded-lg shadow-sm">
            <div class="flex items-center justify-between mb-4">
                <span class="p-2 bg-orange-100 rounded-lg text-orange-600">
                    <span class="material-symbols-outlined">favorite</span>
                </span>
                <span class="text-error text-xs font-bold">-1.2%</span>
            </div>
            <p class="text-on-surface-variant font-label text-xs uppercase tracking-wider mb-1">Engagement Avg</p>
            <p class="text-2xl font-headline font-extrabold">{{ $avgEngagement }}</p>
        </div>
        <div class="bg-surface-container-lowest p-6 rounded-lg shadow-sm">
            <div class="flex items-center justify-between mb-4">
                <span class="p-2 bg-surface-container-highest rounded-lg text-on-surface">
                    <span class="material-symbols-outlined">analytics</span>
                </span>
            </div>
            <p class="text-on-surface-variant font-label text-xs uppercase tracking-wider mb-1">Top Performer</p>
            <p class="text-sm font-headline font-bold line-clamp-1">{{ $topPerformerName }}</p>
        </div>
    </div>

    <!-- Main Content: Tracking Table -->
    <div class="bg-surface-container-lowest rounded-lg shadow-sm overflow-hidden">
        <div class="px-8 py-6 flex items-center justify-between bg-surface-container-low/50">
            <h2 class="font-headline font-bold text-xl">Video Performance Tracker</h2>
            <div class="flex gap-2">
                <button class="p-2 text-on-surface-variant hover:bg-surface-container rounded-lg transition-colors">
                    <span class="material-symbols-outlined">filter_list</span>
                </button>
                <button class="p-2 text-on-surface-variant hover:bg-surface-container rounded-lg transition-colors">
                    <span class="material-symbols-outlined">download</span>
                </button>
            </div>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-surface-container-low/30 border-b border-surface-variant/20">
                        <th
                            class="px-8 py-4 font-label text-xs uppercase tracking-widest text-on-surface-variant font-bold">
                            Video Thumbnail</th>
                        <th
                            class="px-6 py-4 font-label text-xs uppercase tracking-widest text-on-surface-variant font-bold">
                            Linked Product(s)</th>
                        <th
                            class="px-6 py-4 font-label text-xs uppercase tracking-widest text-on-surface-variant font-bold text-center">
                            Date Posted</th>
                        <th
                            class="px-6 py-4 font-label text-xs uppercase tracking-widest text-on-surface-variant font-bold text-right">
                            Views</th>
                        <th
                            class="px-6 py-4 font-label text-xs uppercase tracking-widest text-on-surface-variant font-bold text-right">
                            Clicks</th>
                        <th
                            class="px-6 py-4 font-label text-xs uppercase tracking-widest text-on-surface-variant font-bold text-right">
                            Engagement</th>
                        <th
                            class="px-8 py-4 font-label text-xs uppercase tracking-widest text-on-surface-variant font-bold text-center">
                            Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-surface-container">
                    @php
                        $videos = [
                            [
                                'title' => 'Viral Playroom Hack',
                                'url' => 'tiktok.com/v/921...',
                                'img' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuB3h2zBqvxulj6xsfQn3e79Z8EjN_Y1l_BKV9jvuUN0JfbTFzwP_z9oq-Jo6w0ELtI0hR5TDDIqqqbUCI4D2sFMVAx8sYN4DBTLLImJdS0dyGvpTOGPXJ5fJ_MouhQ0i9GQil6F4QJ3qgBG46Jc9ZHzNCTJULoZnoUTjhRUAQGHDEIGVhKBb8u94bgTOxw8Fo8an9ECtCfX2HTNlmsId-qC3WSefT0hu241VWtckYWiXkBQK25hJ4FROJA6QVWiZOL3SDC5hLURMg',
                                'product' => 'Wood Block Set',
                                'product_img' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuClMbTNeyvPG-VvAaKMWRWC3RNUN4Sj7lhmJCNJJR-ofNJPRSkbwXhVWY4hc67UfAOBIwGVUD9MPQPj6r-HpIIdMQO6DSeOR1yeJsLYLJzsrbxOdyuiwkph-JE0qj60gdWz4bo8UgfXiBdrkNFCcqWsYOIo0ZuwDVtNt9FQqszQ8SOFS4o5Tmr0mkVl5OGJr_tnyUP9JFMBJzErZxxEQc3IrM8y2pE46T5IURZG1eqv9kuf3IIpVkDH-SjEhNEe4Gp3d2ZTZFnCPw',
                                'extra_products' => 1,
                                'date' => 'Oct 12, 2023',
                                'views' => '1.2M',
                                'clicks' => '42.5K',
                                'engagement' => '8.4%',
                                'eng_width' => '84%'
                            ],
                            [
                                'title' => 'Cozy Nursery Tour',
                                'url' => 'tiktok.com/v/872...',
                                'img' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuCrXiMgYPTYSq3L0GjfLThBc0VJWlW8uWobS6bRqc45Ciq4b71qY5KHA_3T8WZsDdqrOEW6qrguBtggxAGdmjRAJx_cD9OH2xGMJEYq1rBDcqFvFP28A7Eu0nCQPFN89y_pzrFPOHbAch8vi0B-ZdvMHmy-2RAUQKv5m0QSOHH9y2oKEbi7yzEA9e5Nk2UfexuLVHOZBpo6LXsR4oBBUC0Qgj9L5HoaN2IlOdyY2ydzoejRzrM7gguuMgc6omFZfKlb9XpB5HFCzQ',
                                'product' => 'Cotton Mobile',
                                'product_img' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuCLgDGSY0nM3YvLePeK8mzhT1d2yEcKvfrgRFIMB3NgIHevGLl62MIvIyVkQSN3tBGO_RLC48zJ5PF8_sYLrxK0R9gtIxfb4jVi7rGfD7UyhqC-XP6goiCt4pl6gYHzSgfZzCaEnZ_d3JX7gUR5xrvOvvxsmXnf28s4L12etNoA4fl7QCLrjBAlPLAgWh1_zlQXc5QZo17t8ja0W0lKNH67xC3CdHHwpagRS229a75jQeWxDhcec3xUwaNbel_oFGYVjn3GtNQplg',
                                'extra_products' => 0,
                                'date' => 'Oct 10, 2023',
                                'views' => '842K',
                                'clicks' => '28.1K',
                                'engagement' => '6.1%',
                                'eng_width' => '61%'
                            ],
                            [
                                'title' => 'Rainy Day Activities',
                                'url' => 'tiktok.com/v/430...',
                                'img' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuBojBO1av52sIEnsXkrQ1OsjAA6gOBg3iEk7GUYuFe230WATFMatCg7vQ-RmevRZGBJfBRATiuIdeQYGMKrH5Dn20NX7dwoS2D_xYD0ng_BdXBK5JFINkifrbzPxvMnbs-noPouHPMPaqUPjF2kfs4df4pNdSA5aJhZDruKS-AWBGFAGAUucaWYPDWBuAy8NEnc8cftDh8yjvcvIarYnrX_AZnGxEM-S6uWU0eilETvOgCdztPeiZ-hH5C7ZTy-2duShzz0KjrJiw',
                                'product' => 'Washable Markers',
                                'product_img' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuDSf4zd6-d1D77pXhqII-hwOCy2nUduq9L3oKbz6UXT_eWUNKKOEC6uB8S5JSR428habmYT5oJfsUdPVqGeR3lcKqgnx10KGYyuywkqKivArf3HIe0-QPmgB1fq_962Q4IwmaPvbkS3YzrxrbsQ20jnBwkjoNJ4K_FY521p3MyTB8e940bDl_7KCNQFP0uxFpI0FFxjwBC7VXwIxZRpc34dwgY1exSD8OakllNinMPrnYNGB9Fo7q8SBsbBQsqoyfNBlnX_S2EFLQ',
                                'extra_products' => 0,
                                'date' => 'Oct 05, 2023',
                                'views' => '350K',
                                'clicks' => '13.6K',
                                'engagement' => '4.2%',
                                'eng_width' => '42%'
                            ]
                        ];
                    @endphp
                    @forelse($videos as $v)
                        <tr class="hover:bg-surface-container-low/20 transition-colors group">
                            <td class="px-8 py-6">
                                <div class="flex items-center gap-4">
                                    <div
                                        class="relative w-16 h-24 rounded-lg overflow-hidden bg-surface-dim shadow-inner group-hover:scale-105 transition-transform">
                                        <img class="w-full h-full object-cover" src="{{ $v['img'] }}" />
                                        <div class="absolute inset-0 flex items-center justify-center bg-black/20">
                                            <span class="material-symbols-outlined text-white text-xl">play_circle</span>
                                        </div>
                                    </div>
                                    <div class="flex flex-col max-w-[150px]">
                                        <span class="text-sm font-bold truncate">{{ $v['title'] }}</span>
                                        <a class="text-[10px] text-primary flex items-center gap-1 hover:underline" href="#">
                                            {{ $v['url'] }}
                                            <span class="material-symbols-outlined text-[10px]">open_in_new</span>
                                        </a>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-6">
                                <div class="flex items-center gap-2">
                                    @if($v['product_img'])
                                        <div class="w-8 h-8 rounded-md bg-surface-container overflow-hidden">
                                            <img class="w-full h-full object-cover" src="{{ $v['product_img'] }}" />
                                        </div>
                                    @endif
                                    <span class="text-sm font-medium">{{ $v['product'] }}</span>
                                    @if($v['extra_products'] > 0)
                                        <span
                                            class="px-2 py-0.5 bg-tertiary-container text-on-tertiary-container text-[10px] font-bold rounded-full">+{{ $v['extra_products'] }}</span>
                                    @endif
                                </div>
                            </td>
                            <td class="px-6 py-6 text-center">
                                <span class="text-sm text-on-surface-variant font-body">{{ $v['date'] }}</span>
                            </td>
                            <td class="px-6 py-6 text-right font-headline font-bold">{{ $v['views'] }}</td>
                            <td class="px-6 py-6 text-right font-headline font-bold">{{ $v['clicks'] }}</td>
                            <td class="px-6 py-6 text-right">
                                <div class="flex flex-col items-end">
                                    <span class="text-sm font-bold text-secondary">{{ $v['engagement'] }}</span>
                                    <div class="w-16 h-1 bg-surface-container rounded-full overflow-hidden mt-1">
                                        <div class="h-full bg-secondary" style="width: {{ $v['eng_width'] }}"></div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-8 py-6 text-center">
                                <button class="p-2 hover:bg-surface-container rounded-lg transition-colors text-outline">
                                    <span class="material-symbols-outlined">more_vert</span>
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-8 py-10 text-center text-on-surface-variant italic">No referral videos
                                found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div
            class="px-8 py-4 bg-surface-container-low/30 flex items-center justify-between border-t border-surface-variant/20">
            <span class="text-xs text-on-surface-variant font-label">Showing 1-3 of 128 videos</span>
            <div class="flex gap-2">
                <button
                    class="p-2 border border-surface-variant rounded-lg hover:bg-surface-container transition-colors disabled:opacity-50"
                    disabled>
                    <span class="material-symbols-outlined text-sm">chevron_left</span>
                </button>
                <button class="p-2 border border-surface-variant rounded-lg hover:bg-surface-container transition-colors">
                    <span class="material-symbols-outlined text-sm">chevron_right</span>
                </button>
            </div>
        </div>
    </div>

    <!-- Asymmetric Editorial Section -->
    <div class="mt-12 flex flex-col md:flex-row gap-8">
        <div class="flex-1 bg-gradient-to-br from-primary to-primary-dim p-1 rounded-2xl">
            <div
                class="bg-surface-container-lowest h-full rounded-[0.9rem] p-8 flex flex-col md:flex-row items-center gap-8">
                <div class="relative w-full md:w-1/3 aspect-square rounded-xl overflow-hidden shadow-lg rotate-[-2deg]">
                    <img class="w-full h-full object-cover"
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuCx_AUbmzNxrkE0E3KOphDCmCRbxtkaZ9fq27eBMc8y-1L_RXxhPY9fyjVgVXBHoWz42-K73prneOXPkP0T54rZAFJ2cMscoRUZINnp-VNvveBt7MkLZqwS7YnbuJufpdu5zDEv8FRZ-pQRSEX2_Wi-tNU_hm5eV661BzxF2VrWe84Wljxlv8P3yb-QVOUAaXtenb_dLUsxAfxAZ5s4M7XDlZClEFOQURVxFUWYidFNlR6WTHBqayZHwxUyKTWbmrQqI3rw4l1HRA" />
                    <div
                        class="absolute top-2 right-2 px-3 py-1 bg-tertiary-container text-on-tertiary-container text-[10px] font-bold rounded-full shadow-sm">
                        POPULAR #1
                    </div>
                </div>
                <div class="flex-1">
                    <h3 class="font-headline font-extrabold text-2xl mb-2 text-primary">Viral: Montessori Blocks</h3>
                    <p class="font-body text-on-surface-variant mb-6">This product has seen a 240% increase in clicks since
                        the "Viral Playroom Hack" video went live 2 days ago.</p>
                    <div class="flex gap-8">
                        <div>
                            <p class="text-[10px] uppercase tracking-widest text-outline mb-1 font-bold">Conversion</p>
                            <p class="text-xl font-headline font-extrabold">12.4%</p>
                        </div>
                        <div>
                            <p class="text-[10px] uppercase tracking-widest text-outline mb-1 font-bold">Revenue</p>
                            <p class="text-xl font-headline font-extrabold">$14,205</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="md:w-1/3 flex flex-col gap-4">
            <div
                class="bg-tertiary-container/30 p-6 rounded-2xl flex-1 flex flex-col justify-center border border-tertiary/10">
                <h4 class="font-headline font-bold text-on-tertiary-container mb-1">Editor's Tip</h4>
                <p class="text-sm text-on-tertiary-fixed-variant">Videos under 24 seconds featuring ASMR wooden sounds are
                    converting 3x better this month. Try boosting similar content.</p>
            </div>
            <div class="bg-surface-container p-6 rounded-2xl flex-1 flex items-center gap-4">
                <div class="p-3 bg-surface-container-lowest rounded-xl">
                    <span class="material-symbols-outlined text-primary">auto_awesome</span>
                </div>
                <div>
                    <p class="font-headline font-bold text-sm">AI Content Gen</p>
                    <p class="text-xs text-on-surface-variant">Generate viral hooks based on this week's top content.</p>
                </div>
            </div>
        </div>
    </div>
@endsection