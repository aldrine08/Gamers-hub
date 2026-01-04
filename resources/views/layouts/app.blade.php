<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net" />
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Small custom styles to complement Tailwind (non-invasive) -->
    <style>
      /* Subtle floating animation for decorative effect */
      @keyframes float-slow {
        0%   { transform: translateY(0px); }
        50%  { transform: translateY(-6px); }
        100% { transform: translateY(0px); }
      }

      /* Glassy card base (used in header/content wrappers) */
      .glass-card {
        background: linear-gradient(180deg, rgba(255,255,255,0.80), rgba(255,255,255,0.68));
        backdrop-filter: blur(8px);
        -webkit-backdrop-filter: blur(8px);
        border: 1px solid rgba(255,255,255,0.12);
      }

      /* Accent stripe to the left of the main card */
      .card-accent::before {
        content: "";
        position: absolute;
        left: 0;
        top: 0;
        width: 6px;
        height: 100%;
        border-radius: 12px 0 0 12px;
        background: linear-gradient(180deg, rgba(59,130,246,1), rgba(139,92,246,1));
        box-shadow: 0 6px 18px rgba(99,102,241,0.18);
      }

      /* Make sure the accent pseudo-element doesn't overflow on small screens */
      @media (max-width: 640px) {
        .card-accent::before { width: 4px; border-radius: 8px 0 0 8px; }
      }
    </style>
</head>

<body class="font-sans antialiased">
    <div
        class="min-h-screen bg-cover bg-center bg-no-repeat flex flex-col"
        style="background-image: url('{{ asset('storage/image/bg.jpeg') }}');"
    >
        @include('layouts.navigation')

        <!-- Overlay for readability -->
        <div class="flex-1 bg-black/40 backdrop-blur-sm">
            
            <!-- Page Heading (if provided) -->
            @isset($header)
                <header class="max-w-7xl mx-auto mt-8 px-4 sm:px-6 lg:px-8">
                    <div
                        class="relative overflow-hidden glass-card rounded-2xl shadow-2xl py-6 px-6 sm:px-8 transform transition-transform duration-300 hover:-translate-y-1"
                        style="border-radius: 1rem;"
                    >
                        {{-- Slight left accent for visual interest --}}
                        <div class="absolute inset-y-0 left-0 w-1 sm:w-1.5 rounded-l-2xl" style="background: linear-gradient(180deg, rgba(59,130,246,1), rgba(139,92,246,1)); box-shadow: 0 6px 18px rgba(99,102,241,0.12);"></div>

                        <div class="relative pl-6 sm:pl-8">
                            {{ $header }}
                        </div>
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main class="max-w-7xl mx-auto mt-8 pb-12 px-4 sm:px-6 lg:px-8">
                <!-- center the main card, make it pop -->
                <div class="relative">
                    <div
                        class="relative mx-auto max-w-3xl p-6 sm:p-8 rounded-2xl shadow-[0_35px_60px_-15px_rgba(0,0,0,0.6)] glass-card card-accent transform transition hover:-translate-y-2"
                        style="padding-left: 1.25rem; padding-right: 1.25rem;"
                    >
                        
                        <div class="space-y-6">
                            @yield('content')
                        </div>
                    </div>

                    <!-- Decorative floating PlayStation-like icon (optional) -->
                    <div class="hidden sm:block pointer-events-none absolute -top-6 -right-6 animate-[float-slow_6s_ease-in-out_infinite]">
                        <!-- If you'd like, drop in a small SVG or image; commented out to avoid forcing assets.
                        <img src="{{ asset('storage/image/icon-small.png') }}" alt="" class="w-24 h-24 opacity-70" />
                        -->
                    </div>
                </div>
            </main>

        </div>
    </div>
</body>
</html>
