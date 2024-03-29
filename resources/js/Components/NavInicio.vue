<script setup>
import { computed } from 'vue';
import { Link } from '@inertiajs/vue3';

const props = defineProps({
    href: String,
    active: Boolean,
});

const classes = computed(() => {
    return props.active
    ? 'inline-flex items-center px-1 pt-1 border-b-4 border-yellow-400 text-white text-sm font-medium leading-5 bg-green-400 hover:bg-green-500 focus:outline-none focus:bg-green-500 focus:text-white transition duration-200 ease-in-out'
    : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-white text-sm font-medium leading-5 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-200 ease-in-out';
});
</script>

<template>
    <Link :href="href" :class="classes">
        <slot />
    </Link>
</template>
