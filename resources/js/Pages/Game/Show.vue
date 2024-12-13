<script setup>
import AppLayout from "../../Layouts/AppLayout.vue";
const props = defineProps({ game: Object });
</script>
<template>
    <AppLayout>
        <div class="text-3xl font-bold" v-text="game.name" />
        <img class="" :src="game.image" />
        <div>
            <div class="text-xl">Coaches</div>
            <div class="flex gap-3 flex-wrap">
                <div
                    class="p-3 rounded bg-secondary/30 w-40"
                    v-for="coach in game.users"
                    :key="coach.id"
                >
                    <img class="h-20" :src="coach.avatar" />
                    <div v-text="coach.name" />
                </div>
            </div>
        </div>
    </AppLayout>
</template>