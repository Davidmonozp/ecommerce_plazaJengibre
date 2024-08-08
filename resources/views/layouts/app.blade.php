<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
</head>

<body class="font-sans antialiased">
    <x-banner />

    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        @livewire('navigation-menu')

        <!-- Page Heading -->
        @if (isset($header))
        <header class="bg-white dark:bg-gray-800 shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
        @endif

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
     
    </div>
    <footer class="bg-teal-600  text-white py-12">
        <div class="container mx-auto text-center">
            <p class="text-lg font-bold">&copy; {{ date('Y') }} Plaza Jengibre. Todos los derechos reservados.</p>
            <p class="mt-2">
                <a href="{{ route('privacy.policy') }}" class="text-yellow-400 hover:underline">Política de Privacidad</a> |
                <a href="{{ route('terms.of.service') }}" class="text-yellow-400 hover:underline">Términos de Servicio</a>
            </p>
        </div>
    </footer>


    @stack('modals')

    @livewireScripts
</body>

</html>