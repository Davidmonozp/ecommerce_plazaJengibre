<x-guest-layout>

    <div class="min-h-screen flex items-center justify-center" style="background: linear-gradient(to bottom right, #46f8a1, #058d4b);">
        <div class="sm:mx-auto sm:w-full sm:max-w-md">
            <div class="flex flex-col items-center mb-4">
                <img src="{{ asset('images/logoplaza.png') }}" alt="" style="width: 180px; height: 180px; border-radius: 50%; margin-bottom: 1rem;">
                <p class="text-white text-6xl font-medium">
                    Inicio de Sesión
                </p>
            </div>


            <x-validation-errors class="mb-4" />

            <div class="bg-gray-800 py-8 px-4 shadow sm:rounded-lg sm:px-10">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div>
                        <label for="email" class="block text-xl font-medium text-white">
                            Correo electrónico
                        </label>
                        <div class="mt-1">
                            <input id="email" name="email" type="email" :value="old('email')" required autofocus class="appearance-none block w-full px-3 py-3 border border-gray-600 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 text-xl">
                        </div>
                    </div>

                    <div class="mt-6">
                        <label for="password" class="block text-xl font-medium text-white">
                            Contraseña
                        </label>
                        <div class="mt-1">
                            <input id="password" name="password" type="password" required class="appearance-none block w-full px-3 py-3 border border-gray-600 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 text-xl">
                        </div>
                    </div>

                    <div class="flex items-center justify-between mt-6">
                        <div class="flex items-center">
                            <input id="remember_me" name="remember" type="checkbox" class="h-5 w-5 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                            <label for="remember_me" class="ml-2 block text-lg text-white">
                                Recuérdame
                            </label>
                        </div>

                        @if (Route::has('password.request'))
                        <div class="text-lg">
                            <a href="{{ route('password.request') }}" class="font-medium text-indigo-300 hover:text-indigo-500">
                                ¿Olvidaste tu contraseña?
                            </a>
                        </div>
                        @endif
                    </div>

                    <div class="mt-6">
                        <button type="submit" class="w-full flex justify-center py-3 px-5 border border-transparent rounded-md shadow-sm text-xl font-medium text-white bg-green-600 hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Ingresar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>


</x-guest-layout>