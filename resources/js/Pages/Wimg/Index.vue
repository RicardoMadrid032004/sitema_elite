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
    text1: '',
    text2: '',
    text3: '',
    text4: '',
    image1: null,
    image2: null,
    image3: null,
    image4: null,
    eslider1: null,
    eslider2: null,
    eslider3: null,
    eslider4: null,
    webcategoria_id: ''
});


const onFileChange = (event, fieldName) => {
    const file = event.target.files[0];
    const fieldNumber = fieldName.slice(-1); // Extraer el número del nombre del campo

    if (fieldName.startsWith('image')) {
        form[`image${fieldNumber}`] = file; // Actualizar el campo de imagen correspondiente en el formulario
        form[`imagePreview${fieldNumber}`] = URL.createObjectURL(file); // Actualizar la vista previa de la imagen
    } else if (fieldName.startsWith('eslider')) {
        form[`eslider${fieldNumber}`] = file; // Actualizar el campo de eslider correspondiente en el formulario
        form[`esliderPreview${fieldNumber}`] = URL.createObjectURL(file); // Actualizar la vista previa del eslider
    }
};



const formPage = useForm({});
const onPageClick = (event) => {
    formPage.get(route('webitems.index', { page: event }));
};

const openModal = (op, text1,text2,text3,text4, image1,image2,image3,image4, eslider1,eslider2,eslider3,eslider4, webcategoria, webitems) => {
    modal.value = true;
    nextTick(() => nameInput.value.focus());
    operation.value = op;
    id.value = webitems;
    if (op === 1) {
        title.value = 'Registra datos menu inicio';
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
    } 
};

const ok = (msj) => {
    form.reset();
    closeModal();
    Swal.fire({ title: msj, icon: 'success' });
};

