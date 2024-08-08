<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-4xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Plaza Jengibre') }}
        </h2>

       
    </x-slot>
 <div class="container mx-auto px-4 py-6">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
                <a href="{{ route('buscar.producto') }}?nombre=maní" class="relative w-full aspect-w-4 aspect-h-3 animate__animated animate__zoomInLeft">
                    <p class="absolute top-0 left-0 px-3 py-2 rounded-lg" style="background-image: linear-gradient(45deg, #175a44c3, #0cf5c6); color: white;">Productos con maní</p><br>
                    <img src="https://thefoodtech.com/wp-content/uploads/2020/11/mani-beneficios-para-la-salud-1.jpg" class="object-cover rounded-lg shadow-2xl" alt="Productos con maní" />
                </a>
                
                <a href="{{ route('buscar.producto') }}?nombre=almendra" class="relative w-full aspect-w-4 aspect-h-3 animate__animated animate__zoomInLeft">
                    <p class="absolute top-0 left-0 px-3 py-2 rounded-lg" style="background-image: linear-gradient(45deg, #175a44c3, #0cf5c6); color: white;">Productos con almendra</p><br>
                    <img src="https://recetasdecocina.elmundo.es/wp-content/uploads/2022/08/almendras.jpg" class="object-cover rounded-lg shadow-2xl" alt="Productos con almendra" />
                </a>
                
                <a href="{{ route('buscar.producto') }}?nombre=nuez" class="relative w-full aspect-w-4 aspect-h-3 animate__animated animate__zoomInLeft">
                    <p class="absolute top-0 left-0 px-3 py-2 rounded-lg" style="background-image: linear-gradient(45deg, #175a44c3, #0cf5c6); color: white;">Productos con nuez</p><br>
                    <img src="https://www.eluniversal.com.mx/resizer/9qOeGhx1QcJrqBnz5-VwBhqt_Bc=/arc-photo-eluniversal/arc2-prod/public/7NSVL3FONVHNRCLJPKZLLGVDMU.jpg" class="object-cover rounded-lg shadow-2xl" alt="Productos con nuez" />
                </a>

                <a href="{{ route('buscar.producto') }}?nombre=semillas" class="relative w-full aspect-w-4 aspect-h-3 animate__animated animate__zoomInLeft">
                    <p class="absolute top-0 left-0 px-3 py-2 rounded-lg" style="background-image: linear-gradient(45deg, #175a44c3, #0cf5c6); color: white;">Productos Semillas</p><br>
                    <img src="https://i.blogs.es/13d967/1366_20001/1366_2000.jpg" class="object-cover rounded-lg shadow-2xl" alt="Productos semillas" />
                </a>

                <a href="{{ route('buscar.producto') }}?nombre=chocolate" class="relative w-full aspect-w-4 aspect-h-3 animate__animated animate__zoomInLeft">
                    <p class="absolute top-0 left-0 px-3 py-2 rounded-lg" style="background-image: linear-gradient(45deg, #175a44c3, #0cf5c6); color: white;">Productos con cacao</p><br>
                    <img src="https://thefoodtech.com/wp-content/uploads/2020/09/cacao-y-chocolate.jpg" class="object-cover rounded-lg shadow-2xl" alt="Productos con cacao" />
                </a>

                <a href="{{ route('buscar.producto') }}?nombre=deshidrata" class="relative w-full aspect-w-4 aspect-h-3 animate__animated animate__zoomInLeft">
                    <p class="absolute top-0 left-0 px-3 py-2 rounded-lg" style="background-image: linear-gradient(45deg, #175a44c3, #0cf5c6); color: white;">Frutas deshidratadas</p><br>
                    <img src="https://saludycardiologia.com/wp-content/uploads/2018/02/cardio-26.jpg" class="object-cover rounded-lg shadow-2xl" alt="Frutas deshidratadas" />
                </a>

                
            </div>
        </div>
</x-app-layout>

