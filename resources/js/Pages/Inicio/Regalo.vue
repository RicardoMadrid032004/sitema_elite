<script setup>
import WelcomeLayout from '@/Layouts/WelcomeLayout.vue';
import { computed } from 'vue';
import Footter from '@/Components/Footter.vue';
import { ref } from 'vue';
import { Link, usePage } from '@inertiajs/vue3';


const props = defineProps({
	webcategorias: {
		type: Object
	}
});
const webcategorias = ref(usePage().props.webcategorias);
</script>

<template>
    <div>
        <WelcomeLayout title="Profile">
          <!-- <div>
                <div class="w-full  h-1/2"><br><br><br><br><br>
                    <img class="w-full h-full object-cover" src="/logo/regalop.png" style="height: auto; height: auto;">
                </div>
           </div> -->
           <div>
                <div class="image-container">
                    <img class="image" src="/logo/regalop.png" alt="Logo">
                </div>
            </div>
           <div class="container  mx-auto px-12 py-1 flex">
                <h1 class="border py-1 bg-green-600 rounded border-green-600 w-full"></h1>
            </div>
            <div class="mt-4 container mx-auto text-yellow-400 uppercase text-xl md:text-3xl font-medium px-4 sm:px-12">
                <div class="px-4 sm:px-12 custom-text">temario</div>
            </div>
            <div class="container mx-auto px-4 sm:px-10 py-0">
                <div class="text-white p-1 px-0 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-1 gap-0">
                    <div class="text-bol text-lg sm:text-2xl px-4 sm:px-12">
                        <p class="text-black mx-3 mt-3">
                            <div v-for="webcategoria in webcategorias" :key="webcategoria.id">
                                 <div v-if="webcategoria.id === 3" v-for="webitem in webcategoria.webitems" :key="webitem.id">
                                <p>{{ webitem.text1 }}</p>
                                </div>
                            </div>
                        </p><br>
                    </div>
                </div>
            </div>

            <div class="w-full  h-3/4">
                <div v-for="webcategoria in webcategorias" :key="webcategoria.id">
                    <div v-if="webcategoria.id === 1" v-for="webitem in webcategoria.webitems" :key="webitem.id">
                        <img :src="'/img/productos/' + webitem.image2" alt="Imagen" class="w-full h-full object-cover">
                    </div>
                </div>
            </div>
            <div class="mt-4 container mx-auto text-yellow-400 uppercase text-xl md:text-3xl font-medium px-4 sm:px-12">
                <div class="px-4 sm:px-12 custom-text">modulos</div>
            </div>
            <div class="container mx-auto px-4 sm:px-10 py-0">
                <div class="text-white p-1 px-0 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-1 gap-0">
                    <div class="text-bol text-lg sm:text-2xl px-4 sm:px-12">
                        <p class="text-black mx-3 mt-3">
                            <div v-for="webcategoria in webcategorias" :key="webcategoria.id">
                                 <div v-if="webcategoria.id === 3" v-for="webitem in webcategoria.webitems" :key="webitem.id">
                                <p>{{ webitem.text2 }}</p>
                                </div>
                            </div>
                        </p><br>
                    </div>
                </div>
            </div>

            <div class="w-full  h-3/4">
                <div v-for="webcategoria in webcategorias" :key="webcategoria.id">
                    <div v-if="webcategoria.id === 1" v-for="webitem in webcategoria.webitems" :key="webitem.id">
                        <img :src="'/img/productos/' + webitem.image2" alt="Imagen" class="w-full h-full object-cover">
                    </div>
                </div>
            </div>
            <div class="mt-4 container mx-auto text-yellow-400 uppercase text-xl md:text-3xl font-medium px-4 sm:px-12">
                <div class="px-4 sm:px-12 custom-text">simulacros</div>
            </div>
            <div class="container mx-auto px-4 sm:px-10 py-0">
                <div class="text-white p-1 px-0 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-1 gap-0">
                    <div class="text-bol text-lg sm:text-2xl px-4 sm:px-12">
                        <p class="text-black mx-3 mt-3">
                            <div v-for="webcategoria in webcategorias" :key="webcategoria.id">
                                 <div v-if="webcategoria.id === 3" v-for="webitem in webcategoria.webitems" :key="webitem.id">
                                <p>{{ webitem.text3 }}</p>
                                </div>
                            </div>
                        </p><br>
                    </div>
                </div>
            </div>

            <div class="w-full  h-3/4">
                <div v-for="webcategoria in webcategorias" :key="webcategoria.id">
                    <div v-if="webcategoria.id === 1" v-for="webitem in webcategoria.webitems" :key="webitem.id">
                        <img :src="'/img/productos/' + webitem.image2" alt="Imagen" class="w-full h-full object-cover">
                    </div>
                </div>
            </div> 
            <div class="w-full  h-3/4">
                <img class="w-full h-full object-cover" src="/logo/imagen 01.png" style="height: auto; height: auto;">
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

</style>