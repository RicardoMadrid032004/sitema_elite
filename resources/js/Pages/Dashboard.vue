<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Welcome from '@/Components/Welcome.vue';
</script>

<template>
    <AppLayout title="CONTROL">
        <template #header>
            <h2 class="font-semibold text-md uppercase text-gray-800 leading-tight">
            BIENVENIDO  ! {{ $page.props.auth.user.name }} ¡ TIENES EL CONTROL
            </h2><br><hr>
        </template>

        <div class="py-2">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-2xl sm:rounded-lg">
                    
                </div>
            </div>
        </div>
    </AppLayout>
</template>
