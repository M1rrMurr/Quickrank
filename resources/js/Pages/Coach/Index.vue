<script setup>
import { Link } from "@inertiajs/vue3";
import { ref } from "vue";
import AppLayout from "../../Layouts/AppLayout.vue";
import BasicButton from "../../Components/BasicButton.vue";
const show = ref(false);
const showModal = () => (show.value = !show.value);
const showDropdown = ref(false);
</script>
<!-- playground for now -->
<template>
    <AppLayout>
        <div>
            <div><li></li></div>
        </div>
        <div
            class="text-xl font-semibold text-transparent bg-gradient-to-t from-red-500 via-orange-500 to-violet-500 bg-clip-text"
        >
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

                        <!-- dropdowncontainer -->
                        <div class="relative">
                            <button @click="showDropdown = !showDropdown">
                                O
                            </button>
                            <div
                                v-if="showDropdown"
                                class="absolute py-3 px-5 border border-pink-500 bg-yellow-500"
                            >
                                kolbász
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
