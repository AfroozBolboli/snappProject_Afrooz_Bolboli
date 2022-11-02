
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Snapp food!</title>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        @if (Route::has('login'))
            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                @auth
                <a href="{{ url('/dashboard') }}" class="text-xl text-pink-600 font-black underline">Dashboard</a>
                @else
                <a href="{{ route('login') }}" class="text-xl text-pink-600 font-black underline mx-10">ورود</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="ml-4 text-xl text-pink-600 underline">ثبت نام</a>
                    @endif
                @endauth
            </div>
            @endif
        <div class="min-h-screen bg-pink-100 text-5xl bold text-center mx-auto">
            <h1 class="pt-32 text-pink-700"> به اسنپ فود خوش آمدید</h1>
        </div>
    </body>
</html>
