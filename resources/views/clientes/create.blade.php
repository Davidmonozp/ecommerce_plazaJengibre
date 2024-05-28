<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Clientes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <section id="contact" class="relative w-full min-h-screen bg-black text-gray-300">
                    <h1 class="text-4xl p-4 font-bold tracking-wide">
                        Registro
                    </h1>
                    <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-gray-800 h-32 w-full"></div>

                    <div class="relative p-5 lg:px-20 flex flex-col md:flex-row items-center justify-center">
                        <!-- Formulario de Registro -->
                        <form action="{{ route('clientes.store') }}" method="POST" class="w-full md:w-1/2 border border-gray-200 p-6 bg-gray-900">
                            @csrf
                            <h2 class="text-2xl pb-3 font-semibold">
                                Registro de cliente
                            </h2>
                            <div>
                                <div class="flex flex-col mb-3">
                                    <label for="cedula">Numero de Cedula</label>
                                    <input type="number" id="cedula" name="cedula" class="px-3 py-2 bg-gray-800 border border-gray-900 focus:border-blue-500 focus:outline-none focus:bg-gray-800 focus:text-blue-500" autocomplete="off">
                                </div>
                                <div class="flex flex-col mb-3">
                                    <label for="nombre">Nombre</label>
                                    <input type="text" id="nombre" name="nombre" class="px-3 py-2 bg-gray-800 border border-gray-900 focus:border-blue-500 focus:outline-none focus:bg-gray-800 focus:text-blue-500" autocomplete="off">
                                </div>
                                <div class="flex flex-col mb-3">
                                    <label for="apellido">Apellidos</label>
                                    <input type="text" id="apellido" name="apellido" class="px-3 py-2 bg-gray-800 border border-gray-900 focus:border-blue-500 focus:outline-none focus:bg-gray-800 focus:text-blue-500" autocomplete="off">
                                </div>
                                <div class="flex flex-col mb-3">
                                    <label for="email">Email</label>
                                    <input type="text" id="email" name="email" class="px-3 py-2 bg-gray-800 border border-gray-900 focus:border-blue-500 focus:outline-none focus:bg-gray-800 focus:text-blue-500" autocomplete="off">
                                </div>
                            </div>
                            <div class="w-full pt-3">
                                <button type="submit" class="w-full bg-gray-900 border border-gray-200 px-4 py-2 transition duration-50 focus:outline-none font-semibold hover:bg-blue-500 hover:text-white text-xl cursor-pointer">
                                    Guardar
                                </button>
                            </div>
                        </form>
                    </div>
                </section>
            </div>
        </div>
    </div>
</x-app-layout>
