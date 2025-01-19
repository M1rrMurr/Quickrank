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
        class="hover:bg-gradient-to-r from-indigo-500 to-sky-500 py-2 px-3 font-semibold transition-colors duration-200"
        :class="{
            'border-b-2': component === currentComponent,
        }"
        ><slot
    /></Link>
</template>
