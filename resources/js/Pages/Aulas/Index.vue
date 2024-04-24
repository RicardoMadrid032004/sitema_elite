<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
import vueTailwindPaginationUmd from '@ocrv/vue-tailwind-pagination';
import InputLabel from '@/Components/InputLabel.vue';
import InputError from '@/Components/InputError.vue';
import TextInput from '@/Components/TextInput.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import DangerButton from '@/Components/DangerButton.vue';
import Modal from '@/Components/Modal.vue';
import Swal from 'sweetalert2';
import {useForm} from '@inertiajs/vue3';
import { nextTick, ref } from 'vue';

const nameInput = ref(null);
const modal = ref(false);
const title = ref('');
const operation = ref(1);
const id = ref('');

const props = defineProps({
	ciclos: {
		type: Object,
        required: true
	},
    aulas:{
        type: Object,
        required: true
    }
});

const form = useForm({
    nombre: '',
    capacidad: '',
    ciclo_id: '',
});

const openModal = (op,nombre,capacidad,ciclo,aula)=>{
    modal.value = true;
    nextTick( () => nameInput.value.focus());
    operation.value = op;
    id.value = aula;
    if(op ===1){
        title.value = 'Registra aula';
    }
    else{
        title.value = 'Actualizar aula';
        form.nombre=nombre;
        form.capacidad=capacidad;
        form.ciclo_id=ciclo;
    }
}

const closeModal = () =>{
    modal.value = false;
    form.reset();
}

const save = () => {
    if (operation.value == 1) {
        form.post(route('aulas.store'), {
            onSuccess: () => { ok('aula registrada') }
        });
    } else {
        form.put(route('aulas.update', id.value), {
            onSuccess: () => { ok('aula actualizado') }
        });
    }
}

const ok = (msj) =>{
    form.reset();
    closeModal();
    Swal.fire({title:msj,icon:'success'});
}


const formPage = useForm({});

const onPageClick = (event) => {
    formPage.get(route('ciclos.index', { page: event }));
};
</script>

<template>
    <AppLayout title="Usuarios">
        <template #header>
            <h2 class="font-semibold text-md text-gray-800 leading-tight">
                LISTA DE AULAS
            </h2><br><hr>
        </template>

        <div class="flex justify-center">
            <div class="py-2 md:py-4 min-h-[calc(100vh-185px)] overflow-auto container items-center">
                <div class="h-full mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="p-6 bg-white border-gray-100 shadow-2xl rounded-lg">
                        <div class="flex flex-wrap gap-2 justify-between" >
                            <PrimaryButton @click="() => openModal(1)" >
                                <i class="fas fa-plus mx-2"></i>registra aula
                            </PrimaryButton>
                            <Link :href="route('inscripciones.index')" class="inline-flex ml-5 items-center justify-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                <i class="fas fa-arrow-left mx-1"></i> inscripciones
                            </Link>
                            <Link :href="route('ciclos.index')" class="inline-flex ml-5 items-center justify-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                <i class="fas fa-arrow-left mx-1"></i>ciclos
                            </Link>
                        </div>
                        <div class="mt-4 overflow-auto">
                            <div>
                                <table class="w-full text-sm text-bold rtl:text-right text-gray-400 dark:text-gray-900">
                                    <thead class="text-xs text-white uppercase bg-green-600 dark:bg-green-600">
                                        <tr>
                                            <th scope="col" class="px-6 py-2">#</th>
                                            <th scope="col" class="px-6 py-2">aula</th>
                                            <th scope="col" class="px-6 py-2">capacidad</th>
                                            <th scope="col" class="px-6 py-2">acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="(aula, i) in aulas.data" :key="aula.id" class="text-center text-xs">
                                            <td class="border px-2 py-2">{{ i + 1 }}</td>
                                            <td class="border px-2 py-2">{{ aula.nombre }}</td>
                                            <td class="border px-2 py-2">{{ aula.capacidad }}</td>
                                            <td class="border px-2 py-2">
                                                <PrimaryButton @click="$event => openModal(2,aula.nombre,aula.capacidad,aula.ciclo_id,aula.id)">
                                                    <i class="fa-solid fa-edit fa-sm"></i>
                                                </PrimaryButton>
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
        
        <Modal :show="modal" @close="closeModal">
            <div class="p-4 uppercase">
                <h2 class="text-md font-medium text-gray-900 text-dark text-center uppercase mb-4">{{ title }}</h2>
                <div class="p-1">
                    <div class="w-full">
                        <InputLabel for="nombre" value="Nombre:" class="mb-2 text-xs"></InputLabel>
                        <TextInput id="nombre" ref="nameInput" v-model="form.nombre" type="text" class="w-full text-xs"
                                placeholder="Nombre"></TextInput>
                        <InputError :message="form.errors.nombre" class="mt-2"></InputError>
                    </div>
                </div>
                <div class="p-1">
                    <div class="w-full">
                        <InputLabel for="capacidad" value="capacidad:" class="mb-2 text-xs"></InputLabel>
                        <TextInput id="capacidad" ref="nameInput" v-model="form.capacidad" type="text" class="w-full text-xs"
                                placeholder="solo numeros"></TextInput>
                        <InputError :message="form.errors.capacidad" class="mt-2"></InputError>
                    </div>
                </div>
                <div class="w-full mt-4">
                    <InputLabel for="ciclo_id" value="ciclo Web:" class="mb-2 text-xs"></InputLabel>
                    <select id="ciclo_id" v-model="form.ciclo_id" autofocus class="w-full block text-xs text-gray-900 rounded-lg">
                        <option value="">Selecciona un ciclo</option>
                        <option v-for="ciclo in ciclos.data" :key="ciclo.id" :value="ciclo.id">{{ ciclo.nombre }}</option>
                    </select>
                    <InputError :message="form.errors.ciclo_id" class="mt-2"></InputError>
                </div>

                <div class="p-1 flex justify-center">
                    <PrimaryButton :disabled="form.processing" @click="save">
                        <i class="fa-solid fa-save mx-1"></i>{{ operation == 1 ? 'Registrar' : 'Actualizar' }}
                    </PrimaryButton>
                    <DangerButton class="ml-3" :disabled="form.processing"
                            @click="closeModal">
                            Cancelar
                    </DangerButton>
                </div>
            </div>
        </Modal>
    </AppLayout>
</template>
