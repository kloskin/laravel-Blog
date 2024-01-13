<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{csrf_token()}}">

    <title>{{$title ?? null}}</title>
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @livewireStyles
</head>

<body class="font-sans antialiased">

{{-- container for all --}}
<div class="container mx-auto p-10">
    {{-- header --}}
    <header class="flex justify-between items-center">
        {{-- logo, search --}}
        <div class="flex items-center">
            <a href="{{url('/')}}"><x-microblog.images.laravel-logo /></a>

            <div class="text-3xl hidden md:block text-gray-600 font-medium ml-2 tracking-tight">
                <a href="{{url('/')}}">LaravelMicroBlog</a>
            </div>

            <livewire:search />

        </div>
        {{-- links --}}
        <div class="text-lg hidden md:flex space-x-6">
            @if (Auth::check())
            <p>Logged as: <a class="hover:text-stone-500" href="{{ route('dashboard') }}">{{Auth::user()->name}}</a></p>
            <x-microblog.logout-form />
            <a href="{{ route('posts.create') }}"
               class="inline font-bold text-sm px-6 py-2 text-white rounded-full bg-red-500 hover:bg-red-600">New
                blog post</a>
            @else
            <a class="tracking-widest hover:text-stone-500" href="{{ route('login') }}">Login</a>
            <a class="tracking-widest hover:text-stone-500" href="{{ route('register') }}">Register</a>
            @endif
        </div>

        {{-- hamburger icon --}}
        <div id="hamburger-icon" class="space-y-2 cursor-pointer md:hidden">
            <div class="w-8 h-0.5 bg-gray-600"></div>
            <div class="w-8 h-0.5 bg-gray-600"></div>
            <div class="w-8 h-0.5 bg-gray-600"></div>
        </div>
    </header>
    {{-- mobile menu --}}
    <div class="md:hidden">
        <div id="mobile-menu"
             class="flex-col items-center hidden py-8 mt-10 space-y-6 bg-white left-6 right-6 drop-shadow-lg">
            @if (Auth::check())
            <p>Logged as: <a class="hover:text-stone-500" href="{{ route('dashboard') }}">{{Auth::user()->name}}</a></p>
            <x-microblog.logout-form />
            <a href="{{ route('posts.create') }}"
               class="inline font-bold text-sm px-6 py-2 text-white rounded-full bg-red-500 hover:bg-red-600">
                New
                blog post</a>
            @else
            <a class="tracking-widest hover:text-stone-500" href="{{ route('login') }}">Login</a>
            <a class="tracking-widest hover:text-stone-500" href="{{ route('register') }}">Register</a>
            @endif
        </div>
    </div>

    {{ $slot }}

    {{-- footer --}}
    <footer class="flex items-center justify-center mt-12">
        &copy; 2023 LaravelMicroBlog
    </footer>
</div>
@livewireScripts
</body>

</html>

