<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-4xl text-gray-800 dark:text-gray-200 leading-tight">
             {{ $producto->nombre }}
        </h2>
    </x-slot>

    <div class="py-12 animate__animated animate__flipInY">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6 text-gray-300 text-lg">
                <!-- Tarjeta de Producto -->
                <div class="flex flex-col sm:flex-row bg-gray-900 rounded-lg shadow-lg overflow-hidden">
                    <!-- Imagen del producto -->
                    <div class="flex-shrink-0 w-full sm:w-1/3">
                        @if ($producto->imagen)
                            <img src="{{ asset('storage/' . $producto->imagen) }}" alt="Imagen del producto" class="w-full h-96 object-contain">
                        @else
                            <div class="flex items-center justify-center w-full h-96 bg-gray-700">
                                <span class="text-gray-400">Imagen no disponible</span>
                            </div>
                        @endif
                    </div>
                    <!-- Información del producto -->
                    <div class="p-6 w-full sm:w-2/3">
                        <div class="flex flex-col space-y-4">
                            @role('administrador')
                            <div class="flex items-center space-x-4">
                                <span class="font-semibold text-xl">ID:</span>
                                <span>{{ $producto->id }}</span>
                            </div>
                            @endrole
                            
                            <div class="flex items-center space-x-4">
                                <span class="font-semibold text-xl">Nombre:</span>
                                <span class="text-lg">{{ $producto->nombre }}</span>
                            </div>
                            <div class="flex items-center space-x-4">
                                <span class="font-semibold text-xl">Descripción:</span>
                                <span class="text-lg">{{ $producto->descripcion }}</span>
                            </div>
                            <div class="flex items-center space-x-4">
                                <span class="font-semibold text-xl">Categoría:</span>
                                <span class="text-lg">{{ $producto->categoria->nombre ?? 'Categoría no disponible' }}</span>
                            </div>
                            <div class="flex items-center space-x-4">
                                <span class="font-semibold text-xl">Precio:</span>
                                <span class="text-lg">$ {{ number_format($producto->precio, 2) }}</span>
                            </div>
                            <div class="flex items-center space-x-4">
                                <span class="font-semibold text-xl">Tamaño:</span>
                                <span class="text-lg">{{ $producto->tamaño }}</span>
                            </div>
                            <div class="flex items-center space-x-4">
                                <span class="font-semibold text-xl">Cantidad en Inventario:</span>
                                <span class="text-lg">{{ $producto->cantidadEnInventario() }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Botones de acción -->
                <div class="flex space-x-4 mt-6">
                    <a href="{{ route('productos.index') }}" class="inline-block">
                        <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-lg p-3 text-center inline-flex items-center space-x-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5H1m0 0l4-4m-4 4l4 4" />
                            </svg>
                            <span class="font-medium">Productos</span>
                        </button>
                    </a>
                    <a href="{{ route('dashboard') }}" class="inline-block">
                        <button type="button" class="text-white bg-yellow-500 hover:bg-yellow-300 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-lg p-3 text-center inline-flex items-center space-x-2 dark:bg-yellow-600 dark:hover:bg-yellow-700 dark:focus:ring-yellow-800">
                            <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 2L2 10h3v7h10v-7h3L10 2z" />
                            </svg>
                            <span class="font-medium">Inicio</span>
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
