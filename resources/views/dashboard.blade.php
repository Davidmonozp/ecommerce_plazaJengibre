<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-4xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Plaza Jengibre') }}
        </h2>


        <!-- <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar"
            type="button"
            class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
            <span class="sr-only">Open sidebar</span>
            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path clip-rule="evenodd" fill-rule="evenodd"
                    d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                </path>
            </svg>
        </button> -->

        <div class="grid grid-cols-3 gap-8"> 
    <div class="relative w-full aspect-w-4 aspect-h-3"><br><br>
        <p class="absolute top-0 left-0 px-3 py-2 rounded-lg" style="background-image: linear-gradient(45deg, #175a44c3, #0cf5c6); color: white;">Dátiles</p>
        <img src="https://cdn0.ecologiaverde.com/es/posts/1/6/3/datiles_propiedades_beneficios_y_contraindicaciones_4361_600.jpg"
            class="object-cover rounded-lg shadow-2xl" alt="Dátiles" /> 
    </div>
    <div class="relative w-full aspect-w-4 aspect-h-3"><br><br>
        <p class="absolute top-0 left-0 px-3 py-2 rounded-lg" style="background-image: linear-gradient(45deg, #175a44c3, #0cf5c6); color: white;">Frutos Secos</p>
        <img src="https://www.elpais.com.co/resizer/v2/XZSJ2IV7WZD2HF3OHC7FBFWE64.jpg?auth=e7b916b43cf5d5b102268ca9f464ec99f566e65ada3a3c5e12aed13116d0dadb&smart=true&quality=75&width=1280&fitfill=false"
            class="object-cover rounded-lg shadow-2xl" alt="Frutos Secos" /> 
    </div>
    <div class="relative w-full aspect-w-4 aspect-h-3"><br><br>
        <p class="absolute top-0 left-0 px-3 py-2 rounded-lg" style="background-image: linear-gradient(45deg, #175a44c3, #0cf5c6); color: white;">Semillas</p>
        <img src="https://www.infoalimentos.org.ar/images/temas_22/TEMAS_semillas_en_la_alimentacion_imagen_interna_1200x630.jpg"
            class="object-cover rounded-lg shadow-2xl" alt="Semillas" /> 
    </div>
    <div class="relative w-full aspect-w-4 aspect-h-3"><br><br>
        <p class="absolute top-0 left-0 px-3 py-2 rounded-lg" style="background-image: linear-gradient(45deg, #175a44c3, #0cf5c6); color: white;">Cacao</p>
        <img src="https://ipsmisiones.com.ar/wp-content/uploads/2022/02/IMG-20220219-WA0043.jpg"
            class="object-cover rounded-lg shadow-2xl" alt="Cacao" /> 
    </div>
    
</div>

    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">

            </div>
        </div>
    </div>
</x-app-layout>
