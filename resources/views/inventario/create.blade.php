<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-4xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Crear Inventario') }}
        </h2>
    </x-slot>

    <form action="{{ route('inventario.store') }}" method="POST">
        @csrf
        <div class="h-screen w-full">
            <div class="bg-gray-800 mx-auto max-w-6xl mt-12">
                <div class="p-6">
                    <p class="text-5xl text-yellow-500 font-bold">
                        Crear<br />
                        Inventario
                    </p>
                </div>
                <div class="mx-12 p-3 rounded-xl shadow-sm bg-gray-900">
                    <div class="p-3 mx-6 border-b border-gray-500">
                        <label for="id_producto" class="block text-gray-700 dark:text-gray-300 font-semibold">Producto</label>
                        <select id="id_producto" name="id_producto" class="bg-transparent text-yellow-500 w-full focus:outline-none" required>
                            <option value="" disabled selected>Seleccione un producto</option>
                            @foreach ($productos as $producto)
                                <option value="{{ $producto->id }}">{{ $producto->nombre }}</option>
                            @endforeach
                        </select>
                        @error('id_producto')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="p-3 mx-6 border-b border-gray-500">
                        <label for="tamaño" class="block text-gray-700 dark:text-gray-300 font-semibold">Tamaño</label>
                        <select id="tamaño" name="tamaño" class="bg-transparent text-yellow-300 w-full focus:outline-none" required>
                            <option value="" disabled selected>Selecciona un tamaño</option>
                            <option>45g</option>
                            <option>120g</option>
                            <option>170g</option>
                            <option>250g</option>
                            <option>450g</option>
                            <option>500g</option>
                            <option>600g</option>
                        </select>
                        @error('tamaño')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="p-3 mx-6 border-b border-gray-500">
                        <label for="cantidad" class="block text-gray-700 dark:text-gray-300 font-semibold">Cantidad</label>
                        <input type="number" id="cantidad" name="cantidad" class="bg-transparent text-yellow-300 w-full focus:outline-none" required min="0">
                        @error('cantidad')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
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

        <style>
            .toggle-checkbox:checked {
                right: 0;
                border-color: rgb(241, 131, 4);
            }

            .toggle-checkbox:checked+.toggle-label {
                background-color: rgb(241, 131, 4);
            }
        </style>
    </form>
</x-app-layout>
