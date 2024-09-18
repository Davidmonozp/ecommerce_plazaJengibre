<x-app-layout>
<x-slot name="header">
    <div style="display: flex; align-items: center;">
        <h2 class="font-semibold text-4xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Plaza Jengibre') }}
        </h2>
    </div>
</x-slot>

    <div class="container mx-auto px-4 py-5">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
            <a href="{{ route('buscar.producto') }}?nombre=maní" class="relative w-full aspect-w-4 aspect-h-3 animate__animated animate__zoomInLeft">
                <p class="absolute top-0 left-0 px-3 py-2 rounded-lg" style="background-image: linear-gradient(45deg, #175a44c3, #0cf5c6); color: white;">Productos con maní</p><br>
                <img src="https://thefoodtech.com/wp-content/uploads/2020/11/mani-beneficios-para-la-salud-1.jpg" class="object-cover rounded-lg shadow-2xl" alt="Productos con maní" /><br>
                <h2 class="text-3xl font-bold mb-2">Los Beneficios del Maní: Un Snack Saludable y Versátil</h2>
                <p class="text-m">Incorpóralo a tu dieta y aprovecha sus numerosos beneficios para la salud. Es rico en nutrientes, aporta energía y ayuda a reducir el colesterol LDL, promoviendo mejor salud en el corazón ¡Visita Plaza Jengibre para encontrar una variedad de productos de maní de alta calidad y descubre cómo este pequeño gigante puede hacer una gran diferencia en tu vida!</p>
            </a>

            <a href="{{ route('buscar.producto') }}?nombre=almendra" class="relative w-full aspect-w-4 aspect-h-3 animate__animated animate__zoomInLeft">
                <p class="absolute top-0 left-0 px-3 py-2 rounded-lg" style="background-image: linear-gradient(45deg, #175a44c3, #0cf5c6); color: white;">Productos con almendra</p><br>
                <img src="https://recetasdecocina.elmundo.es/wp-content/uploads/2022/08/almendras.jpg" class="object-cover rounded-lg shadow-2xl" alt="Productos con almendra" /><br>
                <h2 class="text-3xl font-bold mb-2">Los Beneficios de los Productos con Almendra: Un Toque Nutritivo para Tu Dieta</h2>
                <p class="text-m">Las almendras no solo son deliciosas, sino que también están cargadas de beneficios para la salud. Incluir productos con almendra en tu dieta puede ser una excelente manera de mejorar tu bienestar general. ¡Descubre nuestra selección de productos con almendra en Plaza Jengibre y dale un impulso nutritivo a tu día!
                </p>
            </a>

            <a href="{{ route('buscar.producto') }}?nombre=nuez" class="relative w-full aspect-w-4 aspect-h-3 animate__animated animate__zoomInLeft">
                <p class="absolute top-0 left-0 px-3 py-2 rounded-lg" style="background-image: linear-gradient(45deg, #175a44c3, #0cf5c6); color: white;">Productos con nuez</p><br>
                <img src="https://www.eluniversal.com.mx/resizer/9qOeGhx1QcJrqBnz5-VwBhqt_Bc=/arc-photo-eluniversal/arc2-prod/public/7NSVL3FONVHNRCLJPKZLLGVDMU.jpg" class="object-cover rounded-lg shadow-2xl" alt="Productos con nuez" /><br>
                <h2 class="text-3xl font-bold mb-2">Nuez: Nutrición y Sabor en Cada Bocado</h2>
                <p class="text-m">Las nueces no solo aportan un sabor delicioso y crujiente, sino que también están repletas de beneficios para la salud. Incluir productos que contienen nuez en tu dieta puede ofrecerte una variedad de ventajas nutricionales: Ricas en nutrientes, beneficios cardiovasculares, mejora en la salud del cerebro, apoya la digestion y ayuda a controlar el peso. ¡Visita Plaza Jengibrepara explorar nuestras opciones y añadir un toque nutritivo y sabroso a tu dieta!</p>
            </a>

            <a href="{{ route('buscar.producto') }}?nombre=semillas" class="relative w-full aspect-w-4 aspect-h-3 animate__animated animate__zoomInLeft">
                <p class="absolute top-0 left-0 px-3 py-2 rounded-lg" style="background-image: linear-gradient(45deg, #175a44c3, #0cf5c6); color: white;">Productos Semillas</p><br>
                <img src="https://i.blogs.es/13d967/1366_20001/1366_2000.jpg" class="object-cover rounded-lg shadow-2xl" alt="Productos semillas" /><br>
                <h2 class="text-3xl font-bold mb-2">Productos con Semillas ¡Nutrición al Alcance de tu Mano!</h2>
                <p class="text-m">Las semillas, como las de chía, cáñamo y girasol, están llenas de nutrientes esenciales. Son ricas en proteínas, ácidos grasos omega-3, antioxidantes, y minerales como hierro y zinc, que son vitales para tu bienestar general. ¡Visítanos y descubre cómo las semillas pueden enriquecer tu alimentación!</p>
            </a>

            <a href="{{ route('buscar.producto') }}?nombre=chocolate" class="relative w-full aspect-w-4 aspect-h-3 animate__animated animate__zoomInLeft">
                <p class="absolute top-0 left-0 px-3 py-2 rounded-lg" style="background-image: linear-gradient(45deg, #175a44c3, #0cf5c6); color: white;">Productos con cacao</p><br>
                <img src="https://thefoodtech.com/wp-content/uploads/2020/09/cacao-y-chocolate.jpg" class="object-cover rounded-lg shadow-2xl" alt="Productos con cacao" /><br>
                <h2 class="text-3xl font-bold mb-2"> Los Beneficios del Cacao: Un Superalimento para tu Salud </h2>
                <p class="text-m"> El cacao, más allá de su delicioso sabor, es un superalimento repleto de beneficios: es rico en antioxidantes que protegen las células, mejora la salud cardiovascular al reducir la presión arterial y mejorar la circulación, eleva el estado de ánimo al estimular la liberación de endorfinas, apoya la función cognitiva, y promueve una piel saludable e hidratada. Descubre estos beneficios con nuestros productos de cacao en Plaza Jengibre y añade un toque nutritivo a tu dieta.</p>
            </a>

            <a href="{{ route('buscar.producto') }}?nombre=deshidrata" class="relative w-full aspect-w-4 aspect-h-3 animate__animated animate__zoomInLeft">
                <p class="absolute top-0 left-0 px-3 py-2 rounded-lg" style="background-image: linear-gradient(45deg, #175a44c3, #0cf5c6); color: white;">Frutas deshidratadas</p><br>
                <img src="https://saludycardiologia.com/wp-content/uploads/2018/02/cardio-26.jpg" class="object-cover rounded-lg shadow-2xl" alt="Frutas deshidratadas" /><br>
                <h2 class="text-3xl font-bold mb-2">¡Descubre los Poderosos Beneficios de las Frutas Deshidratadas!</h2>
                <p class="text-m">Ofrecen una manera conveniente y nutritiva de disfrutar los beneficios de la fruta durante todo el año. Al eliminar el agua, las frutas se concentran en sabor y nutrientes, preservando vitaminas, minerales y antioxidantes esenciales. Son ricas en fibra, lo que favorece la digestión y ayuda a mantener la saciedad. Incluir frutas deshidratadas en tu dieta puede apoyar una alimentación equilibrada y ofrecer un toque natural y delicioso a tus comidas.</p>
            </a>


        </div>
    </div>
</x-app-layout>