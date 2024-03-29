<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Head } from '@inertiajs/vue3';
import {ref} from 'vue';
import { Bar } from 'vue-chartjs';
import { Chart as ChartJS, Title,Tooltip,Legend,BarElement,CategoryScale,LinearScale,ArcElement } from 'chart.js';

ChartJS.register(Title,Tooltip,Legend,BarElement,CategoryScale,LinearScale,ArcElement);
 const props = defineProps({
    data:{type:Object}
 });
 

 const departaments = ref([]);
 const employees = ref([]);
 const chartData = ref([]);
 const chartOptions = ref([]);
 const colors = ref([]);

const random = () =>{
    return Math.floor(Math.random() * 256);
}

props.data.map( (row) =>{
    departaments.value.push(row.name),
    employees.value.push(row.count),
    colors.value.push("rgb("+random()+", "+random()+","+random()+")")
});
chartOptions.value = {responsive:true}
chartData.value = {
    labels:departaments.value,
    datasets:[
        {label:'Employees', data:employees.value, backgroundColor:colors}
    ]
}

</script>

<template>
    <Head title="Graficos" />

    <AppLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Graficos</h2>
        </template>

        <div class="py-12">
            <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <Bar :data="chartData" :options="chartOptions"></Bar>
                </div>
            </div>
        </div>
    </AppLayout>
</template>