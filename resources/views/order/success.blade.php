







<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-4xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Pedido Exitoso') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200">¡Gracias por tu compra!</h3>
                    <p class="mt-2 text-gray-600 dark:text-gray-400">Tu pedido ha sido procesado con éxito.</p>
                    
                    <div class="mt-6">
                        <a href="{{ route('carrito.index') }}" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Volver al carrito
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
