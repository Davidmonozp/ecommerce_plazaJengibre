<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-4xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Carrito de Compras') }}
        </h2>
    </x-slot>

    <div class="py-12 animate__animated animate__flipInY">
        <div class="flex">
            <div class="w-64 hidden lg:block bg-gray-200 dark:bg-gray-700"></div>

            <div class="flex-1 max-w-8xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                    @if (empty($carrito))
                    <div class="p-6 text-center">
                        <p class="text-gray-500">Tu carrito está vacío.</p>
                    </div>
                    @else
                    <div class="p-6">
                        <div class="space-y-4">
                            @foreach ($carrito as $id => $item)
                            <div class="flex items-center justify-between bg-gray-100 dark:bg-gray-900 rounded-lg p-4 shadow-md">
                                <div class="flex items-center space-x-4">
                                    <div class="w-24 h-24 flex-shrink-0">
                                        <img src="{{ asset('storage/' . $item['imagen']) }}" alt="Imagen del producto" class="w-full h-full object-cover rounded-lg">


                                    </div>
                                    <div class="flex-1">
                                        <h4 class="text-lg font-bold text-gray-800 dark:text-gray-200">{{ $item['nombre'] }}</h4>
                                        <p class="text-gray-600 dark:text-gray-400">{{ $item['descripcion'] }}</p>
                                        <div class="flex items-center justify-between mt-2">
                                            <span class="text-green-600 font-semibold"> $ {{ number_format($item['precio'], 2) }} </span>
                                            <span class="text-gray-600 dark:text-gray-400">Cantidad: {{ $item['cantidad'] }}</span>
                                        </div>
                                    </div>
                                    <form action="{{ route('carrito.eliminar', $id) }}" method="POST" onsubmit="return confirm('¿Está seguro de que desea eliminar este producto del carrito?');">
                                        @csrf
                                        @method('POST')
                                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-3 rounded">Eliminar</button>
                                    </form>
                                </div>
                            </div>
                            @endforeach
                        </div>

                        <div class="mt-6 p-4 bg-gray-100 dark:bg-gray-900 rounded-lg shadow-md">
                            <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200">Resumen del Carrito</h3>
                            <div class="flex justify-between mt-2">
                                <span class="text-gray-600 dark:text-gray-400">Total Items: <span class="font-semibold text-gray-900"> {{ count($carrito) }}</span></span>

                            </div>
                            <div class="flex justify-between mt-2">
                                <span class="text-gray-600 dark:text-gray-400">Total: <span class="font-semibold text-gray-900"> $ {{ number_format($total, 2) }}</span></span>


                            </div>
                            <a href="{{ route('checkout.index') }}" class="mt-4 inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Proceder al Pago</a>
                        </div>

                    </div>
                    @endif

                    <div class="p-6 flex justify-between items-center">
                        <a href="{{ route('productos.index') }}" class="inline-block">
                            <button type="button" class="text-white bg-yellow-500 hover:bg-yellow-300 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-lg p-3 text-center inline-flex items-center space-x-2 dark:bg-yellow-600 dark:hover:bg-yellow-700 dark:focus:ring-yellow-800">
                                <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10 2L2 10h3v7h10v-7h3L10 2z" />
                                </svg>
                                <span class="font-medium">Volver a Productos</span>
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>