<script setup>
import { Link } from "@inertiajs/vue3";
import { ref } from "vue";

const props = defineProps({ image: String, title: String });

const showDetails = ref(false);

const toggleShowDetails = () => (showDetails.value = !showDetails.value);
</script>
<template>
    <Link
        class="relative border-2 border-secondary hover:border-highlight rounded hover:scale-110 transition-all"
        href="#"
    >
        <div
            class="px-2 pt-2"
            @mouseenter="toggleShowDetails"
            @mouseleave="toggleShowDetails"
        >
            <img class="h-[300px] w-[200px]" :src="image" />
            <transition
                enter-active-class=" transition ease-in duration-400"
                enter-from-class="opacity-0 translate-y-4"
                enter-to-class="opacity-100 translate-y-0"
                leave-active-class=" transition ease-in duration-200"
                leave-from-class="opacity-100 translate-y-0"
                leave-to-class="opacity-0 translate-y-4"
            >
                <div
                    v-if="showDetails"
                    class="mx-2 absolute inset-x-0 bottom-0 bg-secondary text-center rounded-t-lg transition-all"
                >
                    <div class="pt-2" v-text="title" />

                    <div class="">
                        <div>some text</div>
                    </div>
                </div>
            </transition>
        </div>
    </Link>
</template>