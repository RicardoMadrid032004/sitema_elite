<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import InputError from '@/Components/InputError.vue';
import { Link, useForm } from '@inertiajs/vue3';
import { ref } from 'vue';
import Swal from 'sweetalert2';
defineProps({
    ciclos: {
        type : Object,
        required: true
    }
})

const form = useForm({
  numeroDocumento: '',
  nombres: '',
  apellidoPaterno: '',
  apellidoMaterno: '',
  nombre_apoderado: '',
  apellido_apoderado:'',
  ciclo_id:'',
  monto_a_pagar:'',
  monto_pagado:'',
  modalidad_pago:'',
  fecha_inscripcion:''
  // Agregar otros campos según sea necesario
});

const errors = ref({
  numeroDocumento: '',
});

const consultarReniec = async () => {
  try {
    const response = await fetch(`/consultar-reniec?numero=${form.numeroDocumento}`);

    if (response.ok) {
      const persona = await response.json();
      form.nombres = persona.nombres;
      form.apellidoPaterno = persona.apellidoPaterno;
      form.apellidoMaterno = persona.apellidoMaterno;
      errors.value.numeroDocumento = ''; // Limpiar errores si la consulta es exitosa
    } else if (response.status === 404) {
      errors.value.numeroDocumento = 'No se encontró información para el DNI ingresado.';
    } else {
      throw new Error('Error en la consulta a la API de Reniec.');
    }
  } catch (error) {
    console.error(error);
  }
};

const submitForm = () => {
    form.post(route('inscripciones.store'), {
        onSuccess: () => {
            Swal.fire({
                icon: 'success',
                title: 'Éxito',
                text: 'La inscripciones se ha registrado correctamente.'
            });
        },
        onError: (errors) => {
            if(errors.response && errors.response.status) {
                // Si hay un error de respuesta HTTP, manejarlo aquí
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Ha ocurrido un error al registrar el producto. Por favor, inténtalo de nuevo.'
                });
                console.error('Error HTTP:', errors.response.status);
            } else {
                // Si el error no tiene una propiedad de respuesta o de estado, manejarlo aquí
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Ha ocurrido un error al procesar tu solicitud. Por favor, inténtalo de nuevo más tarde.'
                });
                console.error('Error desconocido:', errors);
            }
        }
    });
}

</script>

<template>
    <AppLayout title="Registrar-Inscripción">
        <template #header>
            <h2 class="font-semibold uppercase text-md text-gray-800 leading-tight">
              Registrar INSCRIPCIÓN
            </h2><br><hr>
        </template>
  
        <div class="flex justify-center">
          <div class="py-2 md:py-4 min-h-[calc(100vh-185px)] overflow-auto container items-center">
              <div class="h-full mx-auto px-4 sm:px-6 lg:px-8">
                  <div class="p-6 bg-white border-gray-100 shadow-2xl rounded-lg">
                        <form @submit.prevent="submitForm">
                            <div class="grid grid-cols-1 gap-y-6 sm:grid-cols-4 sm:gap-x-8 mb-3">
                                <!-- Campo para ingresar el número de DNI -->
                                <div>
                                    <InputLabel class="text-xs" for="numeroDocumento" value="Número de DNI" />
                                    <TextInput
                                        v-model="form.numeroDocumento"
                                        type="text"
                                        id="numeroDocumento"
                                        placeholder="Ingrese  DNI y consultar por reniec" class="w-full text-xs"
                                    />
                                    <InputError :message="errors.numeroDocumento" />
                                </div>
                
                                <!-- Campos que se llenarán automáticamente -->
                                <div>
                                    <InputLabel value="Nombres" class="text-xs"/>
                                    <TextInput v-model="form.nombres" type="text"  class="w-full text-xs" />
                                </div>
                                <div>
                                    <InputLabel value="Apellido Paterno" class="text-xs" />
                                    <TextInput v-model="form.apellidoPaterno" type="text" class="w-full text-xs"/>
                                </div>
                                <div>
                                    <InputLabel value="Apellido Materno" class="text-xs"/>
                                    <TextInput v-model="form.apellidoMaterno" type="text" class="text-xs w-full"/>
                                </div>
                            </div>
                            <div class="grid grid-cols-1 gap-y-6 sm:grid-cols-4 sm:gap-x-8 mb-3">
                              <!-- Campo para ingresar el nombre del apoderado -->
                                <div>
                                    <InputLabel for="nombre_apoderado" value="Nombre del apoderado" class="text-xs" />
                                    <TextInput v-model="form.nombre_apoderado" type="text" id="nombre_apoderado" placeholder="nombre del apoderado"  class="w-full text-xs"/>
                                </div>
                                <div>
                                    <InputLabel for="apellido_apoderado" value="apellido_apoderado" class="text-xs"/>
                                    <TextInput v-model="form.apellido_apoderado" type="text" id="apellido_apoderado" placeholder="apellido del apoderado"  class="w-full text-xs"/>
                                </div>
                                <div >
                                    <InputLabel for="ciclo_id" value="ciclo :" class="mb-0 text-xs"></InputLabel>
                                    <select id="ciclo_id" v-model="form.ciclo_id" autofocus class="w-full block text-xs text-gray-900 rounded-2xl">
                                        <option value="">Selecciona un ciclo</option>
                                        <option v-for="ciclo in ciclos" :key="ciclo.id" :value="ciclo.id">{{ ciclo.nombre }}</option>
                                    </select>

                                </div>

                                <div>
                                    <InputLabel for="monto_a_pagar" value="monto_a_pagar" class="text-xs" />
                                    <TextInput v-model="form.monto_a_pagar" type="text" id="monto_a_pagar" placeholder="solo numeros"  class="w-full text-xs"/>
                                </div>
                            </div>
                            <div class="grid grid-cols-1 gap-y-6 sm:grid-cols-4 sm:gap-x-8 mb-3">
                              <!-- Campo para ingresar el nombre del apoderado -->
                              <div>
                                  <InputLabel for="monto_pagado" value="monto_pagado" class="text-xs"/>
                                  <TextInput v-model="form.monto_pagado" type="text" id="monto_pagado" placeholder="monto_pagado"  class="w-full text-xs"/>
                              </div>
                              <div>
                                  <InputLabel for="modalidad_pago" value="modalidad_pago" class="text-xs"/>
                                  <TextInput v-model="form.modalidad_pago" type="text" id="modalidad_pago" placeholder="modalidad_pago"  class="w-full text"/>
                              </div>
                              <div>
                                  <InputLabel for="fecha_inscripcion" value="fecha_inscripcion" class="text-xs" />
                                  <TextInput v-model="form.fecha_inscripcion" type="date" id="fecha_inscripcion" placeholder=" fecha_inscripcion"  class="w-full text-xs"/>
                              </div>
                            </div>
                            <div class="d-flex mt-4">
                              <!-- Botón para consultar información a la API de Reniec -->
                              <div class="flex justify-start">
                              <PrimaryButton type="button" @click="consultarReniec">Consultar Reniec</PrimaryButton>
                              </div>
              
                              <!-- Botón de enviar -->
                              <div class="flex justify-end">
                              <PrimaryButton type="submit">Guardar</PrimaryButton>
                              <Link :href="route('inscripciones.index')" class="ml-5 uppercase text-sm inline-block bg-red-500 text-white font-bold py-2 px-4 rounded hover:bg-red-700">
                                    Cancelar
                                </Link>
                              </div>
                            </div>
                      </form>
                  </div>
              </div>
          </div>
      </div>
    </AppLayout>
</template>
  
