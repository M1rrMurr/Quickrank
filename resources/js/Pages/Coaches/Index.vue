<script setup>
import { ref } from "vue";
import AppLayout from "../../Layouts/AppLayout.vue";
const show = ref(false);
</script>
<template>
    <AppLayout>
        Couches
        <button
            class="block px-3 py-1 border hover:bg-yellow-200 hover:text-black"
            @click="show = !show"
        >
            show
        </button>
        <transition
            enter-active-class="ease-in duration-300"
            enter-from-class="opacity-0 translate-y-4"
            enter-to-class="opacity-100 translate-y-0"
            leave-active-class="ease-in duration-200"
            leave-from-class="opacity-100 translate-y-0"
            leave-to-class="opacity-0 translate-y-4"
        >
            <div class="bg-red-500 max-w-max mt-5" v-if="show">
                Content here
            </div>
        </transition>
    </AppLayout>
</template>