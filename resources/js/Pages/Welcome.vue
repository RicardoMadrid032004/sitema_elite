<script>
export default {
  methods: {
    openWhatsAppAlert() {
      Swal.fire({
        title: '¿Enviar mensaje por WhatsApp?',
        iconHtml: '<i class="fab fa-whatsapp fa-2x"></i>',
        showCancelButton: true,
        confirmButtonColor: '#25D366',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, enviar mensaje'
      }).then((result) => {
        if (result.isConfirmed) {
          // Agrega el enlace de WhatsApp para enviar el mensaje
          window.open('https://api.whatsapp.com/send?phone=940557994', '_blank');
        }
      });
    }
  }
}
</script>

<script setup>
import WelcomeLayout from '@/Layouts/WelcomeLayout.vue';
import LogoElite from '@/Components/LogoElite.vue';
import GreenButton from '@/Components/GreenButton.vue'
import { Link, } from '@inertiajs/vue3';
import Elite from '@/Components/Elite.vue';
import Footter from '@/Components/Footter.vue'
import Swal from 'sweetalert2';
</script>

<template>
    <div>
        <WelcomeLayout  title="BIENVENIDO">
           <div>
                <div class="w-full  h-1/2"><br><br><br><br><br>
                    <img class="w-full h-full object-cover" src="/logo/a1.png" style="height: 100%; height: 100%;">
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
                        <p class="text-black mx-3 mt-3">Nos <b>enorgullece ser tu guía</b> en el emocionante viaje educativo. Más que una academia, <b>somos una comunidad comprometida</b> con tu meta escolar y preuniversitaria. Aquí, no solo te preparamos para los desafíos académicos, sino también necesarios <b>para alcanzar tus metas</b>.</p><br>
                    </div>
                </div>
            </div>

            <div class="w-full  h-3/4">
                <img class="w-full h-full object-cover" src="/logo/01.png" style="height: auto; height: auto;">
            </div>  
            <div class="container mx-auto text-yellow-400 mt-4 uppercase text-xl md:text-3xl font-bold px-4 sm:px-12">
                <div class="px-4 sm:px-12 custom-text">Elite <b class="mx-2 md:mx-5">¿Quiénes Somos?</b></div>
            </div>

            <div class="container mx-auto px-4 sm:px-12 py-0">
                <div class="text-white p-2 px-0 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-1 gap-0">
                    <div class="px-4 sm:px-12">
                        <p class="mx-3 mt-3 text-lg sm:text-2xl text-black"><b>Academia estudio elite</b> es una institución que se creó con el propósito de crear un cambio significativo en la educación universitaria peruana brindando el apoyo necesario a los estudiantes, sobre todo a los que no tienen acceso a una educación básica de calidad. Asimismo, <b>estamos comprometidos</b> con ser un referente en la educación integral para fomentar los valores éticos y morales en nuestra comunidad elitina.</p><br>
                    </div>
                </div>
            </div>

            <div class="w-full  h-3/4">
                <img class="w-full h-full object-cover" src="/logo/02.png" style="height: auto; height: auto;">
            </div> 
            <div class="w-full mx-auto ">
                <div class="bg-black text-white p-0 px-0 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 gap-0 ">
                    <div class="text-center">
                        <img class="w-full h-full object-cover" src="/logo/lugar.png" style="height: auto; height: auto;">
                    </div>
                    <div class="text-center bg-green-400">
                        <img class="w-full h-full object-cover" src="/logo/ubicacion.png" style="height: auto; height: auto;">
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
            <div class="whatsapp-button">
                <button @click="openWhatsAppAlert">
                <i class="fab fa-whatsapp whatsapp-icon"></i>
                </button>
            </div>

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


    .whatsapp-button {
    position: fixed;
    bottom: 20px;
    right: 20px;
    }

    .whatsapp-button button {
    position: relative;
    background-color: #01ff56;
    border-radius: 20%;
    border: none;
    cursor: pointer;
    }

    .whatsapp-icon {
    font-size: 2.5em; /* Tamaño del icono */
    }

</style>