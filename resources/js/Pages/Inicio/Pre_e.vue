<script setup>
import WelcomeLayout from '@/Layouts/WelcomeLayout.vue';
import Footter from '@/Components/Footter.vue';

</script>

<template>
    <div>
        <WelcomeLayout title="Profile">
            <br><br><br>
            <div>
                <div class="w-full  h-1/2"><br><br>
                    <img class="w-full h-full object-cover" src="/logo/sevi.png" style="height: auto; height: auto;">
                </div>
           </div>
            <div class="mt-2 container text-center mx-auto text-yellow-400 uppercase text-xl md:text-3xl font-medium px-4 sm:px-12">
              <b class="text-5xl text-green-500 px-4 sm:px-12 custom-text">NUESTROS CICLOS ESCOLARES</b>
            </div>
            <div class="mt-4 container mx-auto text-yellow-400 uppercase text-xl md:text-3xl font-medium px-4 sm:px-12">
                <div class="px-4 sm:px-12 custom-text">CICLO  <b class="mx-5">BASICO </b></div>
            </div>
            <div class="container mx-auto px-4 sm:px-10 py-0">
                <div class="text-white p-1 px-0 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-1 gap-0">
                    <div class="text-bol text-lg sm:text-2xl px-4 sm:px-12">
                        <p class="text-black mx-3 mt-3">Ideal para aquellos que buscan fortalecer sus fundamentos academicos y desarrollar habilidades  clave en areas como matematicas  y lenguaje . En este ciclo , nos enfocamos en construir una base solida  para la elite  academica futura</p><br>
                        <b class="mx-3  text-black">CURSOS A DICTAR :Habilidad matematica y habilidad linguistica </b>
                    </div>
                </div>
            </div>
            <div class="w-full  h-3/4">
                <img class="w-full h-full object-cover" src="/logo/02.png" style="height: auto; height: auto;">
            </div> 
            <div class="mt-4 container mx-auto text-yellow-400 uppercase text-xl md:text-3xl font-medium px-4 sm:px-12">
                <div class="px-4 sm:px-12 custom-text">CICLO  <b class="mx-5">ESCOLAR INTERMEDIO:</b></div>
            </div>
            <div class="container mx-auto px-4 sm:px-10 py-0">
                <div class="text-white p-1 px-0 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-1 gap-0">
                    <div class="text-bol text-lg sm:text-2xl px-4 sm:px-12">
                        <p class="text-black mx-3 mt-3">Para estudiantes que deseen postular su comprension  y ampliar sus horizontes academicos . Aqui , explorras conceptos mas avanzados  en diversas materias  y te prepararas  para desafios academicos mas exigentes</p><br>
                        <b class="mx-3  text-black">CURSOS A DICTAR :Algebra, Aritmetica Raz.Verbal  </b>
                    </div>
                </div>
            </div>
            <div class="w-full  h-3/4">
                <img class="w-full h-full object-cover" src="/logo/02.png" style="height: auto; height: auto;">
            </div> 
            <div class="mt-4 container mx-auto text-yellow-400 uppercase text-xl md:text-3xl font-medium px-4 sm:px-12">
                <div class="px-4 sm:px-12 custom-text">CICLO  <b class="mx-5">ESCOLAR AVANZADO </b></div>
            </div>
            <div class="container mx-auto px-4 sm:px-10 py-0">
                <div class="text-white p-1 px-0 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-1 gap-0">
                    <div class="text-bol text-lg sm:text-2xl px-4 sm:px-12">
                        <p class="text-black mx-3 mt-3">Dirigido  a aquellos  que buscan un desafio  intelectual adicional y deseen prepararse  para un futuro  academico brillante . En este ciclo, te sumergiras  en temas complejos y participaras en proyectos  estimulantes que te prepararan  para nefrentar cualquier desafio  academico</p><br>
                        <b class="mx-3  text-black">CURSOS A DICTAR :Algebra, Aritmetica Raz.Verbal, Raz.Matematica, Raz.Logico  </b>
                    </div>
                </div>
            </div>
            <div class="w-full  h-3/4">
                <img class="w-full h-full object-cover" src="/logo/02.png" style="height: auto; height: auto;">
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