<script setup>
const props = defineProps({ nameProp: String, value: String });
</script>

<template>
    <div class="flex gap-2 items-center">
        <div class="text-sm font-semibold text-slate-400" v-text="nameProp" />
        <div class="text-sm text-slate-500 font-semibold" v-text="value" />
    </div>
</template>
