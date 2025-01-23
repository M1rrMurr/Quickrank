<script setup>
import { Link } from "@inertiajs/vue3";
defineProps({
    component: { type: String, default: "defaultString" },
    currentComponent: String,
});
</script>
<template>
    <Link
        href="#"
        class="hover:bg-sky-500 py-2 px-3 font-semibold transition-all duration-200 hover:text-white"
        :class="{
            'border-b-2 border-slate-400': component === currentComponent,
        }"
        ><slot
    /></Link>
</template>
