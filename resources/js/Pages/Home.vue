<script setup>
import AppLayout from "../Layouts/AppLayout.vue";
import GameCard from "../Components/GameCard.vue";
const props = defineProps({ games: Object });
</script>
<template>
    <AppLayout>
        <section class="space-y-10 mt-10">
            <div class="text-2xl font-semibold">Chose Your Game</div>
            <div class="flex justify-center flex-wrap gap-14">
                <GameCard v-for="game in games" :key="game.id" :game="game" />
            </div>
        </section>
    </AppLayout>
</template>