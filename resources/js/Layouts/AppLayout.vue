<script setup>
import Heading from "../Components/Heading.vue";
</script>
<template>
    <div class="sticky top-0 bg-white shadow z-40">
        <Heading />
    </div>
    <div class="max-w-screen-2xl mx-auto bg-slate-100 min-h-screen">
        <slot />
    </div>
</template>
