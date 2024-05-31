<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Plaza Jengibre') }}
        </h2>     
    </x-slot>

    <form action="{{ route('productos.store') }}" method="POST">
        @csrf
        <div class="h-screen w-full">
            <div class="bg-gray-800 mx-auto max-w-6xl mt-12">
                <div class="p-6">
                    <p class="text-5xl text-yellow-500 font-bold">
                        Crear<br />
                        Producto
                    </p>
                </div>
                <div class="mx-12 p-3 rounded-xl shadow-sm bg-gray-900">
                    <div class="p-3 mx-6 border-b border-gray-500">
                        <input name="nombre" placeholder="Nombre del producto" class="bg-transparent text-yellow-500 w-full focus:outline-none focus:rang" type="text" required />
                    </div>
                    <div class="p-3 mx-6 border-b border-gray-500">
                        <input name="descripcion" placeholder="Descripción del producto" class="bg-transparent text-yellow-500 w-full focus:outline-none focus:rang" type="text" required />
                    </div>
                    <div class="p-3 mx-6 border-b border-gray-500">
                        <input name="id_categoria" placeholder="Id categoria" class="bg-transparent text-yellow-500 w-full focus:outline-none focus:rang" type="text" required />
                    </div>
                    <div class="p-3 mx-6 border-b border-gray-500">
                        <input name="precio" placeholder="Precio" class="bg-transparent text-yellow-500 w-full focus:outline-none focus:rang" type="number" step="0.01" required />
                    </div>
                </div>
                <div class="flex justify-center space-x-4 p-4">
                    <button type="submit" class="bg-yellow-500 p-3 rounded-3xl w-32 hover:bg-yellow-600 text-gray-900">
                        Guardar
                    </button>   
                    <a href="{{ route('productos.index') }}" class="flex items-center justify-center bg-yellow-500 p-3 rounded-3xl w-32 hover:bg-yellow-600">
                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5H1m0 0 4 4M1 5l4-4"/>
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
            .toggle-checkbox:checked + .toggle-label {
                background-color: rgb(241, 131, 4);
            }
        </style>
    </form>
</x-app-layout>
