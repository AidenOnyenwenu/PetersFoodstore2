<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name', 'PetersFoodstore') }}</title>
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css'])
        @endif
        <style>
            .btn{display:inline-flex;align-items:center;gap:.5rem;border-radius:.5rem;padding:.625rem 1rem;border:1px solid transparent}
            .btn-primary{background:#2563eb;color:#fff}
            .btn-primary:hover{background:#1d4ed8}
            .btn-secondary{background:#f3f4f6;color:#111827;border-color:#e5e7eb}
            .btn-danger{background:#ef4444;color:#fff}
            .btn-danger:hover{background:#dc2626}
            .card{background:#fff;border:1px solid #e5e7eb;border-radius:.75rem;box-shadow:0 1px 2px rgb(0 0 0 / .05)}
            .container{max-width:1100px;margin:0 auto;padding:1.25rem}
            .nav{backdrop-filter:saturate(180%) blur(12px);background:rgba(255,255,255,.6);border-bottom:1px solid #e5e7eb}
            .nav a{color:#111827;text-decoration:none}
            .nav a:hover{color:#2563eb}
            @media (prefers-color-scheme: dark){
                body{background:#0a0a0a;color:#e5e7eb}
                .card{background:#111214;border-color:#1f2937}
                .nav{background:rgba(17,17,17,.7);border-color:#1f2937}
                .nav a{color:#e5e7eb}
            }
        </style>
    </head>
    <body>
        <header class="nav">
            <div class="container" style="display:flex;align-items:center;justify-content:space-between;gap:1rem">
                <a href="/" style="font-weight:600">PetersFoodstore</a>
                <nav style="display:flex;gap:1rem">
                    <a href="{{ route('sandwiches.index') }}">Sandwiches</a>
                    <a href="{{ route('producten.index') }}">Producten</a>
                    <a href="{{ route('medewerkers.index') }}">Medewerkers</a>
                </nav>
            </div>
        </header>
        <main class="container">
            {{ $slot ?? '' }}
            @yield('content')
        </main>
    </body>
    </html>


