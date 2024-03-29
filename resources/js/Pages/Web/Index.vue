<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
import Modal from '@/Components/Modal.vue';
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
        title.value = 'Registrar webcategorias';
    } else {
        title.value = 'Actualizar webcategorias';
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
            onSuccess: () => { ok('webcategorias registrado') }
        });
    } else {
        form.put(route('webcategorias.update', id.value), {
            onSuccess: () => { ok('webcategorias actualizado') }
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
    <AppLayout title="Usuarios">
        <template #header>
            Users
        </template>

        <div class="py-2 md:py-4 min-h-[calc(100vh-185px)] overflow-auto">
            <div class="h-full mx-auto px-4 sm:px-6 lg:px-8">
                <div class="p-6 bg-white border-gray-100 rounded-lg ">
                    <div class="flex flex-wrap gap-2 justify-between" >
                        <PrimaryButton  @click="$event => openModal(1)">
                            <i class="fa-solid  fa-plus-circle mx-2"></i>Registrar Web
                        </PrimaryButton>
                    </div>
                    <div class="mt-4 overflow-auto">
                        <div class="relative overflow-x-auto sm:rounded-lg ">
                            <table class="w-full text-sm text-left rtl:text-right text-gray-400 dark:text-gray-900">
                                <thead class="text-xs text-white uppercase bg-green-600 dark:bg-green-600">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">#</th>
                                        <th scope="col" class="px-6 py-3">nombre</th>
                                        <th scope="col" class="text-right px-6 py-3">acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(webcategoria, i) in webcategorias.data" :key="webcategoria.id">
                                        <td class="border border-gray-400 px-2 py-2">{{ i + 1 }}</td>
                                        <td class="border border-gray-400 px-2 py-2"> {{ webcategoria.name }}</td>
                                        <td class="border border-gray-400 px-2 py-2">
                                            <Link class="py-2 px-4 text-yellow-500" :href="route('webitems.index', { webcategoria_id: webcategoria.id })"><i class="fas fa-eye mx-1"></i>img</Link>
                                            <PrimaryButton @click="$event => openModal(2,webcategoria.name,webcategoria.id)"  v-if="$page.props.user.permissions.includes('update user')">
                                                <i class="fa-solid fa-edit fa-sm"></i>
                                            </PrimaryButton>
                                            <DangerButton @click="$event => deleteUser(webcategoria.id,webcategoria.name)" class="ml-3"  v-if="$page.props.user.permissions.includes('delete user')">
                                                <i class="fa-solid fa-trash mr-1 fa-sm"></i>
                                            </DangerButton>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="flex flex-col items-center border-t bg-white px-5 py-5 xs:flex-row xs:justify-between">
                                <pagination :links="webcategorias.links" />
                            </div>
                            <div class="bg-white grid v-screen place-items-center">
                            <vueTailwindPaginationUmd
                            :current="webcategorias.currentPage" :total="webcategorias.total"
                            :per-page="webcategorias.perPage"
                            @page-changed="$event => onPageClick($event)"
                            ></vueTailwindPaginationUmd>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <Modal :show="modal" @close="closeModal">
            <div class="p-4 uppercase  mt-5 ">
                <h2 class="text-2xl font-bold text-center text-gray-900 mb-4">{{ title }}</h2><hr>
                <div class="p-3 ">
                    <InputLabel for="name" value="Name:" class="mb-2"></InputLabel>
                    <TextInput id="name" ref="nameInput" v-model="form.name" type="text" class="w-full"
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
        </Modal>
    </AppLayout>
</template>
