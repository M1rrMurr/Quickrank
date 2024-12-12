<script setup>
import { Link } from "@inertiajs/vue3";
import { ref } from "vue";

const props = defineProps({ game: Object });
const { id, name, image } = props.game;

const showDetails = ref(false);

const toggleShowDetails = () => (showDetails.value = !showDetails.value);
</script>
<template>
    <Link
        class="relative hover:scale-110 transition-all duration-300"
        :href="`/games/${name}`"
    >
        <div
            class="px-2 pt-2"
            @mouseenter="toggleShowDetails"
            @mouseleave="toggleShowDetails"
        >
            <img class="h-[300px] w-[200px]" :src="image" />
            <transition
                enter-active-class=" transition ease-in duration-300"
                enter-from-class="opacity-0 translate-y-4"
                enter-to-class="opacity-100 translate-y-0"
                leave-active-class=" transition ease-in duration-200"
                leave-from-class="opacity-100 translate-y-0"
                leave-to-class="opacity-0 translate-y-4"
            >
                <div
                    v-if="showDetails"
                    class="mx-2 absolute inset-x-0 bottom-0 bg-black/80 text-center rounded-t-lg transition-all"
                >
                    <div class="pt-2 font-semibold" v-text="name" />

                    <div class="flex justify-center gap-3 mt-3 mb-2">
                        <div
                            class="flex items-center justify-center border border-white/20 px-3 py1 rounded text-xs font-semibold"
                            v-for="tag in game.tags"
                            :key="tag.id"
                        >
                            #<span v-text="tag.name" />
                        </div>
                    </div>
                </div>
            </transition>
        </div>
    </Link>
</template>