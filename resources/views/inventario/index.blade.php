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
                        <h3 class="font-bold text-5xl">Inventarios</h3>

                        @role('administrador')
                        <a href="{{ route('inventario.create') }}">
                            <button type="button" class="inline-block rounded bg-green-500 px-6 py-2.5 text-xl font-medium uppercase leading-normal text-white shadow-md transition duration-150 ease-in-out hover:bg-green-600 hover:shadow-md focus:bg-green-600 focus:shadow-md focus:outline-none focus:ring-0 active:bg-green-700 active:shadow-md motion-reduce:transition-none dark:shadow-black/30 dark:hover:shadow-dark-strong dark:focus:shadow-dark-strong dark:active:shadow-dark-strong">
                                Crear Inventario
                            </button>
                        </a>
                        @endrole
                    </div>

                    <div class="overflow-x-auto px-4 py-6">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead class="bg-gray-800 dark:bg-gray-900">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xl font-medium text-gray-300 uppercase tracking-wider">Producto</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xl font-medium text-gray-300 uppercase tracking-wider">Tamaño</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xl font-medium text-gray-300 uppercase tracking-wider">Cantidad</th>                                    
                                    <th scope="col" class="px-6 py-3 text-left text-xl font-medium text-gray-300 uppercase tracking-wider">Acciones</th>
                                </tr>
                            </thead>
                            <tbody class="bg-gray-800 dark:bg-gray-900 divide-y divide-gray-700">
                                @foreach ($inventarios as $inventario)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-xl font-medium text-white">
                                        {{ $inventario->producto->nombre }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-xl text-gray-300">
                                        {{ $inventario->tamaño }}
                                    </td>                                   
                                    <td class="px-6 py-4 whitespace-nowrap text-xl text-gray-300">
                                        {{ $inventario->cantidad }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-xl font-medium flex space-x-2">
                                        <a href="{{ route('productos.show', $inventario->producto) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Ver Producto</a>
                                        @role('administrador')
                                        <a href="{{ route('inventario.edit', $inventario) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">Editar</a>
                                        <form action="{{ route('inventario.destroy', $inventario) }}" method="POST" onsubmit="return confirm('¿Está seguro de que desea eliminar este inventario?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Eliminar</button>
                                        </form>
                                        @endrole
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Paginación -->
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
                                Página {{ $inventarios->currentPage() }} de {{ $inventarios->lastPage() }}
                            </div>
                            <div class="p-2">
                                @if ($inventarios->onFirstPage())
                                <span class="text-gray-400 dark:text-gray-600">Anterior</span>
                                @else
                                <a href="{{ $inventarios->previousPageUrl() }}" class="text-white hover:text-gray-300 dark:hover:text-gray-400">Anterior</a>
                                @endif

                                @if ($inventarios->hasMorePages())
                                <a href="{{ $inventarios->nextPageUrl() }}" class="text-white hover:text-gray-300 dark:hover:text-gray-400 ml-4">Siguiente</a>
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
