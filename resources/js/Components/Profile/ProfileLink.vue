<script setup>
import { Link } from "@inertiajs/vue3";
</script>

<template>
    <Link
        class="hover:bg-gradient-to-r h-8 from-indigo-400 to-sky-400 py-1 px-3 font-semibold rounded block text-sm"
    >
        <slot />
    </Link>
</template>
