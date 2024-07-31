<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-4xl text-gray-800 dark:text-gray-200 leading-tight">
            Detalles del Producto {{ $producto->nombre }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6 text-gray-300 text-2xl">
                <div class="flex flex-col space-y-6"> <!-- Aumenté el espacio vertical entre elementos a space-y-6 -->
                    <div class="flex items-center space-x-4">
                        <span class="font-semibold">ID:</span>
                        <span>{{ $producto->id }}</span>
                    </div>
                    <div class="flex items-center space-x-4">
                        <span class="font-semibold">Nombre:</span>
                        <span>{{ $producto->nombre }}</span>
                    </div>
                    <div class="flex items-center space-x-4">
                        <span class="font-semibold">Descripción:</span>
                        <span>{{ $producto->descripcion }}</span>
                    </div>
                    <div class="flex items-center space-x-4">
                        <span class="font-semibold">Categoría:</span>
                        <span>{{ $producto->categoria->nombre }}</span>
                    </div>
                    <div class="flex items-center space-x-4">
                        <span class="font-semibold">Precio:</span>
                        <span>{{ $producto->precio }}</span>
                    </div>
                    <div class="flex items-center space-x-4">
                        <span class="font-semibold">Tamaño:</span>
                        <span>{{ $producto->tamaño }}</span>
                    </div>
                </div>
            </div>


            <a href="{{ route('productos.index') }}" class="inline-block">
                <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-lg p-3 text-center inline-flex items-center space-x-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5H1m0 0l4-4m-4 4l4 4" />
                    </svg>
                    <span class="font-medium">Productos</span>
                </button>
            </a>
            <a href="{{ route('dashboard') }}" class="inline-block">
                <button type="button" class="text-white bg-yellow-500 hover:bg-yellow-300 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-lg p-3 text-center inline-flex items-center space-x-2 dark:bg-blue-600 dark:hover:bg-yellow-600 dark:focus:ring-blue-800">
                    <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 2L2 10h3v7h10v-7h3L10 2z" />
                    </svg>
                    <span class="font-medium">Inicio</span>
                </button>
            </a>

        </div>
    </div>
</x-app-layout>