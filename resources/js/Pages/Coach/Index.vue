<script setup>
import { ref } from "vue";
import AppLayout from "../../Layouts/AppLayout.vue";
import BasicButton from "../../Components/BasicButton.vue";

const show = ref(false);
const showModal = () => (show.value = !show.value);
</script>
<!-- playground for now -->
<template>
    <AppLayout>
        <div class="flex items-end">
            <div class="text-sm leading-none">hello</div>
            <div class="text-lg leading-none">hello</div>
            <div class="text-xl leading-none">hello</div>
        </div>
        <div class="relative">
            <BasicButton @click="showModal">Gonb</BasicButton>
            <div v-if="show" class="fixed inset-0">
                <!-- Backdrop -->
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