const deleteUser = (id, text1) => {
    const alerta = Swal.mixin({
        buttonsStyling: true
    });
    alerta.fire({
        title: '¿Estas seguro de eliminar a: ' + text1 + '?',
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
            <h2 class="font-semibold text-md text-gray-800  leading-tight">
               REGISTRAR DATOS NESESARIOS PARA MOSTRAR  AL USUARIO DE ACUERDO AL MENU SELECCIONADO
            </h2><br><hr>
        </template>

        <div class="py-2 md:py-4 min-h-[calc(100vh-185px)] overflow-auto">
            <div class="h-full mx-auto px-4 sm:px-6 lg:px-8">
                <div class="p-6 bg-white border-gray-100 rounded-lg shadow-2xl ">
                    <div class="flex flex-wrap gap-2 justify-between" >
                        <PrimaryButton  @click="$event => openModal(1)">
                            <i class="fa-solid  fa-plus-circle mx-2"></i>R-datos
                        </PrimaryButton>
                        <Link class="flex items-center text-white py-2 bg-red-600 rounded-lg px-4 text-sm text-red-600 hover:bg-red-500" :href="route('webcategorias.index')">
                            <i class="fas fa-arrow-left mr-2"></i>REGRESAR
                        </Link>

                    </div>
                    <div class="mt-4 overflow-auto">
                        <div >
                            <table class="w-full  text-sm text-left rtl:text-right text-gray-400 dark:text-gray-900">
                                <thead class="text-xs text-white uppercase bg-green-600 dark:bg-green-600">
                                    <tr>
                                        <!-- <th scope="col" class="px-6 py-3">#</th> -->
                                        <th scope="col" class="px-3 py-2">texto1</th>
                                        <th scope="col" class="px-3 py-2">texto2</th>
                                        <th scope="col" class="px-3 py-2">texto3</th>
                                        <th scope="col" class="px-3 py-2">texto4</th>
                                        <th scope="col" class="px-3 py-2">img1</th>
                                        <th scope="col" class="px-3 py-2">img2</th>
                                        <th scope="col" class="px-3 py-2">imagen3</th>
                                        <th scope="col" class="px-3 py-2">imagen4</th>
                                        <th scope="col" class="px-3 py-2">carrsl1</th>
                                        <th scope="col" class="px-3 py-2">carrl2</th>
                                        <th scope="col" class="px-3 py-2">eslider3</th>
                                        <th scope="col" class="px-3 py-2">eslider4</th>

                                        <th scope="col" class="text-right px-3 py-2">acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(webitem, i) in webitems.data" :key="webitem.id">
                                        <!-- <td class="border border-gray-400 px-2 py-2">{{ i + 1 }}</td> -->
                                        <td class="border text-xs border-gray-400 px-2 py-2">
                                            <div class="max-h-[200px] overflow-y-auto">
                                                {{ webitem.text1 }}
                                            </div>
                                        </td>
                                        <td class="border text-xs border-gray-400 px-2 py-2">
                                            <div class="max-h-[200px] overflow-y-auto">
                                                {{ webitem.text2 }}
                                            </div>
                                        </td>
                                        <td class="border text-xs border-gray-400 px-2 py-2">
                                            <div class="max-h-[200px] overflow-y-auto">
                                                {{ webitem.text3 }}
                                            </div>
                                        </td>
                                        <td class="border text-xs border-gray-400 px-2 py-2">
                                            <div class="max-h-[200px] overflow-y-auto">
                                                {{ webitem.text3 }}
                                            </div>
                                        </td>
                                        <td class="border border-gray-400 px-2 py-2">
                                            <img :src="'/img/productos/' + webitem.image1" alt="Imagen1" style="max-width: 50px; max-height: 50px;">
                                        </td>
                                        <td class="border border-gray-400 px-2 py-2">
                                            <img :src="'/img/productos/' + webitem.image2" alt="Imagen2" style="max-width: 50px; max-height: 50px;">
                                        </td>
                                        <td class="border border-gray-400 px-2 py-2">
                                            <img :src="'/img/productos/' + webitem.image3" alt="Imagen3" style="max-width: 50px; max-height: 50px;">
                                        </td>
                                        <td class="border border-gray-400 px-2 py-2">
                                            <img :src="'/img/productos/' + webitem.image4" alt="Imagen4" style="max-width: 50px; max-height: 50px;">
                                        </td>
                                        <td class="border border-gray-400 px-2 py-2">
                                            <img :src="'/img/carrusel/' + webitem.eslider1" alt="Eslider" style="max-width: 15px; max-height: 15px;">
                                        </td>
                                        <td class="border border-gray-400 px-2 py-2">
                                            <img :src="'/img/carrusel/' + webitem.eslider2" alt="Eslider" style="max-width: 15px; max-height: 15px;">
                                        </td>
                                        <td class="border border-gray-400 px-2 py-2">
                                            <img :src="'/img/carrusel/' + webitem.eslider3" alt="Eslider" style="max-width: 15px; max-height: 15px;">
                                        </td>
                                        <td class="border border-gray-400 px-2 py-2">
                                            <img :src="'/img/carrusel/' + webitem.eslider4" alt="Eslider" style="max-width: 15px; max-height: 15px;">
                                        </td>
                                        <td class="border border-gray-400 px-2 py-2">
                                            <!-- <PrimaryButton @click="$event => openModal(2,webitem.text1,webitem.text2,webitem.text3,webitem.text4,webitem.eslider1,webitem.eslider2,webitem.eslider13,webitem.eslider4,webitem.image1,webitem.image2,webitem.image3,webitem.image4,webitem.id)"  v-if="$page.props.user.permissions.includes('update user')">
                                                <i class="fa-solid fa-edit fa-sm"></i>
                                            </PrimaryButton> -->
                                            <!-- <PrimaryButton @click="() => openModal(2, webitem.text1, webitem.text2, webitem.text3, webitem.text4, webitem.image1, webitem.image2, webitem.image3, webitem.image4, webitem.eslider1, webitem.eslider2, webitem.eslider3, webitem.eslider4, webitem.webcategoria_id, webitem.id)" v-if="$page.props.user.permissions.includes('update user')">
                                            <i class="fa-solid fa-edit fa-sm"></i>
                                            </PrimaryButton> -->
                                            <DangerButton @click="$event => deleteUser(webitem.id,webitem.text1)"  v-if="$page.props.user.permissions.includes('delete user')">
                                                <i class="fa-solid fa-trash mr-1 fa-sm"></i>
                                            </DangerButton>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <!-- <div class="bg-white grid v-screen mt-2 place-items-center">
                                <vueTailwindPaginationUmd
                                :current="webitems.currentPage" :total="webitems.total"
                                :per-page="webitems.perPage"
                                @page-changed="$event => onPageClick($event)"
                                ></vueTailwindPaginationUmd>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <Modal :show="modal" @close="closeModal">
            <div class="p-4 uppercase text-md  mt-2 ">
                <h2 class="text-md font-bold text-center text-gray-600 mb-4">{{ title }}</h2>
                
                <div class="p-3 ">
                    <InputLabel for="webcategoria_id"  value="Categoría Web:" class="mb-2 text-xs"></InputLabel>
                    <select id="webcategoria_id" v-model="form.webcategoria_id" autofocus class="w-full block text-xs text-gray-900 rounded-lg">
                        <option value="">Seleccione una categoría web</option>
                        <option v-for="webcategoria in webcategorias.data" :key="webcategoria.id" :value="webcategoria.id">{{ webcategoria.name }}</option>
                    </select>
                    <InputError :message="form.errors.webcategoria_id" class="mt-2"></InputError>
                </div>
                <div class="p-3 ">
                    <InputLabel for="text1" value="text1:" class="mb-2 text-xs"></InputLabel>
                    <textarea id="text1" ref="nameInput" v-model="form.text1" autofocus rows="4" class="w-full text-xs"
                        placeholder="escribe un text "></textarea>
                    <InputError :message="form.errors.text1" class="mt-2"></InputError>
                </div>
                <div class="p-3 ">
                    <InputLabel for="text2" value="text2:" class="mb-2 text-xs"></InputLabel>
                    <textarea id="text2" ref="nameInput" v-model="form.text2" rows="4" class="w-full text-xs"
                        placeholder="escribe un text "></textarea>
                    <InputError :message="form.errors.text2" class="mt-2"></InputError>
                </div>
                <div class="p-3 ">
                    <InputLabel for="text3" value="text3:" class="mb-2 text-xs"></InputLabel>
                    <textarea id="text3" ref="nameInput" v-model="form.text3" rows="4" class="w-full text-xs"
                        placeholder="escribe un text "></textarea>
                    <InputError :message="form.errors.text3" class="mt-2"></InputError>
                </div>
                <div class="p-3 ">
                    <InputLabel for="text4" value="text4:" class="mb-2 text-xs"></InputLabel>
                    <textarea id="text4" ref="nameInput" v-model="form.text4" rows="4" class="w-full text-xs"
                        placeholder="escribe un text "></textarea>
                    <InputError :message="form.errors.text4" class="mt-2"></InputError>
                </div>
                <div class="grid grid-cols-1 gap-y-6 sm:grid-cols-2 sm:gap-x-8 mt-2">
                    <div class="p-3">
                        <label for="image1" class="uppercase text-xs font-bold">imagen 1</label>
                        <input id="image1" name="image1" ref="nameInput" type="file" @change="($event) => onFileChange($event, 'image1')" class="mt-1  text-xs w-full">
                        <InputError :message="form.errors.image1" class="mt-2" />
                        <div v-if="form.image1">
                            <img :src="form.imagePreview1" alt="Foto actual" style="max-width: 100px; max-height: 100px; ">
                        </div>
                        <div v-else>
                            <p class="text-xs">No hay foto seleccionada.</p>
                        </div>
                    </div>
                    <div class="p-3">
                        <label for="image2" class="uppercase text-xs font-bold">imagen 2</label>
                        <input id="image2" name="image2" ref="nameInput" type="file" @change="($event) => onFileChange($event, 'image2')" class="mt-1 text-xs w-full">
                        <InputError :message="form.errors.image2" class="mt-2" />
                        <div v-if="form.image2">
                            <img :src="form.imagePreview2" alt="Foto actual" style="max-width: 100px; max-height: 100px;">
                        </div>
                        <div v-else>
                            <p class="text-xs">No hay foto seleccionada.</p>
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-1 gap-y-6 sm:grid-cols-2 sm:gap-x-8 mt-2">
                    <div class="p-3">
                        <label for="image3" class="uppercase text-xs font-bold">imagen 3</label>
                        <input id="image3" name="image3" ref="nameInput" type="file" @change="($event) => onFileChange($event, 'image3')" class="mt-1 text-xs w-full">
                        <InputError :message="form.errors.image3" class="mt-2" />
                        <div v-if="form.image3">
                            <img :src="form.imagePreview3" alt="Foto actual" style="max-width: 100px; max-height: 100px;">
                        </div>
                        <div v-else>
                            <p class="text-xs">No hay foto seleccionada.</p>
                        </div>
                    </div>
                    <div class="p-3">
                        <label for="image4" class="uppercase text-xs font-bold">imagen 4</label>
                        <input id="image4" name="image4" ref="nameInput" type="file" @change="($event) => onFileChange($event, 'image4')" class="mt-1 text-xs w-full">
                        <InputError :message="form.errors.image4" class="mt-2" />
                        <div v-if="form.image4">
                            <img :src="form.imagePreview4" alt="Foto actual" style="max-width: 100px; max-height: 100px;">
                        </div>
                        <div v-else>
                            <p class="text-xs">No hay foto seleccionada.</p>
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-1 gap-y-6 sm:grid-cols-2 sm:gap-x-8 mt-2">
                    <div class="p-3">
                        <label for="eslider1" class="uppercase text-xs font-bold">eslider 1</label>
                        <input id="eslider1" name="eslider1" ref="nameInput" type="file" @change="($event) => onFileChange($event, 'eslider1')" class="mt-1 text-xs w-full">
                        <InputError :message="form.errors.eslider1" class="mt-2" />
                        <div v-if="form.eslider1">
                            <img :src="form.esliderPreview1" alt="Foto actual" style="max-width: 100px; max-height: 100px;">
                        </div>
                        <div v-else>
                            <p class="text-xs">No hay foto seleccionada.</p>
                        </div>
                    </div>
                    <div class="p-3">
                        <label for="eslider2" class="uppercase text-xs font-bold">eslider 2</label>
                        <input id="eslider2" name="eslider2" ref="nameInput" type="file" @change="($event) => onFileChange($event, 'eslider2')" class="mt-1 text-xs w-full">
                        <InputError :message="form.errors.eslider2" class="mt-2" />
                        <div v-if="form.eslider2">
                            <img :src="form.esliderPreview2" alt="Foto actual" style="max-width: 100px; max-height: 100px;">
                        </div>
                        <div v-else>
                            <p class="text-xs">No hay foto seleccionada.</p>
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-1 gap-y-6 sm:grid-cols-2 sm:gap-x-8 mt-2">
                    <div class="p-3">
                        <label for="eslider3" class="uppercase text-xs font-bold">eslider 3</label>
                        <input id="eslider3" name="eslider3" ref="nameInput" type="file" @change="($event) => onFileChange($event, 'eslider3')" class="mt-1 text-xs w-full">
                        <InputError :message="form.errors.eslider3" class="mt-2" />
                        <div v-if="form.eslider3">
                            <img :src="form.esliderPreview3" alt="Foto actual" style="max-width: 100px; max-height: 100px; ">
                        </div>
                        <div v-else>
                            <p class="text-xs">No hay foto seleccionada.</p>
                        </div>
                    </div>
                    <div class="p-3">
                        <Label for="eslider4" class="uppercase text-xs font-bold">eslider 4</Label>
                        <input id="eslider4" name="eslider4" ref="nameInput" type="file" @change="($event) => onFileChange($event, 'eslider4')" class="mt-1 text-xs w-full">
                        <InputError :message="form.errors.eslider4" class="mt-2" />
                        <div v-if="form.eslider4">
                            <img :src="form.esliderPreview4" alt="Foto actual" style="max-width: 100px; max-height: 100px; ">
                        </div>
                        <div v-else>
                            <p class="text-xs">No hay foto seleccionada.</p>
                        </div>
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
