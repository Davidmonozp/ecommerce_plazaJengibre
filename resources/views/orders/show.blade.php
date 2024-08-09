<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-4xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Detalles del Pedido') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="flex">
            <!-- Espacio adicional para el menú lateral -->
            <div class="w-64 hidden lg:block bg-gray-200 dark:bg-gray-700"></div>

            <div class="flex-1 max-w-8xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="flex items-center justify-between px-6 py-4">
                        <h3 class="font-bold text-5xl">Resumen del Pedido {{ $order->id_number }} </h3>
                    </div>

                    <div class="overflow-x-auto px-4 py-6">
                        @if($order)
                            <div class="space-y-4">
                                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                    <thead class="bg-gray-800 dark:bg-gray-900">
                                        <tr>
                                            <th scope="col" class="px-6 py-3 text-left text-xl font-medium text-gray-300 uppercase tracking-wider">Producto</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xl font-medium text-gray-300 uppercase tracking-wider">Cantidad</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xl font-medium text-gray-300 uppercase tracking-wider">Precio</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xl font-medium text-gray-300 uppercase tracking-wider">Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-gray-800 dark:bg-gray-900 divide-y divide-gray-700">
                                        @foreach ($order->orderItems as $orderItem)
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap text-xl font-medium text-white">
                                                    {{ $orderItem->product->nombre }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-xl text-gray-300">
                                                    {{ $orderItem->quantity }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-xl text-gray-300">
                                                    ${{ $orderItem->price }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-xl text-gray-300">
                                                    ${{ $orderItem->quantity * $orderItem->price }}
                                                </td>
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <td colspan="3" class="px-6 py-4 text-right text-xl font-medium text-gray-300">Total:</td>
                                            <td class="px-6 py-4 text-xl text-gray-300">
                                                ${{ $order->orderItems->sum(function($item) {
                                                    return $item->quantity * $item->price;
                                                }) }}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <p class="px-6 py-4 text-center text-lg">No se encontró la orden.</p>
                        @endif
                    </div>

                    <!-- Botón de regreso -->
                    <div class="p-6 flex justify-between items-center">
                    <a href="{{ route('orders.index') }}" class="inline-block">
                        <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-lg p-3 text-center inline-flex items-center space-x-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5H1m0 0l4-4m-4 4l4 4" />
                            </svg>
                            <span class="font-medium">Pedidos</span>
                        </button>
                    </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

