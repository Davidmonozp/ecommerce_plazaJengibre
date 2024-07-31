<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-3xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Plaza Jengibre') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="flex items-center px-6 py-4">
                    <h3 class="font-bold text-3xl mr-12">Clientes</h3>

                    <a href="{{ route('clientes.create') }}" class="mr-12">
                        <button type="button" class="inline-block rounded bg-green-500 px-6 pb-2 pt-2.5 text-xl font-medium uppercase leading-normal text-white shadow-md transition duration-150 ease-in-out hover:bg-green-600 hover:shadow-md focus:bg-green-600 focus:shadow-md focus:outline-none focus:ring-0 active:bg-green-700 active:shadow-md motion-reduce:transition-none dark:shadow-black/30 dark:hover:shadow-dark-strong dark:focus:shadow-dark-strong dark:active:shadow-dark-strong">
                            Crear Cliente
                        </button>
                    </a>

                    <form action="{{ route('buscar.cliente') }}" method="GET">
                        <div class="flex items-center">
                            <input type="text" name="cedula" class="px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500 text-lg placeholder-gray-500" placeholder="Número de cédula" required>

                            <button type="submit" class="ml-2 inline-block bg-blue-500 px-6 py-2.5 text-xl font-medium uppercase text-white rounded-md shadow-md transition duration-150 ease-in-out hover:bg-blue-600 focus:bg-blue-600 focus:outline-none focus:shadow-md active:bg-green-700">
                                Buscar
                            </button>
                        </div>
                    </form>
                </div>

                <div class="overflow-x-auto">
                    <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                        <div class="overflow-hidden">
                            <table class="min-w-full text-left text-lg font-normal text-white bg-gray-800 dark:bg-gray-900">
                                <thead class="border-b border-white dark:border-gray-700">
                                    <tr>
                                        <th scope="col" class="px-6 py-4">ID</th>
                                        <th scope="col" class="px-6 py-4">Número de cédula</th>
                                        <th scope="col" class="px-6 py-4">Nombre</th>
                                        <th scope="col" class="px-6 py-4">Apellidos</th>
                                        <th scope="col" class="px-6 py-4">Email</th>
                                        <th scope="col" class="px-6 py-4">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-gray-800 divide-y divide-gray-200 dark:bg-gray-900 dark:divide-gray-700">
                                    @foreach ($clientes as $cliente)
                                    <tr class="border-b border-white dark:border-gray-700">
                                        <td class="whitespace-nowrap px-6 py-4 font-medium text-white">{{ $cliente->id }}</td>
                                        <td class="whitespace-nowrap px-6 py-4 font-medium text-white">{{ $cliente->cedula }}</td>
                                        <td class="whitespace-nowrap px-6 py-4 text-white">{{ $cliente->nombre }}</td>
                                        <td class="whitespace-nowrap px-6 py-4 text-white">{{ $cliente->apellido }}</td>
                                        <td class="whitespace-nowrap px-6 py-4 text-white">{{ $cliente->email }}</td>
                                        <td class="whitespace-nowrap px-6 py-4 text-white">
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
                    </div>
                </div>

                {{-- Paginación --}}
                <div class="p-6 flex justify-end">
                <div class="flex bg-gray-800 dark:bg-gray-900 rounded-lg shadow-lg overflow-hidden">
                <div class="p-2 text-white">
                        {{-- Mostrar el número de página actual --}}
                        Página {{ $clientes->currentPage() }} de {{ $clientes->lastPage() }}
                    </div>
                    <div class="p-2">
                        {{-- Enlaces a la página anterior y siguiente --}}
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
</x-app-layout>
