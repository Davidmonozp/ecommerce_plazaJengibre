<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-4xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Checkout') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <form method="POST" action="{{ route('checkout.store') }}">
                    @csrf

                    <div class="p-6">
                        <!-- Información del Cliente -->
                        <div class="space-y-4">
                            <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200">Información del Cliente</h3>
                            <input type="text" name="name" placeholder="Nombre completo" class="block w-full mt-1 p-2 border rounded" required>
                            <input type="text" name="address" placeholder="Dirección" class="block w-full mt-1 p-2 border rounded" required>
                            <input type="text" name="city" placeholder="Ciudad" class="block w-full mt-1 p-2 border rounded" required>
                            <input type="text" name="id_number" placeholder="Número de Cédula" class="block w-full mt-1 p-2 border rounded" required>
                            @error('id_number')
                                <p class="text-red-600 dark:text-red-400 text-sm mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Información de Pago -->
                        <div class="space-y-4 mt-6">
                            <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200">Información de Pago</h3>
                            <input type="text" name="payment_method" placeholder="Método de Pago" class="block w-full mt-1 p-2 border rounded" required>
                        </div>

                        <!-- Resumen del Pedido -->
                        <div class="space-y-4 mt-6">
                            <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200">Resumen del Pedido</h3>
                            @foreach ($cart as $id => $item)
                                <div class="flex justify-between py-2 border-b">
                                    <span>{{ $item['nombre'] }}</span>
                                    <span>{{ $item['cantidad'] }} x ${{ $item['precio'] }} = ${{ $item['cantidad'] * $item['precio'] }}</span>
                                </div>
                            @endforeach
                            <div class="flex justify-between py-2 border-b mt-4">
                                <span>Total:</span>
                                <span>${{ $total }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="p-6">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Confirmar Pedido
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
