<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-4xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Plaza Jengibre') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="flex">
            <!-- Espacio adicional para el menú lateral -->
            <div class="w-64 hidden lg:block bg-gray-200 dark:bg-gray-700"></div>

            <div class="flex-1 max-w-8xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="flex items-center justify-between px-6 py-4">
                        <h3 class="font-bold text-5xl">Productos</h3>

                        @role('administrador')
                        <a href="{{ route('productos.create') }}">
                            <button type="button" class="inline-block rounded bg-green-500 px-6 py-2.5 text-xl font-medium uppercase leading-normal text-white shadow-md transition duration-150 ease-in-out hover:bg-green-600 hover:shadow-md focus:bg-green-600 focus:shadow-md focus:outline-none focus:ring-0 active:bg-green-700 active:shadow-md motion-reduce:transition-none dark:shadow-black/30 dark:hover:shadow-dark-strong dark:focus:shadow-dark-strong dark:active:shadow-dark-strong">
                                Crear Producto
                            </button>
                        </a>
                        @endrole

                        <form action="{{ route('buscar.producto') }}" method="GET" class="flex items-center">
                            <input type="text" name="nombre" class="px-2 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500" placeholder="Nombre del Producto" required>
                            <button type="submit" class="ml-2 inline-block bg-blue-500 px-6 py-2.5 text-xl font-medium uppercase text-white rounded-md shadow-md transition duration-150 ease-in-out hover:bg-blue-600 focus:bg-blue-600 focus:outline-none focus:shadow-md active:bg-green-700">
                                Buscar
                            </button>
                        </form>
                    </div>

                    <div class="overflow-x-auto px-4 py-6">
                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                            @foreach ($productos as $producto)
                            <div class="bg-gray-800 dark:bg-gray-900 rounded-lg overflow-hidden shadow-lg animate__animated animate__zoomInLeft flex flex-col">
                                <!-- Contenedor de Imagen con ajuste al centro -->
                                <div class="w-full h-48 flex items-center justify-center mt-4">
                                    <img src="{{ asset('storage/' . $producto->imagen) }}" alt="Imagen del producto" class="max-w-full max-h-full object-contain">
                                </div>
                                <div class="p-4 flex-1">
                                    <h4 class="text-xl font-bold text-white">{{ $producto->nombre }}</h4>
                                    <p class="text-gray-300 mt-2">{{ $producto->descripcion }}</p>
                                    <div class="flex items-center justify-between mt-4">
                                        <span class="text-green-400 font-semibold"> $ {{ number_format($producto->precio, 2) }} </span>
                                        <span class="text-gray-300 font-semibold">Cantidad en Inventario: {{ $producto->cantidadEnInventario() }}</span>
                                    </div>
                                    <div class="flex space-x-2 mt-4">
                                        <a href="{{ route('productos.show', $producto) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Ver</a>
                                        @role('administrador')
                                        <a href="{{ route('productos.edit', $producto) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">Editar</a>
                                        @endrole
                                    </div>
                                    @role('administrador')
                                    <div class="mt-4">
                                        <form action="{{ route('productos.destroy', $producto) }}" method="POST" onsubmit="return confirm('¿Está seguro de que desea eliminar este producto?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded w-full">Eliminar</button>
                                        </form>
                                    </div>
                                    @endrole
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="p-6 flex justify-between items-center">
                        <a href="{{ route('dashboard') }}" class="inline-block">
                            <button type="button" class="text-white bg-yellow-500 hover:bg-yellow-300 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-lg p-3 text-center inline-flex items-center space-x-2 dark:bg-yellow-600 dark:hover:bg-yellow-700 dark:focus:ring-yellow-800">
                                <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10 2L2 10h3v7h10v-7h3L10 2z" />
                                </svg>
                                <span class="font-medium">Inicio</span>
                            </button>
                        </a>

                        <div class="flex bg-gray-800 dark:bg-gray-900 rounded-lg shadow-lg overflow-hidden">
                            <div class="p-2 text-white">
                                Página {{ $productos->currentPage() }} de {{ $productos->lastPage() }}
                            </div>
                            <div class="p-2">
                                @if ($productos->onFirstPage())
                                <span class="text-gray-400 dark:text-gray-600">Anterior</span>
                                @else
                                <a href="{{ $productos->previousPageUrl() }}" class="text-white hover:text-gray-300 dark:hover:text-gray-400">Anterior</a>
                                @endif

                                @if ($productos->hasMorePages())
                                <a href="{{ $productos->nextPageUrl() }}" class="text-white hover:text-gray-300 dark:hover:text-gray-400 ml-4">Siguiente</a>
                                @else
                                <span class="text-gray-400 dark:text-gray-600 ml-4">Siguiente</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
