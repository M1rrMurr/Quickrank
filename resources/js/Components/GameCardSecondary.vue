<script setup>
import { Link } from "@inertiajs/vue3";

const props = defineProps({ game: Object });
</script>

<template>
    <Link class="w-40 relative group" :href="`/games/${game.name}`">
        <!-- Background Image -->
        <img class="top-0 w-full h-60" :src="game.image" />

        <!-- Gradient Overlay -->
        <div
            class="absolute bottom-0 w-full h-3/4 bg-gradient-to-t from-slate-950 from-30% to-transparent pt-10 flex flex-col items-center text-center"
        >
            <div
                class="text-slate-200 group-hover:-translate-y-2 group-hover:scale-105 transition-all text-lg font-bold font p-2 flex-1"
                v-text="game.name"
            ></div>
            <div class="text-slate-200 pb-5 font-semibold">
                <span v-text="game.pivot.price_per_hour"></span>
                <span>$/hour</span>
            </div>
        </div>
    </Link>
</template>
