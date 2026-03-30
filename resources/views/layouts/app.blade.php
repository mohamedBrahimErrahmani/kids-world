<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="{{ $htmlClass ?? '' }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Kids World | High-End Editorial Curations')</title>

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Be+Vietnam+Pro:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">

    <!-- Tailwind Config -->
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "surface-container": "#e6e8ea",
                        "on-error": "#ffefee",
                        "on-error-container": "#570008",
                        "on-tertiary-container": "#625f36",
                        "primary-fixed": "#44a6f6",
                        "on-primary-fixed-variant": "#002e4e",
                        "primary-container": "#44a6f6",
                        "on-secondary": "#dcfbdd",
                        "tertiary-dim": "#54512a",
                        "on-surface-variant": "#595c5d",
                        "tertiary-container": "#fef8c3",
                        "on-tertiary-fixed-variant": "#6d6940",
                        "surface-container-low": "#eff1f2",
                        "on-secondary-container": "#3e5842",
                        "secondary-container": "#cceacd",
                        "primary-fixed-dim": "#3199e8",
                        "surface-variant": "#dadddf",
                        "primary-dim": "#005386",
                        "secondary": "#47624b",
                        "on-surface": "#2c2f30",
                        "background": "#f5f6f7",
                        "tertiary-fixed-dim": "#f0eab6",
                        "surface-tint": "#005f99",
                        "outline": "#757778",
                        "secondary-fixed": "#cceacd",
                        "error-container": "#fb5151",
                        "tertiary": "#605d34",
                        "surface-container-high": "#e0e3e4",
                        "inverse-surface": "#0c0f10",
                        "on-background": "#2c2f30",
                        "inverse-on-surface": "#9b9d9e",
                        "surface-container-lowest": "#ffffff",
                        "inverse-primary": "#40a4f4",
                        "error-dim": "#9f0519",
                        "outline-variant": "#abadae",
                        "on-secondary-fixed": "#2c4530",
                        "on-primary": "#ecf3ff",
                        "secondary-dim": "#3c5640",
                        "error": "#b31b25",
                        "surface": "#f5f6f7",
                        "primary": "#005f99",
                        "on-secondary-fixed-variant": "#47624b",
                        "tertiary-fixed": "#fef8c3",
                        "on-primary-fixed": "#000000",
                        "on-tertiary-fixed": "#4f4d26",
                        "on-primary-container": "#00253f",
                        "surface-dim": "#d1d5d7",
                        "secondary-fixed-dim": "#bedcbf",
                        "surface-container-highest": "#dadddf",
                        "on-tertiary": "#faf5c0",
                        "surface-bright": "#f5f6f7"
                    },
                    fontFamily: {
                        "headline": ["Plus Jakarta Sans"],
                        "body": ["Be Vietnam Pro"],
                        "label": ["Be Vietnam Pro"]
                    },
                    borderRadius: {"DEFAULT": "1rem", "lg": "2rem", "xl": "3rem", "full": "9999px"},
                },
            },
        }
    </script>

    <style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
    </style>

    @stack('styles')
</head>
<body class="@yield('body-class', 'bg-background text-on-surface font-body selection:bg-primary-container/30')">
    
    @yield('layout-content')

    @stack('scripts')
</body>
</html>
