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
            <div v-for="coach in game.users" :key="coach.id">
                <div v-text="coach.name" />
            </div>
        </div>
    </AppLayout>
</template>