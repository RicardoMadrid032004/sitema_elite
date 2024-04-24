<script setup>
import WelcomeLayout from '@/Layouts/WelcomeLayout.vue';
import LogoElite from '@/Components/LogoElite.vue';
import GreenButton from '@/Components/GreenButton.vue'
import { Link, } from '@inertiajs/vue3';
import Elite from '@/Components/Elite.vue';
import Footter from '@/Components/Footter.vue'
import Swal from 'sweetalert2';
import { ref } from 'vue';
import { usePage } from '@inertiajs/vue3';
import { initFlowbite } from 'flowbite';


const props = defineProps({
	webcategorias: {
		type: Object
	}
});
const webcategorias = ref(usePage().props.webcategorias);

document.addEventListener('DOMContentLoaded', () => {
    initFlowbite();
});
</script>

<template>
    <div>
        <WelcomeLayout  title="BIENVENIDO">
            <!-- <div id="default-carousel" class="relative w-full" data-carousel="slide">
          
                <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
          
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="/logo/a1.png" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                    </div>
                 
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="/logo/portada.png" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                    </div>
                </div>
          
                <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
                </div>
                
                <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
                    <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                        <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                        </svg>
                        <span class="sr-only">Previous</span>
                    </span>
                </button>
                <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
                    <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                        <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                        </svg>
                        <span class="sr-only">Next</span>
                    </span>
                </button>
            </div> -->

            
            <div>
                <div class="image-container">
                    <img class="image" src="/logo/a1.png" alt="Logo">
                </div>
            </div>
            <div class="container  mx-auto px-12 py-1 flex">
                <h1 class="border py-1 bg-green-600 rounded border-green-600 w-full"></h1>
            </div>
            <div class="mt-4 container mx-auto text-yellow-400 uppercase text-xl md:text-3xl font-medium px-4 sm:px-12">
                <div class="px-4 sm:px-12 custom-text">Bienvenido: ¡A la academia de estudios Elite!</div>
            </div>
            <div class="container mx-auto px-4 sm:px-10 py-0">
                <div class="text-white p-1 px-0 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-1 gap-0">
                    <div class="text-bol text-lg sm:text-2xl px-4 sm:px-12">
                        <p class="text-black mx-3 mt-3">
                            <div v-for="webcategoria in webcategorias" :key="webcategoria.id">
                                <div v-if="webcategoria.id === 1" v-for="webitem in webcategoria.webitems" :key="webitem.id">
                                    <p>{{ webitem.text1 }}</p>
                                </div>
                            </div>
                        </p><br>
                    </div>
                </div>
            </div>
            <!-- <div class="container mx-auto px-4 sm:px-12 py-0">
                <div class="text-white p-2 px-0 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-1 gap-0">
                    <div class="px-4 sm:px-12">
                        <p class="mx-3 mt-3 text-lg sm:text-2xl text-black"><b>Nos enorgullece ser tu guía en el emocionate viaje educativo. Más que una academia , somos una comunidad comprometida con tu meta escolar y preuniversitaria. Aquí no solo te preparamos para los desafíos académicos , si no también necesitas para alcanzar tu meta.</p><br>
                    </div>
                </div>
            </div> -->
            <div class="w-full  h-3/4">
                <div v-for="webcategoria in webcategorias" :key="webcategoria.id">
                    <div v-if="webcategoria.id === 1" v-for="webitem in webcategoria.webitems" :key="webitem.id">
                        <img :src="'/img/productos/' + webitem.image1" alt="Imagen" class="w-full h-full object-cover">
                    </div>
                </div>
            </div>  
            
            <div class="container mx-auto text-yellow-400 mt-4 uppercase text-xl md:text-3xl font-bold px-4 sm:px-12">
                <div class="px-4 sm:px-12 custom-text">Elite <b class="mx-2 md:mx-5">¿Quiénes Somos?</b></div>
            </div>
            <div class="container mx-auto px-4 sm:px-10 py-0">
                <div class="text-white p-1 px-0 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-1 gap-0">
                    <div class="text-bol text-lg sm:text-2xl px-4 sm:px-12">
                        <p class="text-black mx-3 mt-3">
                            <div v-for="webcategoria in webcategorias" :key="webcategoria.id">
                                <div v-if="webcategoria.id === 1" v-for="webitem in webcategoria.webitems" :key="webitem.id">
                                    <p>{{ webitem.text2 }}</p>
                                </div>
                            </div>
                        </p><br>
                    </div>
                </div>
            </div>

            <!-- <div class="container mx-auto px-4 sm:px-12 py-0">
                <div class="text-white p-2 px-0 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-1 gap-0">
                    <div class="px-4 sm:px-12">
                        <p class="mx-3 mt-3 text-lg sm:text-2xl text-black"><b>Academia estudio elite</b> es una institución que se creó con el propósito de crear un cambio significativo en la educación universitaria peruana brindando el apoyo necesario a los estudiantes, sobre todo a los que no tienen acceso a una educación básica de calidad. Asimismo, <b>estamos comprometidos</b> con ser un referente en la educación integral para fomentar los valores éticos y morales en nuestra comunidad elitina.</p><br>
                    </div>
                </div>
            </div> -->

            <div class="w-full  h-3/4">
                <div v-for="webcategoria in webcategorias" :key="webcategoria.id">
                    <div v-if="webcategoria.id === 1" v-for="webitem in webcategoria.webitems" :key="webitem.id">
                        <img :src="'/img/productos/' + webitem.image2" alt="Imagen" class="w-full h-full object-cover">
                    </div>
                </div>
            </div> 
            <div class="w-full mx-auto ">
                <div class="bg-black text-white p-0 px-0 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 gap-0 ">
                    <div class="text-center">
                        <div v-for="webcategoria in webcategorias" :key="webcategoria.id">
                            <div v-if="webcategoria.id === 1" v-for="webitem in webcategoria.webitems" :key="webitem.id">
                                <img :src="'/img/productos/' + webitem.image3" alt="Imagen" class="w-full h-full object-cover">
                            </div>
                        </div>
                    </div>
                    <div class="text-center bg-green-400">
                        <div v-for="webcategoria in webcategorias" :key="webcategoria.id">
                            <div v-if="webcategoria.id === 1" v-for="webitem in webcategoria.webitems" :key="webitem.id">
                                <img :src="'/img/productos/' + webitem.image4" alt="Imagen" class="w-full h-full object-cover">
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
            
         
            <div class="w-full py-1 h-3/4">
                <img class="w-full h-full object-cover" src="/logo/imagen 02.png" style="height: auto; height: auto;">
            </div>
            <div id="jomar" class="text-white bg-gray-800 py-8 md:py-12">
                <div class="container mx-auto px-4 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4">
                    <div class="text-center">
                        <div class="text-center mx-auto">
                            <a href="#">
                                <img src="/logo/piep.png" alt="Logo Elite" class="w-full h-full object-cover" style="height: auto; height: auto;" />
                            </a>
                        </div>
                        <Link :href="route('elite')" class="bg-green-500 hover:bg-green-700 text-white text-sm font-bold py-2 px-4 uppercase rounded-2xl mt-4 block">¿Quiénes SOMOS?</Link>
                    </div>
                    <div class="text-center">
                        <h2 class="text-2xl md:text-3xl font-semibold">ELITE</h2>
                        <p class="text-lg font-semibold">VISIÓN MISIÓN</p>
                        <p class="text-lg font-semibold">FILOSOFÍA</p>
                    </div>
                    <div class="text-center">
                        <p class="text-2xl md:text-3xl font-semibold">SERVICIOS</p>
                        <p class="text-lg font-semibold">CICLOS PRE-U</p>
                        <p class="text-lg font-semibold">CICLOS ESCOLARES</p>
                    </div>
                    <div class="text-center">
                        <p class="text-2xl md:text-3xl font-semibold">REGALOS</p>
                        <p class="text-lg font-semibold">TEMARIOS</p>
                        <p class="text-lg font-semibold">MÓDULOS</p>
                        <p class="text-lg font-semibold">SIMULACROS</p>
                    </div>
                </div>
            </div>

            <Footter/>
            
            <!-- <a href="https://api.whatsapp.com/send?phone=940557994" target="_blank" rel="noopener noreferrer" class="whatsapp-float">
                <i class="fab fa-whatsapp whatsapp-icon fa-xl"></i>
                <span class="whatsapp-text">¿Cómo podemos ayudarte?</span>
                target="_blank" href="https://wa.me/51940557994?text=Hola+estoy+interesado+en+el+Producto%3A+{{$producto->name}}"
            </a> -->
            <a href="https://wa.me/51940557994?text=Hola+estoy+interesado+mas+informacion+a%3A+detalle" target="_blank" rel="noopener noreferrer" class="whatsapp-float">
                <i class="fab fa-whatsapp whatsapp-icon fa-xl"></i>
                <span class="whatsapp-text">¿Cómo podemos ayudarte?</span>
            </a>
        </WelcomeLayout>
    </div>
</template>

<style scoped>

#jomar {
  background-image: url("https://printdeco.ru/wp-content/uploads/2023/07/Art.-20074-CHernaya-stena-loft.jpg");
}

.custom-text {
    font-weight: 700;
    text-shadow: 2px 2px 0px #000;
}

.whatsapp-float {
        position: fixed;
        bottom: 20px;
        right: 20px;
        background-color: #25d366; /* Color verde de WhatsApp */
        color: white;
        border-radius: 20px;
        padding: 10px;
        z-index: 1000;
        text-decoration: none;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
        display: flex;
        align-items: center;
    }

    .whatsapp-float:hover {
        background-color: #128c7e; /* Cambio de color al pasar el mouse */
    }

    .whatsapp-text {
        margin-left: 10px;
        font-size: 14px;
    }
    
</style>