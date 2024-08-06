<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Editar Producto') }}
        </h2>
    </x-slot>

    <form action="{{ route('productos.update', $producto->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="h-screen w-full">
            <div class="bg-gray-800 mx-auto max-w-6xl mt-12">
                <div class="p-6">
                    <p class="text-5xl text-yellow-500 font-bold">
                        Editar<br />
                        Producto
                    </p>
                </div>
                <div class="mx-12 p-3 rounded-xl shadow-sm bg-gray-900">
                    <div class="p-3 mx-6 border-b border-gray-500">
                        <label for="nombre" class="text-yellow-500">Nombre del producto</label>
                        <input placeholder="Nombre del producto" name="nombre" value="{{ $producto->nombre }}" class="bg-transparent text-yellow-500 w-full focus:outline-none focus:rang" type="text" />
                    </div>
                    <div class="p-3 mx-6 border-b border-gray-500">
                        <label for="nombre" class="text-yellow-500">Descripción del producto</label>
                        <input placeholder="Descripcion" name="descripcion" value="{{ $producto->descripcion }}" class="bg-transparent text-yellow-500 w-full focus:outline-none focus:rang" type="text" />
                    </div>


                    <div class="p-3 mx-6 border-b border-gray-500">
                        <label for="id_categoria" class="text-yellow-500">Categoría del producto</label>
                        <select name="id_categoria" class="bg-transparent text-yellow-500 w-full focus:outline-none" required>
                            <option value="" disabled>Selecciona una categoría</option>
                            @foreach($categorias as $categoria)
                            <option value="{{ $categoria->id }}" {{ $producto->id_categoria == $categoria->id ? 'selected' : '' }}>
                                {{ $categoria->nombre }}
                            </option>
                            @endforeach
                        </select>
                    </div>


                    <div class="p-3 mx-6 border-b border-gray-500">
                        <label for="nombre" class="text-yellow-500">Precio del producto</label>
                        <input placeholder="Precio" name="precio" value="{{ $producto->precio }}" class="bg-transparent text-yellow-500 w-full focus:outline-none focus:rang" type="number" />
                    </div>
                    <div class="p-3 mx-6 border-b border-gray-500">
                        <label for="tamaño" class="text-yellow-500">Tamaño del producto</label>
                        <select name="tamaño" class="bg-transparent text-yellow-300 w-full focus:outline-none" required>
                            <option value="" disabled>Selecciona un tamaño</option>
                            <option value="45g" {{ $producto->tamaño == '45g' ? 'selected' : '' }}>45g</option>
                            <option value="120g" {{ $producto->tamaño == '120g' ? 'selected' : '' }}>120g</option>
                            <option value="170g" {{ $producto->tamaño == '170g' ? 'selected' : '' }}>170g</option>
                            <option value="250g" {{ $producto->tamaño == '250g' ? 'selected' : '' }}>250g</option>
                            <option value="450g" {{ $producto->tamaño == '450g' ? 'selected' : '' }}>450g</option>
                            <option value="500g" {{ $producto->tamaño == '500g' ? 'selected' : '' }}>500g</option>
                            <option value="600g" {{ $producto->tamaño == '600g' ? 'selected' : '' }}>600g</option>
                        </select>
                    </div>
                </div>
                <div class="flex justify-center space-x-4 p-4">
                    <button type="submit" class="bg-yellow-500 p-3 rounded-3xl w-32 hover:bg-yellow-600 text-gray-900">
                        Guardar
                    </button>
                    <a href="{{ route('productos.index') }}" class="flex items-center justify-center bg-yellow-500 p-3 rounded-3xl w-32 hover:bg-yellow-600">
                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5H1m0 0 4 4M1 5l4-4" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </form>
</x-app-layout>