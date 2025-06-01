<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>Proyecto PIA</title>
    <link rel="icon" type="image/png" href="{{ asset('images/Logo_1.png') }}">


    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gray-900 text-white"> {{-- Fondo oscuro y texto blanco --}}
    <div class="min-h-screen flex flex-col justify-between">
        
        <header class="bg-gray-800 shadow-md">
            <div class="max-w-7xl mx-auto px-4 py-6 flex justify-between items-center">
            <a href="/" class="text-white hover:text-gray-300">    
            <h1 class="text-2xl font-bold">Proyecto PIA</h1>
            </a>
                <nav class="space-x-4">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-gray-300 hover:text-white">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-gray-300 hover:text-white">Iniciar sesión</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="text-gray-300 hover:text-white">Registrarse</a>
                        @endif
                    @endauth
                </nav>
            </div>
        </header>

        {{-- MAIN CONTENT (Aquí se inyectará el contenido específico de login/registro) --}}
        <main class="flex-grow flex items-center justify-center p-4"> {{-- Centra el slot --}}
            <div class="w-full sm:max-w-md bg-gray-800 shadow-md overflow-hidden sm:rounded-lg px-6 py-4"> {{-- Contenedor del formulario --}}
                {{ $slot }}
            </div>
        </main>

        
    </div>
</body>
</html>