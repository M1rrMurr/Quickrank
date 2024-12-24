<script setup>
import { onUnmounted, ref } from "vue";
import AppLayout from "../../Layouts/AppLayout.vue";
import { usePage } from "@inertiajs/vue3";
import { computed } from "vue";
import { onMounted } from "vue";
const show = ref(false);
</script>
<template>
    <AppLayout> </AppLayout>
</template>