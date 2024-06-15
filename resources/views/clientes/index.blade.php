<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Plaza Jengibre') }}
        </h2>


        <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar"
            type="button"
            class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
            <span class="sr-only">Open sidebar</span>
            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path clip-rule="evenodd" fill-rule="evenodd"
                    d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                </path>
            </svg>
        </button>
    </x-slot>

    <aside id="logo-sidebar"
            class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0"
            aria-label="Sidebar">
            <div class="h-full px-3 py-4 overflow-y-auto bg-gray-50 dark:bg-gray-800">
                <a href="{{ route('dashboard') }}" class="flex items-center ps-2.5 mb-5">
                    <svg class="h-6 me-3 sm:h-7 text-slate-600" width="24" height="24" viewBox="0 0 24 24"
                        stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" />
                        <polyline points="5 12 3 12 12 3 21 12 19 12" />
                        <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                        <rect x="10" y="12" width="4" height="4" />
                    </svg>
                    <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">Plaza
                        Jengibre</span>
                </a>
                <ul class="space-y-2 font-medium">
                    <li class="mb-4">
                        <a href="#"
                            class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                            <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                viewBox="0 0 20 20">
                                <path
                                    d="m17.418 3.623-.018-.008a6.713 6.713 0 0 0-2.4-.569V2h1a1 1 0 1 0 0-2h-2a1 1 0 0 0-1 1v2H9.89A6.977 6.977 0 0 1 12 8v5h-2V8A5 5 0 1 0 0 8v6a1 1 0 0 0 1 1h8v4a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1v-4h6a1 1 0 0 0 1-1V8a5 5 0 0 0-2.582-4.377ZM6 12H4a1 1 0 0 1 0-2h2a1 1 0 0 1 0 2Z" />
                            </svg>
                            <span class="flex-1 ms-3 whitespace-nowrap">Mensajes</span>
                            <span
                                class="inline-flex items-center justify-center w-3 h-3 p-3 ms-3 text-sm font-medium text-blue-800 bg-blue-100 rounded-full dark:bg-blue-900 dark:text-blue-300">3</span>
                        </a>
                    </li>
                    <li class="mb-4">
                        <a href="{{ route('clientes.index') }}"
                            class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                            <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                viewBox="0 0 20 18">
                                <path
                                    d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z" />
                            </svg>
                            <span class="flex-1 ms-3 whitespace-nowrap">Clientes</span>
                        </a>
                    </li>
                    <li class="mb-4">
                        <a href="{{ route('productos.index') }}"
                            class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                            <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                viewBox="0 0 18 20">
                                <path
                                    d="M17 5.923A1 1 0 0 0 16 5h-3V4a4 4 0 1 0-8 0v1H2a1 1 0 0 0-1 .923L.086 17.846A2 2 0 0 0 2.08 20h13.84a2 2 0 0 0 1.994-2.153L17 5.923ZM7 9a1 1 0 0 1-2 0V7h2v2Zm0-5a2 2 0 1 1 4 0v1H7V4Zm6 5a1 1 0 1 1-2 0V7h2v2Z" />
                            </svg>
                            <span class="flex-1 ms-3 whitespace-nowrap">Productos</span>
                        </a>
                    </li>
                    <li class="mb-4">    
                        <a href="{{ route('productos.index') }}"
                            class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                            <svg class="flex-shrink-0 w-5 h-5 text-gray-600" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                            </svg>

                            <span class="flex-1 ms-3 whitespace-nowrap">Categorias</span>
                        </a>
                    </li>
                    <li class="mb-4">
                        <a href="{{ route('logout') }}"
                            class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group"
                            @click.prevent="$root.submit();">
                            <!-- Icono de cerrar sesión -->
                            <svg class="flex-shrink-0 w-5 h-5 text-gray-600 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M5.293 4.293a1 1 0 011.414 0L10 8.586l3.293-3.293a1 1 0 111.414 1.414L11.414 10l3.293 3.293a1 1 0 01-1.414 1.414L10 11.414l-3.293 3.293a1 1 0 01-1.414-1.414L8.586 10 5.293 6.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                            <!-- Fin del icono -->

                            <span class="flex-1 ms-3 whitespace-nowrap">Cerrar Sesion</span>
                        </a>
                    </li>

                </ul>
            </div>
        </aside> 


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
               

                <div class="flex items-center">
                    <h3 class="font-bold text-2xl mr-12">Clientes</h3>

                    <a href="{{ route('clientes.create') }}" class="mr-12">
                        <button type="button"
                            class="inline-block rounded bg-green-500 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-md transition duration-150 ease-in-out hover:bg-green-600 hover:shadow-md focus:bg-green-600 focus:shadow-md focus:outline-none focus:ring-0 active:bg-green-700 active:shadow-md motion-reduce:transition-none dark:shadow-black/30 dark:hover:shadow-dark-strong dark:focus:shadow-dark-strong dark:active:shadow-dark-strong">
                            Crear Cliente
                        </button>
                    </a>
                    <form action="{{ route('buscar.cliente') }}" method="GET">
                        <div class="flex items-center">
                            <input type="text" name="cedula"
                                class="px-2 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500"
                                placeholder="Numero de cedula" required>
                            <button type="submit"
                                class="ml-2 inline-block bg-blue-500 px-6 py-2.5 text-xs font-medium uppercase text-white rounded-md shadow-md transition duration-150 ease-in-out hover:bg-blue-600 focus:bg-blue-600 focus:outline-none focus:shadow-md active:bg-green-700">
                                Buscar
                            </button>
                        </div>
                    </form>
                </div>
                <div class="flex flex-col">
                    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                            <div class="overflow-hidden">
                                <table
                                    class="min-w-full text-left text-sm font-light text-white bg-gray-800 dark:bg-gray-900">
                                    <thead class="border-b border-white dark:border-gray-700">
                                        <tr>
                                            <th scope="col" class="px-6 py-4">ID</th>
                                            <th scope="col" class="px-6 py-4">Numero de cedula</th>
                                            <th scope="col" class="px-6 py-4">Nombre</th>
                                            <th scope="col" class="px-6 py-4">Apellidos</th>
                                            <th scope="col" class="px-6 py-4">Email</th>
                                        </tr>
                                    </thead>
                                    <tbody
                                        class="bg-gray-800 divide-y divide-gray-200 dark:bg-gray-900 dark:divide-gray-700">
                                        @foreach ($clientes as $cliente)
                                            <tr class="border-b border-white dark:border-gray-700">
                                                <td class="whitespace-nowrap px-6 py-4 font-medium text-white">
                                                    {{ $cliente->id }}</td>
                                                <td class="whitespace-nowrap px-6 py-4 font-medium text-white">
                                                    {{ $cliente->cedula }}</td>
                                                <td class="whitespace-nowrap px-6 py-4 text-white">
                                                    {{ $cliente->nombre }}</td>
                                                <td class="whitespace-nowrap px-6 py-4 text-white">
                                                    {{ $cliente->apellido }}</td>
                                                <td class="whitespace-nowrap px-6 py-4 text-white">{{ $cliente->email }}
                                                </td>
                                                <td class="whitespace-nowrap px-6 py-4 text-white">
                                                    <div class="flex space-x-2">
                                                        <a href="{{ route('clientes.show', $cliente) }}"
                                                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Ver</a>
                                                        <a href="{{ route('clientes.edit', $cliente) }}"
                                                            class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">Editar</a>
                                                        <form action="{{ route('clientes.destroy', $cliente) }}"
                                                            method="POST"
                                                            onsubmit="return confirm('¿Está seguro de que desea eliminar este cliente?');">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Eliminar</button>
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
                </div>



            </div>
        </div>
    </div>
</x-app-layout>
