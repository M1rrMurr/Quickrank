<script setup>
import NavLink from "./NavLink.vue";

import { usePage } from "@inertiajs/vue3";
const pageProps = usePage();
</script>
<template>
    <div class="flex justify-center items-center gap-3">
        <NavLink
            href="/coaches"
            :currentComponent="pageProps.component"
            component="Coach/Index"
            >Coaches</NavLink
        >
        <NavLink>Link</NavLink>
        <NavLink>Link</NavLink>
        <NavLink>Link</NavLink>
    </div>
</template>