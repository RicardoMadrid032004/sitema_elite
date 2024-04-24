<script setup>
import WelcomeLayout from '@/Layouts/WelcomeLayout.vue';
import Footter from '@/Components/Footter.vue';
import { Link, usePage } from '@inertiajs/vue3';

</script>

<template>
    <div>
        <WelcomeLayout title="Profile">
            <div>
                <div class="w-full  h-1/2">
                    <img class="w-full h-full object-cover" src="/logo/sevi.png" style="height: auto; height: auto;">
                </div>
           </div>
           <div class="mt-2 container text-center mx-auto text-yellow-400 uppercase text-xl md:text-3xl font-medium px-4 sm:px-12">
              <b class="text-5xl text-green-500 px-4 sm:px-12 custom-text">NUESTROS CICLOS PRE-U</b>
            </div>
            <div class="mt-4 container mx-auto text-yellow-400 uppercase text-xl md:text-3xl font-medium px-4 sm:px-12">
                <div class="px-4 sm:px-12 custom-text">CICLO  <b class="mx-5">CERO </b></div>
            </div>
            <div class="container mx-auto px-4 sm:px-10 py-0">
                <div class="text-white p-1 px-0 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-1 gap-0">
                    <div class="text-bol text-lg sm:text-2xl px-4 sm:px-12">
                        <p class="text-black mx-3 mt-3">Nuestro ciclo esta diseñado especialmente para alumnos recien  graduados de secundaria  y que desean iniciar con su preparacion  preuniversitaria , a quienes haremos brillar en sus examenes  diferenciandolos de los demas mientras  se sumergen en una experiencia  educativa unica  y llena de energia </p><br>
                        <b class="mx-3  text-black">CURSOS A DICTAR : Algebra , Matematica ,Raz.Matematica, Raz.Logivo , Raz.Verbal </b>
                    </div>
                </div>
            </div>
          
            <div class="w-full h-3/4">
                <img class="w-full h-full object-cover" src="/logo/02.png" alt="Logo" />
            </div>

            <div class="mt-4 container mx-auto text-yellow-400 uppercase text-xl md:text-3xl font-medium px-4 sm:px-12">
                <div class="px-4 sm:px-12 custom-text">CICLO  <b class="mx-5">ESCOLAR MODULAR: </b></div>
            </div>
            <div class="container mx-auto px-4 sm:px-10 py-0">
                <div class="text-white p-1 px-0 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-1 gap-0">
                    <div class="text-bol text-lg sm:text-2xl px-4 sm:px-12">
                        <p class="text-black mx-3 mt-3">A diferencia de nuestros ciclos regulares modular se basa en una Enseñanza  fraccionada en dos partes donde el estudiantes puede entender paso a paso los niveles  de distintos temas  y haci escalar de manera progresia  en su nivel academico . Se divide en modulo <b>A</b> y <b>B</b> </p><br>
                    </div>
                </div>
            </div>
            
            <div class="w-full  h-3/4">
                <img class="w-full h-full object-cover" src="/logo/02.png" style="height: auto; height: auto;">
            </div>

            <div class="mt-4 container mx-auto text-yellow-400 uppercase text-xl md:text-3xl font-medium px-4 sm:px-12">
                <div class="px-4 sm:px-12 custom-text">CICLOS  <b class="mx-5">REGULARES </b></div>
            </div>
            <div class="container mx-auto px-4 sm:px-10 py-0">
                <div class="text-white p-1 px-0 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-1 gap-0">
                    <div class="text-bol text-lg sm:text-2xl px-4 sm:px-12">
                        <p class="text-black mx-3 mt-3">Este ciclo esta dirigido para estudiantes con estudios previos en alguna academia preuniversitaria que deseen reforzar y elevar sus conocimientos . Nuestra modalidad esta orientada a potenciar tus habilidades  para las carreras de ciencias , letras y medicina . Estamos aqui para asegurarnos de que tu ingreso  ala <b>UNP</b> sea garantizado </p><br>
                    </div>
                </div>
            </div>
            <div class="w-full  h-3/4">
                <img class="w-full h-full object-cover" src="/logo/02.png" style="height: auto; height: auto;">
            </div>
           
            <div class="mt-4 container mx-auto text-yellow-400 uppercase text-xl md:text-3xl font-medium px-4 sm:px-12">
                <div class="px-4 sm:px-12 custom-text">CICLOS  <b class="mx-5">REFORZAMIENTO IDEPUNP </b></div>
            </div>
            <div class="container mx-auto px-4 sm:px-10 py-0">
                <div class="text-white p-1 px-0 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-1 gap-0">
                    <div class="text-bol text-lg sm:text-2xl px-4 sm:px-12">
                        <p class="text-black mx-3 mt-3">En este ciclo  esta enfocado en el<b>/b> claveteo  y desarrollo de modulos</b>  actitudes del <b>IDEPUNP</b>, buscando asegurar el <b>MAXIMO PUNTAJE</b> en los dos examenes <b>IDEPUNP</b> </p><br>
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
    font-weight: 700; /* Ajusta este valor para aumentar el grosor de la letra */
    text-shadow: 2px 2px 0px #000; /* Mantenemos la sombra en 3D */
}

</style>