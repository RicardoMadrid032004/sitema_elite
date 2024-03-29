<script setup>
import { Ref, ref } from 'vue';
defineProps({
    collection:{
        type: Array,
        required: true
    }
});
const currentSelection=(1)
const selection= ref([])
const emit = defineEmits(['onCategories'])

const handleAddToSelection =() =>{
    let alreadyExists = false
    selection.value.forEach(item => {
        if(item.id == currentSelection.value.id){
            alreadyExists = true
            return
        }
    })
    if(alreadyExists){
        return
    }

    selection.value.push(currentSelection.value)
    emit('onCategories', selection.value)
}
const handleRemoveSelection = (index) =>{
    selection.value= selection.value.filter(item => item.id !== index)
    emit('onCategories', selection.value)
}

</script>

<template>
    <div class="w-full">
        <div class="felx">
            <select v-model="currentSelection" class="w-full rounded">
                <option v-for="(item, index) in collection" :key="index" :value="item">{{ item?.name }}</option>
            </select>
            <button @click="handleAddToSelection"><i class="fa-solid  fa-plus-circle"></i></button>
        </div>
        <ul>
            <li v-for="(item) in selection" :key="index">{{ item.name}}  
                <span @click="handleRemoveSelection(item.id)"><i class="fa-solid  fa-plus-circle"></i></span> </li>
        </ul>
    </div>
</template>