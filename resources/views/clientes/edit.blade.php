<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Editar Cliente') }}
        </h2>
    </x-slot>

    <form action="{{ route('clientes.update', $cliente->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="h-screen w-full">
            <div class="bg-gray-800 mx-auto max-w-6xl mt-12">
                <div class="p-6">
                    <p class="text-5xl text-yellow-500 font-bold">
                        Editar<br />
                        Cliente
                    </p>
                </div>
                <div class="mx-12 p-3 rounded-xl shadow-sm bg-gray-900">
                    <div class="p-3 mx-6 border-b border-gray-500">
                    <label for="nombre" class="text-yellow-500">Número de cédula </label>
                        <input placeholder="Número de cédula" name="cedula" value="{{ $cliente->cedula }}"
                            class="bg-transparent text-yellow-500 w-full focus:outline-none focus:rang" type="text" />
                    </div>
                    <div class="p-3 mx-6 border-b border-gray-500">
                    <label for="nombre" class="text-yellow-500">Nombre(s) </label>
                        <input placeholder="Nombre" name="nombre" value="{{ $cliente->nombre }}"
                            class="bg-transparent text-yellow-500 w-full focus:outline-none focus:rang" type="text" />
                    </div>
                    <div class="p-3 mx-6 border-b border-gray-500">
                    <label for="nombre" class="text-yellow-500">Apellidos </label>
                        <input placeholder="Apellidos" name="apellido" value="{{ $cliente->apellido }}"
                            class="bg-transparent text-yellow-500 w-full focus:outline-none focus:rang" type="text" />
                    </div>
                    <div class="p-3 mx-6 border-b border-gray-500">
                    <label for="nombre" class="text-yellow-500">Email </label>
                        <input placeholder="Email" name="email" value="{{ $cliente->email }}"
                            class="bg-transparent text-yellow-500 w-full focus:outline-none focus:rang" type="email" />
                    </div>
                </div>
                <div class="flex justify-center space-x-4 p-4">
                    <button type="submit" class="bg-yellow-500 p-3 rounded-3xl w-32 hover:bg-yellow-600 text-gray-900">
                        Guardar
                    </button>
                    <a href="{{ route('clientes.index') }}"
                        class="flex items-center justify-center bg-yellow-500 p-3 rounded-3xl w-32 hover:bg-yellow-600">
                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 5H1m0 0 4 4M1 5l4-4" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </form>
</x-app-layout>
