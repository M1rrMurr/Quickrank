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
        class="hover:bg-secondary py-2 px-3 font-semibold"
        :class="{
            'border-b-2': component === currentComponent,
        }"
        ><slot
    /></Link>
</template>