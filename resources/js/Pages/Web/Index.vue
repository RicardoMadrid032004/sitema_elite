<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
import ModalResponsive from '@/Components/Modal.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import DangerButton from '@/Components/DangerButton.vue';
import Swal from 'sweetalert2';
import {useForm} from '@inertiajs/vue3';
import vueTailwindPaginationUmd from '@ocrv/vue-tailwind-pagination';
import {nextTick, ref } from 'vue';

const nameInput=ref(null);
const modal = ref(false);
const title= ref('');
const operation= ref(1);
const id = ref('');

const props = defineProps({
	webcategorias: {
		type: Object
	}
});


const form = useForm({
    name:''
});


const formPage = useForm({});
const onPageClick = (event)=>{
    formPage.get(route('webcategorias.index',{page:event}));
}

const openModal = (op,name,webcategorias) => {
    modal.value = true;
    nextTick(() => nameInput.value.focus());
    operation.value = op;
    id.value = webcategorias;
    if (op === 1) {
        title.value = 'Registrar nombre del menu/navegacion';
    } else {
        title.value = 'Actualizar nombre del menu/navegacion';
        form.name=name;
    }
};

const closeModal = () => {
    modal.value = false;
    form.reset();
};
const save = () => {
    if (operation.value == 1) {
        form.post(route('webcategorias.store'), {
            onSuccess: () => { ok('menu/navegacion registrado') }
        });
    } else {
        form.put(route('webcategorias.update', id.value), {
            onSuccess: () => { ok('menu/navegacion actualizado') }
        });
    }
}

const ok = (msj) => {
    form.reset();
    closeModal();
    Swal.fire({ title: msj, icon: 'success' });
};

const deleteUser = (id,name) => {
    const alerta = Swal.mixin({
        buttonsStyling:true
    });
    alerta.fire({
        title: '¿Estas seguro de eliminar a: ' + name + '?',
        icon: 'question',
        showCancelButton:true,
        confirmButtonText:'<i class="fa-solid fa-check"></i> Si eliminar ',
        cancelButtonText: '<i class"fa-solid fa-ban"></i> Cancelar',
    }).then((result)=>{
        if(result.isConfirmed){
            form.delete(route('webcategorias.destroy',id),{
                onSuccess: () => {ok('Usuario Eliminado')}
            });
        }
    });
}

</script>
<template>
    <AppLayout title="web">
        <template #header>
            <h2 class="font-semibold text-md text-gray-800 leading-tight">
               LISTA DE MENU DE NAVEGACION DE PAGINA / INICIO 
            </h2><br><hr>
        </template>

        <div class="flex justify-center">
            <div class="py-2 md:py-4 min-h-[calc(100vh-185px)] overflow-auto container items-center">
                <div class="h-full mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="p-6 bg-white border-gray-100 shadow-2xl rounded-lg ">
                        <div class="flex flex-wrap gap-2 justify-between" >
                            <PrimaryButton  @click="$event => openModal(1)">
                                <i class="fa-solid  fa-plus-circle mx-2"></i>R-menu/navegacion
                            </PrimaryButton>
                        </div>
                        <div class="mt-4 overflow-auto">
                            <div>
                                <table class="w-full text-sm text-left rtl:text-right text-gray-400 dark:text-gray-500">
                                    <thead class="text-xs text-white text-center uppercase bg-green-600 dark:bg-green-600">
                                        <tr>
                                            <th scope="col" class="px-6 py-2">#</th>
                                            <th scope="col" class="px-6 py-2">nombre</th>
                                            <th scope="col" class=" px-6 py-2">acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center hover:bg-gray-100">
                                        <tr v-for="(webcategoria, i) in webcategorias.data" :key="webcategoria.id">
                                            <td class="border border-gray-200 px-2 py-2">{{ i + 1 }}</td>
                                            <td class="border border-gray-200 px-2 py-2"> {{ webcategoria.name }}</td>
                                            <td class="border border-gray-200 px-2 py-2 text-xs">
                                                <Link class="py-2 px-4 text-xs hover:bg-yellow-500 hover:text-white hover:rounded-xl text-yellow-500" :href="route('webitems.index', { webcategoria_id: webcategoria.id })"><i class="fas fa-eye mx-1" id="eyeIcon"></i>REGISTRA-DATOS</Link>
                                                <PrimaryButton @click="$event => openModal(2,webcategoria.name,webcategoria.id)" class="ml-2" v-if="$page.props.user.permissions.includes('update user')">
                                                    <i class="fa-solid fa-edit fa-sm"></i>
                                                </PrimaryButton>
                                                <!-- <DangerButton @click="$event => deleteUser(webcategoria.id,webcategoria.name)" class="ml-3"  v-if="$page.props.user.permissions.includes('delete user')">
                                                    <i class="fa-solid fa-trash mr-1 fa-sm"></i>
                                                </DangerButton> -->
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="flex flex-col items-center border-t bg-white px-5 py-5 xs:flex-row xs:justify-between">
                                    <pagination :links="webcategorias.links" />
                                </div>
                                <!-- <div class="bg-white grid v-screen place-items-center">
                                    <vueTailwindPaginationUmd
                                    :current="webcategorias.currentPage" :total="webcategorias.total"
                                    :per-page="webcategorias.perPage"
                                    @page-changed="$event => onPageClick($event)"
                                    ></vueTailwindPaginationUmd>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <ModalResponsive :show="modal" @close="closeModal">
            <div class="p-4 uppercase  mt-2 ">
                <h2 class="text-md font-bold text-center text-gray-600 mb-4">{{ title }}</h2>
                <div class="p-3 ">
                    <InputLabel for="name" value="Name:" class="mb-2 text-xs"></InputLabel>
                    <TextInput id="name" ref="nameInput" v-model="form.name" type="text" class="w-full text-xs"
                        placeholder="escribe un nombre "></TextInput>
                    <InputError :message="form.errors.name" class="mt-2"></InputError>
                </div>
                <div class="p-3 flex justify-center">
                    <PrimaryButton :disabled="form.processing" @click="save">
                        <i class="fa-solid fa-save mx-2"></i>{{ operation === 1 ? 'Registro' : 'Actualizar' }}
                    </PrimaryButton>
                    <DangerButton class="ml-3" :disabled="form.processing"
                    @click="closeModal">
                        CANCELAR
                    </DangerButton>
                </div>
                
            </div>
        </ModalResponsive>
    </AppLayout>
</template>
<style scoped>
   #eye-icon {
            font-size: 24px;
            cursor: pointer;
        }

        .blink-animation {
            animation: blink 1s infinite;
        }

        @keyframes blink {
            0%, 100% { transform: scaleY(1); }
            50% { transform: scaleY(0); }
        }

</style>