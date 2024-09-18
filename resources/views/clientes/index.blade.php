@role('administrador')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-4xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Plaza Jengibre') }}
        </h2>
    </x-slot>

    <div class="py-12 ">
        <div class="flex">
            <!-- Espacio adicional para el menú lateral -->
            <div class="w-64 hidden lg:block bg-gray-200 dark:bg-gray-700"></div>

            <div class="flex-1 max-w-8xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="flex items-center justify-between px-6 py-4">
                        <h3 class="font-bold text-5xl">Clientes</h3>

                        <a href="{{ route('clientes.create') }}" class="mr-12">
                            <button type="button" class="inline-block rounded bg-green-500 px-6 py-2.5 text-xl font-medium uppercase leading-normal text-white shadow-md transition duration-150 ease-in-out hover:bg-green-600 hover:shadow-md focus:bg-green-600 focus:shadow-md focus:outline-none focus:ring-0 active:bg-green-700 active:shadow-md motion-reduce:transition-none dark:shadow-black/30 dark:hover:shadow-dark-strong dark:focus:shadow-dark-strong dark:active:shadow-dark-strong">
                                Crear Cliente
                            </button>
                        </a>

                        <form action="{{ route('buscar.cliente') }}" method="GET" class="flex items-center">
                            <input type="text" name="cedula" class="px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500 text-lg placeholder-gray-500" placeholder="Número de cédula" required>

                            <button type="submit" class="ml-2 inline-block bg-blue-500 px-6 py-2.5 text-xl font-medium uppercase text-white rounded-md shadow-md transition duration-150 ease-in-out hover:bg-blue-600 focus:bg-blue-600 focus:outline-none focus:shadow-md active:bg-blue-700">
                                Buscar
                            </button>
                        </form>
                    </div>

                    <div class="overflow-x-auto px-4 py-6 animate__animated animate__flipInY">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700 text-lg">
                            <thead class="bg-gray-800 dark:bg-gray-900">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xl font-medium text-gray-300 uppercase tracking-wider">ID</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xl font-medium text-gray-300 uppercase tracking-wider">Número de cédula</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xl font-medium text-gray-300 uppercase tracking-wider">Nombre</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xl font-medium text-gray-300 uppercase tracking-wider">Apellidos</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xl font-medium text-gray-300 uppercase tracking-wider">Email</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xl font-medium text-gray-300 uppercase tracking-wider">Acciones</th>
                                </tr>
                            </thead>
                            <tbody class="bg-gray-800 divide-y divide-gray-700 dark:bg-gray-900">
                                @foreach ($clientes as $cliente)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-xl font-medium text-white">{{ $cliente->id }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-xl font-medium text-white">{{ $cliente->cedula }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-xl text-gray-300">{{ $cliente->nombre }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-xl text-gray-300">{{ $cliente->apellido }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-xl text-gray-300">{{ $cliente->email }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-xl font-medium text-white">
                                        <div class="flex space-x-2">
                                            <a href="{{ route('clientes.show', $cliente) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Ver</a>
                                            <a href="{{ route('clientes.edit', $cliente) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">Editar</a>
                                            <form action="{{ route('clientes.destroy', $cliente) }}" method="POST" onsubmit="return confirm('¿Está seguro de que desea eliminar este cliente?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Eliminar</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Paginación -->
                    <div class="p-6 flex justify-end items-center">
                        <div class="flex bg-gray-800 dark:bg-gray-900 rounded-lg shadow-lg overflow-hidden">
                            <div class="p-2 text-white">
                                Página {{ $clientes->currentPage() }} de {{ $clientes->lastPage() }}
                            </div>
                            <div class="p-2">
                                @if ($clientes->onFirstPage())
                                <span class="text-gray-400 dark:text-gray-600">Anterior</span>
                                @else
                                <a href="{{ $clientes->previousPageUrl() }}" class="text-white hover:text-gray-300 dark:hover:text-gray-400">Anterior</a>
                                @endif

                                @if ($clientes->hasMorePages())
                                <a href="{{ $clientes->nextPageUrl() }}" class="text-white hover:text-gray-300 dark:hover:text-gray-400 ml-4">Siguiente</a>
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
@endrole
