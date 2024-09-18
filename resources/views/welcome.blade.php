<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <!-- Styles -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <style>
        body {
            background-image: linear-gradient(to bottom right, #46f8a1, #058d4b);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .custom-button {
            padding: 10px 20px;
            margin: 0 10px;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            border: none;
            transition: background-color 0.3s ease;
        }

        .custom-button:hover {
            background-color: #5009c2;
        }
    </style>
</head>

<body>
    <div>
        <header class="grid grid-cols-2 items-center gap-2 py-10 lg:grid-cols-3 animate__animated animate__zoomInLeft">
            @if (Route::has('login'))
            <nav class="-mx-3 flex flex-1 justify-center">
                @auth

                @else

                @endauth
            </nav>
            @endif
        </header>


        <div class="flex justify-center mb-4 animate__animated animate__backInDown">
            <img src="{{ asset('images/logoplaza.png') }}" alt="" style="width: 300px; height: auto; margin-right: 1px; border-radius: 50%;">
        </div>

        <div class="flex justify-center animate__animated animate__fadeInLeftBig">
            <button type="button" class="text-white bg-gradient-to-br from-green-800 to-green-600 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-pink-200 dark:focus:ring-pink-800 font-medium rounded-lg text-2xl px-12 py-2.5 text-center mb-4  border-2 border-gray-50">
                Síguenos en redes sociales
            </button>
        </div>

        <!-- Botón de Facebook -->
        <a href="https://www.facebook.com/" target="_blank" rel="noopener noreferrer" class="text-white bg-gradient-to-br from-green-800 to-green-600 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-200 dark:focus:ring-blue-800 font-medium rounded-lg text-2xl px-5 py-2.5 text-center mb-4 flex items-center justify-center animate__animated animate__zoomInLeft border-2 border-gray-50">
            <i class="fab fa-facebook-f mr-2"></i> Facebook
        </a>

        <!-- Botón de Instagram -->
        <a href="https://www.instagram.com/" target="_blank" rel="noopener noreferrer" class="text-white bg-gradient-to-br from-green-800 to-green-600 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-pink-200 dark:focus:ring-pink-800 font-medium rounded-lg text-2xl px-5 py-2.5 text-center mb-4 flex items-center justify-center animate__animated animate__zoomInLeft border-2 border-gray-50">
            <i class="fab fa-instagram mr-2"></i> Instagram
        </a>

        <div class="button-container flex justify-center animate__animated animate__jackInTheBox">
            <button onclick="window.location.href='{{ route('login') }}' "class="custom-button mb-4 lg:mb-0 lg:ml-2 lg:mr-2 text-white bg-gradient-to-br from-green-800 to-green-600 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800 font-medium rounded-lg text-xl px-5 py-2.5 text-center me-2 mb-2;">
                Ingresar
            </button>

            @if (Route::has('register'))
            <button onclick="window.location.href='{{ route('register') }}'" class="custom-button text-white bg-gradient-to-br from-green-800 to-green-600 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800 font-medium rounded-lg text-xl px-5 py-2.5 text-center me-2 mb-2">
                Registrarse
            </button>
            @endif
        </div>
    </div>
</body>

</html>