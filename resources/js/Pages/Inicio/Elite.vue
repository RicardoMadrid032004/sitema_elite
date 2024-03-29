<script setup>
import WelcomeLayout from '@/Layouts/WelcomeLayout.vue';
import { computed } from 'vue';
import Footter from '@/Components/Footter.vue';

</script>

<template>
    <div>
        <WelcomeLayout title="Profile">
          <div>
                <div class="w-full  h-1/2"><br><br><br><br><br>
                    <img class="w-full h-full object-cover" src="/logo/portada.png" style="height: auto; height: auto;">
                </div>
           </div>
           <div class="container  mx-auto px-12 py-1 flex">
                <h1 class="border py-1 bg-green-600 rounded border-green-600 w-full"></h1>
            </div>
            <div class="mt-4 container mx-auto text-yellow-400 uppercase text-xl md:text-3xl font-medium px-4 sm:px-12">
                <div class="px-4 sm:px-12 custom-text">Elite: ¿Quiénes SOMOS?</div>
            </div>


            <div class="container mx-auto px-4 sm:px-10 py-0">
                <div class="text-white p-1 px-0 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-1 gap-0">
                    <div class="text-bol text-lg sm:text-2xl px-4 sm:px-12">
                        <p class="text-black mx-3 mt-3">Nos <b>enorgullece ser tu guía</b> en el emocionante viaje educativo. Más que una academia, <b>somos una comunidad comprometida</b> con tu meta escolar y preuniversitaria. Aquí, no solo te preparamos para los desafíos académicos, sino también para los necesarios <b>para alcanzar tus metas</b>.</p><br>
                    </div>
                </div>
            </div>

            <div class="w-full  h-3/4">
                <img class="w-full h-full object-cover" src="/logo/02.png" style="height: auto; height: auto;">
            </div>
            <div class="mt-4 container mx-auto text-yellow-400 uppercase text-xl md:text-3xl font-medium px-4 sm:px-12">
                <div class="px-4 sm:px-12 custom-text">Elite: ¡Visión y Misión!</div>
            </div>


            <div class="container mx-auto px-4 sm:px-10 py-0">
                <div class="text-white p-1 px-0 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-1 gap-0">
                    <div class="text-bol text-lg sm:text-2xl px-4 sm:px-12">
                        <p class="text-black mx-3 mt-3">Nos <b>enorgullece ser tu guía</b> en el emocionante viaje educativo. Más que una academia, <b>somos una comunidad comprometida</b> con tu meta escolar y preuniversitaria. Aquí, no solo te preparamos para los desafíos académicos, sino también para los necesarios <b>para alcanzar tus metas</b>.</p><br>
                    </div>
                </div>
            </div>
 
            <div class="w-full  h-3/4">
                <img class="w-full h-full object-cover" src="/logo/02.png" style="height: auto; height: auto;">
            </div>
            <div class="mt-4 container mx-auto text-yellow-400 uppercase text-xl md:text-3xl font-medium px-4 sm:px-12">
                <div class="px-4 sm:px-12 custom-text">Filosofía</div>
            </div>


            <div class="container mx-auto px-4 sm:px-10 py-0">
                <div class="text-white p-1 px-0 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-1 gap-0">
                    <div class="text-bol text-lg sm:text-2xl px-4 sm:px-12">
                        <p class="text-black mx-3 mt-3">Nos <b>enorgullece ser tu guía</b> en el emocionante viaje educativo. Más que una academia, <b>somos una comunidad comprometida</b> con tu meta escolar y preuniversitaria. Aquí, no solo te preparamos para los desafíos académicos, sino también para los necesarios <b>para alcanzar tus metas</b>.</p><br>
                    </div>
                </div>
            </div>

            <div class="w-full  h-3/4">
                <img class="w-full h-full object-cover" src="/logo/02.png" style="height: auto; height: auto;">
            </div> 
            <div class="mt-4 container mx-auto text-yellow-400 uppercase text-xl md:text-3xl font-medium px-4 sm:px-12">
                <div class="px-4 sm:px-12 custom-text">Por qué elegir Elite</div>
            </div>


            <div class="container mx-auto px-4 sm:px-10 py-0">
                <div class="text-white p-1 px-0 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-1 gap-0">
                    <div class="text-bol text-lg sm:text-2xl px-4 sm:px-12">
                        <p class="text-black mx-3 mt-3">Nos <b>enorgullece ser tu guía</b> en el emocionante viaje educativo. Más que una academia, <b>somos una comunidad comprometida</b> con tu meta escolar y preuniversitaria. Aquí, no solo te preparamos para los desafíos académicos, sino también para los necesarios <b>para alcanzar tus metas</b>.</p><br>
                    </div>
                </div>
            </div>
            <div class="w-full  h-3/4">
                <img class="w-full h-full object-cover" src="/logo/02.png" style="height: auto; height: auto;">
            </div>
            <div class="mt-4 container mx-auto text-yellow-400 uppercase text-xl md:text-3xl font-medium px-4 sm:px-12">
                <div class="px-4 sm:px-12 custom-text">Valores institucionales</div>
            </div>


            <div class="container mx-auto px-4 sm:px-10 py-0">
                <div class="text-white p-1 px-0 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-1 gap-0">
                    <div class="text-bol text-lg sm:text-2xl px-4 sm:px-12">
                        <p class="text-black mx-3 mt-3">Nos <b>enorgullece ser tu guía</b> en el emocionante viaje educativo. Más que una academia, <b>somos una comunidad comprometida</b> con tu meta escolar y preuniversitaria. Aquí, no solo te preparamos para los desafíos académicos, sino también para los necesarios <b>para alcanzar tus metas</b>.</p><br>
                    </div>
                </div>
            </div> 
            <div id="jomar" class="text-white bg-gray-800 py-8 md:py-12">
                <div class="container mx-auto px-4 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4">
                    <div class="text-center">
                        <div class="text-center mx-auto">
                            <a href="#">
                                <img src="/logo/piep.png" alt="Logo Elite" class="w-full h-full object-cover" style="height: auto; height: auto;" />
                            </a>
                        </div>
                        <a href="#" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 uppercase rounded mt-4 block">¿Quiénes SOMOS?</a>
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
    font-weight: 700; /* Ajusta este valor para aumentar el grosor de la letra */
    text-shadow: 2px 2px 0px #000; /* Mantenemos la sombra en 3D */
}

</style>