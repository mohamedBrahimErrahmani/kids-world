<!DOCTYPE html>
<html class="light" lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin - Kids World')</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Be+Vietnam+Pro:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#005f99",
                        "primary-container": "#44a6f6",
                        "secondary": "#47624b",
                        "secondary-container": "#cceacd",
                        "surface": "#f5f6f7",
                        "surface-container-lowest": "#ffffff",
                        "on-surface": "#2c2f30",
                        "on-surface-variant": "#595c5d",
                    },
                    fontFamily: {
                        "headline": ["Plus Jakarta Sans"],
                        "body": ["Be Vietnam Pro"],
                    },
                    borderRadius: {"DEFAULT": "1rem", "lg": "2rem", "xl": "3rem", "full": "9999px"},
                }
            }
        }
    </script>
    <style>
        .material-symbols-outlined { font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24; }
        body { font-family: 'Be Vietnam Pro', sans-serif; }
    </style>
    @stack('styles')
</head>
<body class="flex min-h-screen bg-surface">
    @include('layouts.partials.admin_sidebar')

    <main class="flex-1 flex flex-col min-w-0">
        @include('layouts.partials.admin_header')

        <div class="p-8 space-y-8 max-w-[1600px] mx-auto w-full">
            @yield('content')
        </div>
    </main>

    @stack('scripts')
</body>
</html>
