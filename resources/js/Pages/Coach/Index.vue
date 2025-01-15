<script setup>
import { Link } from "@inertiajs/vue3";
import { ref } from "vue";
import AppLayout from "../../Layouts/AppLayout.vue";
import BasicButton from "../../Components/BasicButton.vue";
const show = ref(false);
const showModal = () => (show.value = !show.value);
</script>
<!-- playground for now -->
<template>
    <AppLayout>
        <div>
            <div><li></li></div>
        </div>
        <div class="text-xl font-semibold text-red-500">
            jó hello vagyok kolbászok nemtudom:
        </div>
        <div class="flex items-end">
            <div class="text-sm leading-none">hello</div>
            <div class="border-0 border-l h-6 border-white"></div>
            <div class="text-lg leading-none">hello</div>
            <div class="border-0 border-l border-white"></div>
            <div class="text-xl leading-none">hello</div>
        </div>
        <div class="relative">
            <BasicButton @click="showModal">Gonb</BasicButton>
            <div v-if="show" class="fixed inset-0">
                <div
                    @click="show = !show"
                    class="absolute inset-0 bg-black backdrop-blur-sm bg-opacity-50 grid place-items-center"
                >
                    <div @click.stop class="bg-white p-4 rounded shadow-md">
                        my modal
                        <BasicButton @click="showModal">close</BasicButton>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
