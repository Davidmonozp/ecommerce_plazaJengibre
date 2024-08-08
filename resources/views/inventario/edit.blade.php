<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Editar Inventario') }}
        </h2>
    </x-slot>

    <form action="{{ route('inventario.update', $inventario->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="h-screen w-full">
            <div class="bg-gray-800 mx-auto max-w-6xl mt-12">
                <div class="p-6">
                    <p class="text-5xl text-yellow-500 font-bold">
                        Editar<br />
                        Inventario
                    </p>
                </div>
                <div class="mx-12 p-3 rounded-xl shadow-sm bg-gray-900">
                    
                    <!-- Campo para visualizar el producto y tamaño, pero no editable -->
                    <div class="p-3 mx-6 border-b border-gray-500">
                        <label class="text-yellow-500">Producto</label>
                        <p class="bg-gray-700 text-yellow-500 p-2 rounded">{{ $inventario->producto->nombre }}</p>
                    </div>

                    <div class="p-3 mx-6 border-b border-gray-500">
                        <label class="text-yellow-500">Tamaño</label>
                        <p class="bg-gray-700 text-yellow-500 p-2 rounded">{{ $inventario->tamaño }}</p>
                    </div>

                    <!-- Campo editable para la cantidad -->
                    <div class="p-3 mx-6 border-b border-gray-500">
                        <label for="cantidad" class="text-yellow-500">Cantidad</label>
                        <input placeholder="Cantidad" name="cantidad" value="{{ $inventario->cantidad }}" class="bg-transparent text-yellow-500 w-full focus:outline-none" type="number" min="0" />
                    </div>
                    
                </div>
                <div class="flex justify-center space-x-4 p-4">
                    <button type="submit" class="bg-yellow-500 p-3 rounded-3xl w-32 hover:bg-yellow-600 text-gray-900">
                        Guardar
                    </button>
                    <a href="{{ route('inventario.index') }}" class="flex items-center justify-center bg-yellow-500 p-3 rounded-3xl w-32 hover:bg-yellow-600">
                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5H1m0 0 4 4M1 5l4-4" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </form>

</x-app-layout>
