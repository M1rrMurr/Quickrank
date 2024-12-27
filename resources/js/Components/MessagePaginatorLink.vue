<script setup>
import { Link } from "@inertiajs/vue3";
const props = defineProps({ link: Object });
</script>
<template>
    <component
        class="text-textColor flex items-center hover:scale-110 transition-transform"
        :is="link.url ? Link : 'span'"
        :href="link.url"
        :class="{
            'cursor-not-allowed': link.url === null,
            'font-bold text-lg': link.active,
        }"
        v-html="link.label"
    >
    </component>
</template>