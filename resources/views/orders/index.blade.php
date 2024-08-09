<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-4xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Lista de Pedidos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="flex">
            <!-- Espacio adicional para el menú lateral -->
            <div class="w-64 hidden lg:block bg-gray-200 dark:bg-gray-700"></div>

            <div class="flex-1 max-w-8xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="px-6 py-4 flex items-center justify-between">
                        <h3 class="font-bold text-5xl">Lista de Pedidos</h3>
                        
                        <!-- Formulario de búsqueda -->
                        <form method="GET" action="{{ route('orders.search') }}" class="flex items-center space-x-2">
                            <input type="text" name="id_number" placeholder="Número de Cédula" class="w-60 p-2 border rounded" required>
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Buscar</button>
                        </form>
                    </div>

                    <div class="overflow-x-auto px-4 py-6">
                        @if(session('error'))
                        <p class="px-6 py-4 text-center text-lg text-red-500">{{ session('error') }}</p>
                        @endif

                        @if($orders->isNotEmpty())
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead class="bg-gray-800 dark:bg-gray-900">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xl font-medium text-gray-300 uppercase tracking-wider">Pedido ID</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xl font-medium text-gray-300 uppercase tracking-wider">Número de Cédula</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xl font-medium text-gray-300 uppercase tracking-wider">Total</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xl font-medium text-gray-300 uppercase tracking-wider">Acciones</th>
                                </tr>
                            </thead>
                            <tbody class="bg-gray-800 dark:bg-gray-900 divide-y divide-gray-700">
                                @foreach ($orders as $order)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-xl font-medium text-white">
                                        {{ $order->id }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-xl text-gray-300">
                                        {{ $order->id_number }} <!-- Campo de número de cédula -->
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-xl text-gray-300">
                                        ${{ number_format($order->total, 2) }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-xl text-yellow-300">
                                        <a href="{{ route('orders.show', $order->id) }}" class="hover:underline">Ver detalles</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @else
                        <p class="px-6 py-4 text-center text-lg text-gray-500 dark:text-gray-400">No hay pedidos disponibles.</p>
                        @endif
                    </div>
                     <!-- Paginación -->
                     <div class="p-6 flex justify-end items-center">
                        <div class="flex bg-gray-800 dark:bg-gray-900 rounded-lg shadow-lg overflow-hidden">
                            <div class="p-2 text-white">
                                Página {{ $orders->currentPage() }} de {{ $orders->lastPage() }}
                            </div>
                            <div class="p-2">
                                @if ($orders->onFirstPage())
                                <span class="text-gray-400 dark:text-gray-600">Anterior</span>
                                @else
                                <a href="{{ $orders->previousPageUrl() }}" class="text-white hover:text-gray-300 dark:hover:text-gray-400">Anterior</a>
                                @endif

                                @if ($orders->hasMorePages())
                                <a href="{{ $orders->nextPageUrl() }}" class="text-white hover:text-gray-300 dark:hover:text-gray-400 ml-4">Siguiente</a>
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
