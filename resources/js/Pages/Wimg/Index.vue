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
import { useForm } from '@inertiajs/vue3';
import vueTailwindPaginationUmd from '@ocrv/vue-tailwind-pagination';
import { nextTick, ref } from 'vue';

const nameInput = ref(null);
const modal = ref(false);
const title = ref('');
const operation = ref(1);
const id = ref('');

const props = defineProps({
    webcategorias: {
        type: Object,
        required:true
    },
    webitems: {
        type: Object,
        required:true
    }
});

const form = useForm({
    text: '',
    image: null,
    eslider: null,
    webcategoria_id: ''
});

const onFileChange = (event, fieldName) => {
    const file = event.target.files[0];
    if(fieldName === 'image') {
        form.image = file;
        form.imagePreview = URL.createObjectURL(file);
    } else if(fieldName === 'eslider') {
        form.eslider = file;
        form.esliderPreview = URL.createObjectURL(file);
    }
};


const formPage = useForm({});
const onPageClick = (event) => {
    formPage.get(route('webitems.index', { page: event }));
};

const openModal = (op, text, image, eslider, webcategoria, webitems) => {
    modal.value = true;
    nextTick(() => nameInput.value.focus());
    operation.value = op;
    id.value = webitems;
    if (op === 1) {
        title.value = 'Registrar webitems';
    } else {
        title.value = 'Actualizar webitems';
        form.text = text;
        form.webcategoria_id = webcategoria;
        if (image && eslider) {
            form.image = image;
            form.imagePreview = `/img/productos/${image}`;
            form.eslider = eslider;
            form.esliderPreview = `/img/carrusel/${eslider}`;
        }
    }
};

const closeModal = () => {
    modal.value = false;
    form.reset();
};

const save = () => {
    if (operation.value == 1) {
        form.post(route('webitems.store'), {
            onSuccess: () => { ok('webitems registrado') }
        });
    } else {
        form.put(route('webitems.update', id.value), {
            onSuccess: () => { ok('webitems actualizado') }
        });
    }
};

const ok = (msj) => {
    form.reset();
    closeModal();
    Swal.fire({ title: msj, icon: 'success' });
};

const deleteUser = (id, text) => {
    const alerta = Swal.mixin({
        buttonsStyling: true
    });
    alerta.fire({
        title: '¿Estas seguro de eliminar a: ' + text + '?',
        icon: 'question',
        showCancelButton: true,
        confirmButtonText: '<i class="fa-solid fa-check"></i> Si eliminar ',
        cancelButtonText: '<i class="fa-solid fa-ban"></i> Cancelar',
    }).then((result) => {
        if (result.isConfirmed) {
            form.delete(route('webitems.destroy', id), {
                onSuccess: () => { ok('webitems Eliminado') }
            });
        }
    });
};

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
                            <i class="fa-solid  fa-plus-circle mx-2"></i>Registrar ala
                        </PrimaryButton>
                    </div>
                    <div class="mt-4 overflow-auto">
                        <div class="relative overflow-x-auto sm:rounded-lg ">
                            <table class="w-full text-sm text-left rtl:text-right text-gray-400 dark:text-gray-900">
                                <thead class="text-xs text-white uppercase bg-green-600 dark:bg-green-600">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">#</th>
                                        <th scope="col" class="px-6 py-3">texto</th>
                                        <th scope="col" class="px-6 py-3">imagen</th>
                                        <th scope="col" class="px-6 py-3">eslider</th>

                                        <th scope="col" class="text-right px-6 py-3">acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(webitem, i) in webitems.data" :key="webitem.id">
                                        <td class="border border-gray-400 px-2 py-2">{{ i + 1 }}</td>
                                        <td class="border border-gray-400 px-2 py-2"> {{ webitem.text }}</td>
                                        <td class="border border-gray-400 px-2 py-2">
                                            <img :src="'/img/productos/' + webitem.image" alt="Imagen" style="max-width: 30px; max-height: 30px;">
                                        </td>
                                        <td class="border border-gray-400 px-2 py-2">
                                            <img :src="'/img/carrusel/' + webitem.eslider" alt="Eslider" style="max-width: 30px; max-height: 30px;">
                                        </td>
                                        <td class="border border-gray-400 px-2 py-2">
                                            <!-- <PrimaryButton @click="$event => openModal(2,webitem.text,webitem.id)"  v-if="$page.props.user.permissions.includes('update user')">
                                                <i class="fa-solid fa-edit fa-sm"></i>
                                            </PrimaryButton> -->
                                            <DangerButton @click="$event => deleteUser(webitem.id,webitem.text)" class="ml-3"  v-if="$page.props.user.permissions.includes('delete user')">
                                                <i class="fa-solid fa-trash mr-1 fa-sm"></i>
                                            </DangerButton>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="bg-white grid v-screen mt-2 place-items-center">
                            <vueTailwindPaginationUmd
                            :current="webitems.currentPage" :total="webitems.total"
                            :per-page="webitems.perPage"
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
                    <InputLabel for="text" value="text:" class="mb-2"></InputLabel>
                    <textarea id="text" ref="nameInput" v-model="form.text" rows="4" class="w-full"
                        placeholder="escribe un text "></textarea>
                    <InputError :message="form.errors.text" class="mt-2"></InputError>
                </div>
                <div class="p-3">
                    <InputLabel for="webcategoria_id" value="Categoría Web:" class="mb-2"></InputLabel>
                    <select id="webcategoria_id" v-model="form.webcategoria_id" class="w-full block text-base text-gray-900 rounded-lg">
                        <option value="">Seleccione una categoría web</option>
                        <option v-for="webcategoria in webcategorias.data" :key="webcategoria.id" :value="webcategoria.id">{{ webcategoria.name }}</option>
                    </select>
                    <InputError :message="form.errors.webcategoria_id" class="mt-2"></InputError>
                </div>
                <div class="p-3">
                    <label for="image" class="uppercase text-xs font-bold">image</label>
                    <input id="image" name="image" ref="nameInput" type="file" @change="($event) => onFileChange($event, 'image')" class="mt-1 block w-full">
                    <InputError :message="form.errors.image" class="mt-2" />
                    <div v-if="form.image">
                        <img :src="form.imagePreview" alt="Foto actual" style="max-width: 100px; max-height: 100px; border-radius: 50%;">
                    </div>
                    <div v-else>
                        <p>No hay foto seleccionada.</p>
                    </div>
                </div>
                <div class="p-3">
                    <label for="eslider" class="uppercase text-xs font-bold">eslider</label>
                    <input id="eslider" name="eslider" ref="nameInput" type="file" @change="($event) => onFileChange($event, 'eslider')" class="mt-1 block w-full">
                    <InputError :message="form.errors.eslider" class="mt-2" />
                    <div v-if="form.eslider">
                        <img :src="form.esliderPreview" alt="Foto actual" style="max-width: 100px; max-height: 100px; border-radius: 50%;">
                    </div>
                    <div v-else>
                        <p>No hay foto seleccionada.</p>
                    </div>
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
