@extends('layouts.admin')

@section('title', 'Product Management - Kids World Admin')

@section('content')
    <!-- Product Management Content -->
    <section class="space-y-8">
        <!-- Page Header & Actions -->
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-6">
            <div>
                <h2 class="font-headline text-3xl font-extrabold tracking-tight text-on-background">Product Management</h2>
                <p class="text-on-surface-variant font-body mt-1">Curate and manage your high-end product selection.</p>
            </div>
            <div class="flex items-center gap-3">
                <button class="flex items-center gap-2 px-6 py-3 bg-secondary-container text-on-secondary-container rounded-xl font-semibold hover:brightness-105 transition-all">
                    <span class="material-symbols-outlined">upload_file</span>
                    Bulk Import
                </button>
                <button class="flex items-center gap-2 px-6 py-3 bg-gradient-to-b from-primary to-primary-container text-on-primary rounded-xl font-semibold shadow-lg hover:brightness-105 transition-all">
                    <span class="material-symbols-outlined">add</span>
                    Add Product
                </button>
            </div>
        </div>

        <!-- Filters Bar -->
        <div class="flex flex-wrap items-center gap-4 p-2 bg-surface-container-low rounded-2xl">
            <div class="flex items-center gap-2 px-4 py-2 bg-surface-container-lowest rounded-xl min-w-[180px]">
                <span class="material-symbols-outlined text-outline text-sm">filter_list</span>
                <select class="bg-transparent border-none text-sm font-medium focus:ring-0 w-full p-0">
                    <option>All Categories</option>
                    <option>Educational Toys</option>
                    <option>Nursery Decor</option>
                    <option>Apparel</option>
                </select>
            </div>
            <div class="flex items-center gap-2 px-4 py-2 bg-surface-container-lowest rounded-xl min-w-[180px]">
                <span class="material-symbols-outlined text-outline text-sm">child_care</span>
                <select class="bg-transparent border-none text-sm font-medium focus:ring-0 w-full p-0">
                    <option>All Ages</option>
                    <option>0-2 Years</option>
                    <option>3-5 Years</option>
                    <option>6-8 Years</option>
                </select>
            </div>
            <button class="ml-auto text-primary text-sm font-semibold px-4 hover:underline">Clear Filters</button>
        </div>

        <!-- Data Table Section -->
        <div class="bg-surface-container-lowest rounded-lg shadow-sm overflow-hidden border border-white/40">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-surface-container-low text-on-surface-variant text-xs font-bold uppercase tracking-widest">
                        <th class="px-8 py-5">Product Name</th>
                        <th class="px-6 py-5">Category</th>
                        <th class="px-6 py-5">Age Group</th>
                        <th class="px-6 py-5">Price</th>
                        <th class="px-6 py-5 text-center">Rating</th>
                        <th class="px-6 py-5 text-center">Status</th>
                        <th class="px-8 py-5 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-surface-container">
                    @php
                        $products = [
                            ['name' => 'Nordic Wooden Stacker', 'sku' => 'TOY-7729', 'cat' => 'Educational', 'age' => '2-4 Years', 'price' => '$34.99', 'rating' => 4.8, 'status' => 'Featured', 'active' => true, 'img' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuDcoQAOARAssDJ2V4DFJ1NUVwCQE5o9SibI5sKJSQMqSwBCXM05KXmtNznHhlZVYrXFBDNCHKtwtJkg371YHkKZ9uT5VSFPRlLhjy1cTQwU_QB3DYxUcOkrmTW8YS7_DzHX4jXnMZwuwtsjnSpFSP7KYzNw11YpewGccdOy9jYt8x04Dx9xZ-ftpXSiPHsQECyTIJbpWorC0NP9lRpoaFjdRSUk1hmiQilVtKzZ0B4duaTkam1daK3C2SPBnbGjD-UV5rWGj2qSaA'],
                            ['name' => 'Cotton Cloud Mobile', 'sku' => 'DEC-1102', 'cat' => 'Nursery', 'age' => 'Newborn', 'price' => '$59.00', 'rating' => 4.9, 'status' => 'Trending', 'active' => false, 'img' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuBsmDe3UlgynOk-62U-OUWdfaHMCom9kug9nG1tNkzU6Sd7es63BnNc_wDAi7JibtCrnguPUJlT52SKRZ9PYIBJ4BNvNXngTN0mqMIj1bZQNisOPovafdslres_6VSTTDMGI8UCL49ILYDT8HDJp-TqVOuB4MfWX4aETzEgNeIFdQxiEEwGotgoXc4tcVDUxeEpLrzVtPGvnFEShQIyJ3wp4xuonPc6ler52EHsBUbpp4IS4xCdb1wB0IrxODCsHsWGXl560PY7AA'],
                            ['name' => 'Organic Hemp Tee', 'sku' => 'APP-4491', 'cat' => 'Apparel', 'age' => '4-6 Years', 'price' => '$22.50', 'rating' => 4.5, 'status' => null, 'active' => false, 'img' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuCdDfPVrjrft7BX5SVMZlKuWpix6ix3gmxSuYunTs66pVRYm7igxCDnzDOnwXwnu9vM83IugBLJp0b6zRNLVb3EXxge4HJ4x8kc6mkY4tnahYv0puY1PtNRZ6ksEK5d_Y-TM5k48yl7xVCf6Znj6cQguRRHqq5tBeC2opLkCuO-pS8KCj-YYHuvwLU6bm-9_WFmQQezJlE33lGquDi-pRqOze02-NHtys4NKDiYNf_b18XOcC2Ixl0pH5RtUepwhXTv9ePkykSXAg'],
                            ['name' => 'Math Bead Maze', 'sku' => 'TOY-8831', 'cat' => 'Educational', 'age' => '3-5 Years', 'price' => '$42.00', 'rating' => 4.7, 'status' => 'Featured', 'active' => true, 'img' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuBUhMj4Khkq78FNiif2pNSTUVfu6XzzRdF1tj9Jp8YhktJZ5VCNmyEeOJrE5YENo73ftQIlbI8bgD1W8pFNMiQzZz8ISad3qvxy9hEs9kAHM4nMKWq388V_lYe_PJuc37Icta54DxZsCeoYyKnoeuIxQRtsNVH35u0m3vR9wyuZ5cHRTcbNetaP12DO8oe5fgoTUtes1cgLRbiKrkBizJ3iqojmAis50Wh--TT6OXS-vni4Y_kZAtdzCQiU-1JJoAtUKTjOpwFHoA'],
                        ];
                    @endphp
                    @foreach($products as $p)
                    <tr class="hover:bg-surface-bright transition-colors group">
                        <td class="px-8 py-4">
                            <div class="flex items-center gap-4">
                                <div class="w-14 h-14 rounded-lg overflow-hidden bg-surface-container-high flex-shrink-0">
                                    <img class="w-full h-full object-cover" src="{{ $p['img'] }}"/>
                                </div>
                                <div>
                                    <p class="font-semibold text-on-surface leading-tight">{{ $p['name'] }}</p>
                                    <p class="text-xs text-on-surface-variant font-label mt-1">SKU: {{ $p['sku'] }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="px-3 py-1 bg-surface-container text-on-surface-variant rounded-full text-xs font-medium">{{ $p['cat'] }}</span>
                        </td>
                        <td class="px-6 py-4 text-sm text-on-surface-variant">{{ $p['age'] }}</td>
                        <td class="px-6 py-4 text-sm font-bold text-on-surface">{{ $p['price'] }}</td>
                        <td class="px-6 py-4">
                            <div class="flex items-center justify-center gap-1">
                                <span class="material-symbols-outlined text-amber-400 text-lg" style="font-variation-settings: 'FILL' 1;">star</span>
                                <span class="text-sm font-bold">{{ $p['rating'] }}</span>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center justify-center gap-2">
                                @if($p['status'])
                                <span class="px-3 py-1 {{ $p['status'] == 'Featured' ? 'bg-tertiary-container text-on-tertiary-container' : 'bg-secondary-container text-on-secondary-container' }} rounded-full text-[10px] font-bold uppercase tracking-wider">{{ $p['status'] }}</span>
                                @else
                                <div class="w-16 h-4 bg-transparent"></div>
                                @endif
                                <button class="w-10 h-5 {{ $p['active'] ? 'bg-primary' : 'bg-outline-variant' }} rounded-full relative transition-all">
                                    <div class="absolute {{ $p['active'] ? 'right-1' : 'left-1' }} top-1 w-3 h-3 bg-white rounded-full"></div>
                                </button>
                            </div>
                        </td>
                        <td class="px-8 py-4 text-right">
                            <div class="flex items-center justify-end gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                                <button class="p-2 hover:bg-surface-container rounded-lg text-on-surface-variant"><span class="material-symbols-outlined">edit</span></button>
                                <button class="p-2 hover:bg-error-container/10 rounded-lg text-error"><span class="material-symbols-outlined">delete</span></button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <!-- Pagination -->
            <div class="flex items-center justify-between px-8 py-5 bg-surface-container-low border-t border-surface-container">
                <p class="text-sm text-on-surface-variant">Showing <span class="font-bold">1-10</span> of <span class="font-bold">284</span> products</p>
                <div class="flex gap-2">
                    <button class="w-10 h-10 flex items-center justify-center rounded-xl bg-surface-container text-on-surface-variant disabled:opacity-30" disabled>
                        <span class="material-symbols-outlined">chevron_left</span>
                    </button>
                    <button class="w-10 h-10 flex items-center justify-center rounded-xl bg-primary text-on-primary font-bold">1</button>
                    <button class="w-10 h-10 flex items-center justify-center rounded-xl bg-surface-container-lowest text-on-surface-variant font-medium">2</button>
                    <button class="w-10 h-10 flex items-center justify-center rounded-xl bg-surface-container-lowest text-on-surface-variant font-medium">3</button>
                    <button class="w-10 h-10 flex items-center justify-center rounded-xl bg-surface-container text-on-surface-variant">
                        <span class="material-symbols-outlined">chevron_right</span>
                    </button>
                </div>
            </div>
        </div>

        <!-- Dashboard Insight Bento Grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @php
                $insights = [
                    ['label' => 'Monthly Views', 'val' => '12.8k', 'icon' => 'trending_up', 'color' => 'bg-primary-container text-on-primary-container', 'bg' => 'bg-primary-container/10', 't_color' => 'text-primary-dim'],
                    ['label' => 'Conversions', 'val' => '4.2%', 'icon' => 'shopping_cart', 'color' => 'bg-secondary-container text-on-secondary-container', 'bg' => 'bg-secondary-container/20', 't_color' => 'text-secondary-dim'],
                    ['label' => 'Featured Assets', 'val' => '42', 'icon' => 'verified', 'color' => 'bg-tertiary-container text-on-tertiary-container', 'bg' => 'bg-tertiary-container/30', 't_color' => 'text-tertiary-dim'],
                ];
            @endphp
            @foreach($insights as $in)
            <div class="{{ $in['bg'] }} p-6 rounded-lg flex items-center gap-5">
                <div class="w-12 h-12 rounded-full {{ $in['color'] }} flex items-center justify-center shadow-lg">
                    <span class="material-symbols-outlined">{{ $in['icon'] }}</span>
                </div>
                <div>
                    <p class="text-xs font-bold uppercase tracking-widest {{ $in['t_color'] }}">{{ $in['label'] }}</p>
                    <p class="text-2xl font-extrabold text-on-primary-container leading-none mt-1">{{ $in['val'] }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </section>
@endsection
