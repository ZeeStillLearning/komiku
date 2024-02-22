<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title')</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="dark" bgcolor="#141b2d">
        @auth
        <nav class="bg-gray-900 p-2 mt-0 w-full z-10 top-0">
            <div class="container mx-auto flex flex-wrap">
                <div class="flex w-full justify-start md:justify-start text-white font-extrabold">
                    <img src="{{ asset('images/Logo2.png') }}" alt="Logo" class="w-20 h-12">
                    <a class="text-white no-underline hover:text-white hover:no-underline" href="{{ route('comics.index') }}">
                        <span class="text-4xl">Comics</span>
                    </a>  
                    <form action="{{ route('logout') }}" method="POST" class="w-full">
                    @csrf
                    <button type="submit" class="flex space-x-1 text-white bg-red-500 hover:bg-red-700 px-3 py-2 mr-5 rounded float-right">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-white" viewBox="0 0 24 24" fill="currentColor">
                            <path fill-rule="evenodd"  d="M21.9 10.6c-.1-.1-.1-.2-.2-.3l-2-2c-.4-.4-1-.4-1.4 0s-.4 1 0 1.4l.3.3H16c-.6 0-1 .4-1 1s.4 1 1 1h2.6l-.3.3c-.4.4-.4 1 0 1.4.2.2.5.3.7.3s.5-.1.7-.3l2-2c.1-.1.2-.2.2-.3.1-.3.1-.5 0-.8z" clip-rule="evenodd" />
                            <path d="M17 14c-.6 0-1 .4-1 1v1c0 .6-.4 1-1 1h-1V8.4c0-1.3-.8-2.4-1.9-2.8L10.5 5H15c.6 0 1 .4 1 1v1c0 .6.4 1 1 1s1-.4 1-1V6c0-1.7-1.3-3-3-3H5c-.1 0-.2 0-.3.1-.1 0-.2.1-.2.1l-.1.1c-.1 0-.2.1-.2.2v.1c-.1 0-.2.1-.2.2V18c0 .4.3.8.6.9l6.6 2.5c.2.1.5.1.7.1.4 0 .8-.1 1.1-.4.5-.4.9-1 .9-1.6V19h1c1.7 0 3-1.3 3-3v-1c.1-.5-.3-1-.9-1zM6 17.3V5.4l5.3 2c.4.2.7.6.7 1v11.1l-6-2.2z"/>
                        </svg>
                        <span class="hidden sm:inline">Logout</span>
                    </button>
                </form>
                </div>
            </div>
        </nav>
        @endauth
        <div class="container mx-auto">
            @yield('content')
        </div>
    </body>
    <footer>
    </footer>
</html> 