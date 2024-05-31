<x-guest-layout>

    <div class="min-h-screen flex items-center justify-center" style="background: linear-gradient(to bottom right, #062552, #7c4a98);">
        <div class="sm:mx-auto sm:w-full sm:max-w-md">
            <div class="flex justify-center mb-4">
                <p class="text-white text-5xl font-medium mb-2" style="background: linear-gradient(45deg, #e6e8e8, #cae80a); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">Inicio de esión</p>
            </div>  
       
            <x-validation-errors class="mb-4" />

            <div class="bg-gray-800 py-8 px-4 shadow sm:rounded-lg sm:px-10">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div>
                        <label for="email" class="block text-sm font-medium text-white">
                            Correo electrónico
                        </label>
                        <div class="mt-1">
                            <input id="email" name="email" type="email" :value="old('email')" required autofocus class="appearance-none block w-full px-3 py-2 border border-gray-600 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>
                    </div>

                    <div class="mt-6">
                        <label for="password" class="block text-sm font-medium text-white">
                            Contraseña
                        </label>
                        <div class="mt-1">
                            <input id="password" name="password" type="password" required class="appearance-none block w-full px-3 py-2 border border-gray-600 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>
                    </div>

                    <div class="flex items-center justify-between mt-6">
                        <div class="flex items-center">
                            <input id="remember_me" name="remember" type="checkbox" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                            <label for="remember_me" class="ml-2 block text-sm text-white">
                                Recuérdame
                            </label>
                        </div>

                        @if (Route::has('password.request'))
                            <div class="text-sm">
                                <a href="{{ route('password.request') }}" class="font-medium text-indigo-300 hover:text-indigo-500">
                                    ¿Olvidaste tu contraseña?
                                </a>
                            </div>
                        @endif
                    </div>

                    <div class="mt-6">
                        <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Ingresar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
</x-guest-layout>
