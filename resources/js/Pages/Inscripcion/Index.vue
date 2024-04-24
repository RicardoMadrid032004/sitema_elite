<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
import DangerButton from '@/Components/DangerButton.vue';
import Swal from 'sweetalert2';
import { useForm } from '@inertiajs/vue3';
import vueTailwindPaginationUmd from '@ocrv/vue-tailwind-pagination';
import { ref } from 'vue';


const props = defineProps({
    inscripciones: {
        type: Object,
        required: true
    }
});

const form = useForm({
    nombres: '',
    numeroDocumento: '',
    apellidoPaterno:'',
    apellidoMaterno:'',
    nombre_apoderado:'',
    ciclo_id:'',
    monto_a_pagar:'',
    monto_pagado:'',
    modalidad_pago:'',
    fecha_inscripcion:''
});

const formPage = useForm({});

const onPageClick = (event) => {
    formPage.get(route('inscripciones.index', { page: event }));
};
</script>

<template>
    <AppLayout title="Inscripciones">
        <template #header>
            <h2 class="font-semibold text-md text-gray-800 leading-tight">
                LISTA DE ALUMNOS INSCRITOS
            </h2><br><hr>
        </template>

        <div class="flex justify-center">
            <div class="py-2 md:py-4 min-h-[calc(100vh-185px)] overflow-auto container items-center">
                <div class="h-full mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="p-6 bg-white border-gray-100 shadow-2xl  rounded-lg">
                        <div class="flex flex-wrap gap-2 justify-between" >
                            <Link :href="route('inscripciones.create')" class="inline-flex items-center text-xs px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                <i class="fa-solid  fa-plus-circle mx-2"></i>registrar ingresante
                            </Link>
                            <Link :href="route('ciclos.index')" class="inline-flex items-center ml-5 text-xs px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                <i class="fa-solid  fa-plus-circle mx-2"></i>ciclos
                            </Link>
                        </div>
                        <div class="mt-4 overflow-auto">
                            <div>
                                <table class="w-full text-sm text-bold rtl:text-right text-gray-200 dark:text-gray-900">
                                    <thead class="text-xs text-white uppercase bg-green-600 dark:bg-green-600">
                                        <tr>
                                            <th scope="col" class="px-6 py-2">#</th>
                                            <th scope="col" class="px-6 py-2">alumno</th>
                                            <th scope="col" class="text-right px-3 py-2">apeelidos</th>
                                            <th scope="col" class="text-right px-3 py-2">dni</th>
                                            <th scope="col" class="text-right px-3 py-2">apoderado</th>
                                            <th scope="col" class="text-right px-3 py-2">ciclo</th>
                                            <th scope="col" class="text-right px-3 py-2">fecha inscripcion</th>
                                            <th scope="col" class="text-right px-3 py-2">acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="(inscripcione, i) in inscripciones.data" :key="inscripcione.id" class="text-center text-xs text-gray-500">
                                            <td class="border px-2 py-2">{{ i + 1 }}</td>
                                            <td class="border px-2 py-2">{{ inscripcione.nombres }}</td>
                                            <td class="border px-2 py-2">{{ inscripcione.apellidoPaterno }}-{{ inscripcione.apellidoMaterno }}</td>
                                            <!-- <td class="border border-gray-400 px-2 py-2">{{ inscripcione.apellidoMaterno }}</td> -->
                                            <td class="border px-2 py-2">{{ inscripcione.numeroDocumento }}</td>
                                            <td class="border px-2 py-2">{{ inscripcione.nombre_apoderado }}</td>
                                            <td class="border  px-2 py-2">{{ inscripcione.ciclo ? inscripcione.ciclo.nombre : 'Sin ciclo' }}</td>
                                            <!-- <td class="border px-2 py-2">{{ inscripcione.ciclo }}</td> -->
                                            <td class="border px-2 py-2">{{ inscripcione.fecha_inscripcion }}</td>
                                            <td class="border px-2 py-2">
                                                <DangerButton>
                                                    <i class="fa-solid fa-trash mr-1 fa-sm"></i>
                                                </DangerButton>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <!-- <div class="bg-white grid v-screen place-items-center mt-4">
                                    <vueTailwindPaginationUmd
                                        :current="inscripciones.currentPage" :total="inscripciones.total"
                                        :per-page="inscripciones.perPage"
                                        @page-changed="$event => onPageClick($event)"
                                    ></vueTailwindPaginationUmd>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
