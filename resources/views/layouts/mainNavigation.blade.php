<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield("title", "Rolex")</title>

        @livewireStyles

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=League+Gothic&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
        


        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else
            {{-- <style>
            </style> --}}
        @endif
        
    </head>


    <body class="bg-white text-gray-800">

        <nav class="flex items-center justify-between px-4 md:px-16 h-[70px] bg-blue-950">
    
    
            <!-- Hamburger Menu Button (visible on mobile) -->
            <button class="text-white text-3xl md:hidden place-items-end" id="menu-toggle">☰</button>
                
            
    
<!-- Navigation Links -->
<ul class="hidden md:flex items-center gap-[11vw] text-[#E9E1DB] font-gothic" id="nav-links">
    <li>
        <a class="hover:text-[#C0E4F5]" href="{{ route('home') }}">HOME</a>
    </li>

    <li>
        <a class="hover:text-[#C0E4F5]" href="{{ route('products.new_watches') }}">NEW WATCHES 2025</a>
    </li>

    <li>
        <a class="hover:text-[#C0E4F5]" href="{{ route('about') }}">ABOUT ROLEX</a>
    </li>

    <!-- Logo -->
    <div class="flex items-center">
        <img class="w-12" src="{{ asset('images/logo.png') }}" alt="logo">
    </div>

    @auth
        {{-- Dashboard link for both admin and user --}}
@auth
    @if(auth()->user()->role === 'admin')
        <li>
            <a class="hover:text-[#C0E4F5]" href="{{ route('dashboard') }}">Dashboard</a>
        </li>
    @endif
@endauth


        {{-- Profile link for users --}}
@if (in_array(auth()->user()->role, ['user', 'admin']))
    <li>
        <a class="hover:text-[#C0E4F5]" href="{{ route('profile.edit') }}">Profile</a>
    </li>
@endif


{{-- User Dashboard link for users --}}
@if(auth()->user()->role === 'user')
    <li>
        <a 
            href="{{ route('user.dashboard') }}" 
            class="hover:text-[#C0E4F5] text-white {{ request()->routeIs('user.dashboard') ? 'font-semibold underline' : '' }}"
        >
            User Dashboard
        </a>
    </li>
@endif


        {{-- Logout button --}}
        <li>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="hover:text-[#C0E4F5] bg-transparent border-none cursor-pointer">
                    Logout
                </button>
            </form>
        </li>
    @else
        {{-- Guest: show login & register --}}
        @if (Route::has('register'))
            <li>
                <a href="{{ route('register') }}"
                   class="inline-block px-2 py-1.5 dark:text-[#EDEDEC] text-lg leading-normal hover:text-[#C0E4F5]">
                    Sign-In
                </a>
            </li>
        @endif

        <li>
            <a href="{{ route('login') }}"
               class="inline-block dark:text-[#EDEDEC] text-lg leading-normal hover:text-[#C0E4F5]">
                Log-In
            </a>
        </li>
    @endauth
</ul>

    
    
                    <!-- Mobile Navigation (hidden by default) -->
                    <ul class="fixed inset-0 left-0 w-full bg-blue-950 text-[#E9E1DB] font-title flex-col items-center gap-6 py-12 font-gothic hidden z-10" id="mobile-nav">
                                    <!-- Logo -->
            <div class="flex items-center">
                <img class="w-12" src="./images/logo.png" alt="Logo">
            </div>
                <li>
                    <a class="hover:text-[#C0E4F5]" href="{{ route('home') }}">HOME</a>
                </li>
                <li>
                    <a class="hover:text-[#C0E4F5]" href="{{ route('products.new_watches') }}">NEW WATCHES 2025</a>
                </li>
                <li>
                    <a class="hover:text-[#C0E4F5]" href="{{ route('about') }}">ABOUT ROLEX</a>
                </li>

                @auth
       {{-- Dashboard link for both admin and user --}}
@auth
    @if(auth()->user()->role === 'admin')
        <li>
            <a class="hover:text-[#C0E4F5]" href="{{ route('dashboard') }}">Dashboard</a>
        </li>
    @endif
@endauth


        {{-- Profile link for users --}}
@if (in_array(auth()->user()->role, ['user', 'admin']))
    <li>
        <a class="hover:text-[#C0E4F5]" href="{{ route('profile.edit') }}">Profile</a>
    </li>
@endif


{{-- User Dashboard link for users --}}
@if(auth()->user()->role === 'user')
    <li>
        <a 
            href="{{ route('user.dashboard') }}" 
            class="hover:text-[#C0E4F5] text-white {{ request()->routeIs('user.dashboard') ? 'font-semibold underline' : '' }}"
        >
            User Dashboard
        </a>
    </li>
@endif


        {{-- Logout button --}}
        <li>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="hover:text-[#C0E4F5] bg-transparent border-none cursor-pointer">
                    Logout
                </button>
            </form>
        </li>
    @else
        {{-- Guest: show login & register --}}
        @if (Route::has('register'))
            <li>
                <a href="{{ route('register') }}"
                   class="inline-block px-2 py-1.5 dark:text-[#EDEDEC] text-lg leading-normal hover:text-[#C0E4F5]">
                    Sign-In
                </a>
            </li>
        @endif

        <li>
            <a href="{{ route('login') }}"
               class="inline-block dark:text-[#EDEDEC] text-lg leading-normal hover:text-[#C0E4F5]">
                Log-In
            </a>
        </li>
    @endauth






            </ul>
        </nav>
    @livewireScripts
    </body>
    
</html>