<script setup>
import { ref } from 'vue';
import { Head, Link, router } from '@inertiajs/vue3';
import LogoElite from '@/Components/LogoElite.vue';
import Banner from '@/Components/Banner.vue';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import NavLink from '@/Components/NavLink.vue';
import NavInicio from '@/Components/NavInicio.vue';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';
import Accede from '@/Components/Accede.vue'



const isOpen = ref(false);

const toggleDropdown = () => {
  isOpen.value = !isOpen.value;
};

const navigateTo = (routeName) => {
  router.push({ name: routeName });
};
defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
});



const showingNavigationDropdown = ref(false);


</script>


<template>
    <div>
        <Head :title="title" />

        <Banner />

        <div class="min-h-screen bg-gray-100">
            <nav  class="bg-black border-b border-gray-100 fixed w-full">
                <!-- Primary Navigation Menu -->
                    <div class="max-w-7xl  mx-auto px-4 sm:px-12 lg:px-12">
                        <div class="items-center md:mx-12 md:px-12">
                            <img class="text-center"src="/logo/encabezado.png" alt="Logo" style="width: auto; height:auto;">
                        </div>
                    <div class="flex justify-between h-16">
                        <div class="flex">
                            <!-- Logo -->
                            <div class="shrink-0 flex items-center hidden space-x-8 sm:-my-px sm:ms-10  sm:flex ">
                                <Link >
                                    <LogoElite class="block h-9 w-auto" />
                                </Link>
                            </div>

                            <!-- Navigation Links -->
                            <div class="hidden space-x-8 sm:-my-px sm:ms-10  sm:flex">
                                
                                <NavInicio :href="route('Welcome')" :active="route().current('Welcome')"  >
                                    <b class="text-xl">INICIO</b>
                                </NavInicio>
                            </div>
                            <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                                <NavInicio :href="route('elite')" :active="route().current('elite')">
                                    <b class="text-xl">ELITE</b>
                                </NavInicio>
                            </div>
                            <div class="relative sm:space-x-8 sm:-my-px sm:ms-10 hidden space-x-8 sm:-my-px sm:ms-10  sm:flex">
                                <button @click="toggleDropdown" class="inline-flex items-center px-3 py-3 border border-transparent text-sm leading-4 font-medium rounded-md text-white hover:bg-gray-700 focus:outline-none transition ease-in-out duration-150">
                                    <b class="text-xl mt-2">SERVICIOS</b>
                                    <svg class="-mr-1 ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10 12a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                                        <path fill-rule="evenodd" d="M10 0a9.998 9.998 0 00-7.071 2.929A9.998 9.998 0 000 10c0 5.523 4.477 10 10 10s10-4.477 10-10c0-5.523-4.477-10-10-10zm0 18.333A8.333 8.333 0 1110 .001a8.333 8.333 0 010 16.666z" clip-rule="evenodd" />
                                    </svg>
                                </button>

                                <div v-if="isOpen" class="origin-top-right absolute right-0 uppercase mt-2 w-48 sm:w-full bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none z-20">
                                    <div class="py-1 text-white">
                                        <DropdownLink :href="route('pre_e')">  <b>Enseñanza Escolar</b></DropdownLink>
                                        <DropdownLink :href="route('pre_u')"> <b>Enseñanza Pre-u</b></DropdownLink>
                                    </div>
                                </div>
                            </div>

                            <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                                <NavInicio  :href="route('regalos')" :active="route().current('regalos')">
                                    <b class="text-xl">REGALOS</b>
                                </NavInicio>
                            </div>
                            <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                                <NavInicio  :href="route('eventos')" :active="route().current('eventos')">
                                    <b class="text-xl">EVENTOS</b>
                                </NavInicio>
                            </div>
                             <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                                <NavInicio :href="route('galeria')" :active="route().current('galeria')">
                                    <b class="text-xl">GALERIA</b>
                                </NavInicio>
                            </div>
                            <div class="hidden  space-x-8 sm:-my-px sm:ms-10 sm:flex">
                                <NavInicio  class="hidden space-x-8 uppercase text-xl sm:-my-px sm:ms-10 sm:flex"
                                    v-if="$page.props.auth.user"
                                    :href="route('dashboard')"
                                >
                                    Dashboard
                                </NavInicio>
                                <template v-else>
                                    <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                                    <NavInicio
                                        :href="route('login')" 
                                    >
                                        <b class="text-xl ml-2">ACCEDE</b>
                                        <Link >
                                            <Accede class="block h-9 w-auto" />
                                        </Link>
                                    </NavInicio>
                                    </div>

                                    <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                                    <NavInicio
                                        v-if="canRegister"
                                        :href="route('register')"
                                    >
                                        Registrate
                                    </NavInicio>
                                    </div>
                                </template>
                            </div>
                            <!-- <div class="shrink-0 flex items-center">
                                <Link >
                                    <LogoElite class="block h-9 w-auto" />
                                </Link>
                            </div> -->

                        </div>

                       
                        <!-- Hamburger -->
                        <div class="-me-2 flex items-center sm:hidden">
                            <button class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out" @click="showingNavigationDropdown = ! showingNavigationDropdown">
                                <svg
                                    class="h-6 w-6"
                                    stroke="currentColor"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        :class="{'hidden': showingNavigationDropdown, 'inline-flex': ! showingNavigationDropdown }"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M4 6h16M4 12h16M4 18h16"
                                    />
                                    <path
                                        :class="{'hidden': ! showingNavigationDropdown, 'inline-flex': showingNavigationDropdown }"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12"
                                    />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Responsive Navigation Menu -->
                <div :class="{'block': showingNavigationDropdown, 'hidden': ! showingNavigationDropdown}" class="sm:hidden">
                    <div class="pt-2 pb-3 space-y-1">
                        <ResponsiveNavLink >
                            Dashboard
                        </ResponsiveNavLink>
                    </div>
                    <div class="pt-2 pb-3 space-y-1">
                        <ResponsiveNavLink :href="route('login')">
                            Log in
                        </ResponsiveNavLink>
                    </div>
                    <div class="pt-2 pb-3 space-y-1">
                        <ResponsiveNavLink v-if="canRegister" :href="route('register')">
                            Register
                        </ResponsiveNavLink>
                    </div>

                    <!-- Responsive Settings Options -->
    
                </div>
            </nav>

            <!-- Page Heading -->
            <header v-if="$slots.header">
                <div class="max-w-7xl  mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <slot name="header" />
                </div>
            </header>

            <!-- Page Content -->
            <main class="bg-gradient-to-br to-gray-900 text-white ">
                <slot />
            </main>
        </div>
    </div>
</template>

<style scoped>
/* main {
  background-image: url("https://printdeco.ru/wp-content/uploads/2023/07/Art.-20074-CHernaya-stena-loft.jpg");
} */
nav::before,
nav::after,
nav::before,
nav::after {
    content: '';
    position: absolute;
    width: 20px; /* Ajustar el tamaño del círculo */
    height: 20px; /* Ajustar el tamaño del círculo */
    border-top: 4px solid white; /* Ajustar el grosor del borde */
    border-left: 4px solid white; /* Ajustar el grosor del borde */
    border-radius: 50%;
    background-color: transparent;
}

nav::before {
    top: 0;
    left: 0;
}

nav::after {
    top: 0;
    right: 0;
    transform: rotate(90deg);
}

nav::before {
    bottom: 0;
    left: 0;
    transform: rotate(-90deg);
}

nav::after {
    bottom: 0;
    right: 0;
    transform: rotate(180deg);
}

</style>


