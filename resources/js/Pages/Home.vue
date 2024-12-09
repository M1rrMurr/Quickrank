<script setup>
import AppLayout from "../Layouts/AppLayout.vue";
import GameCard from "../Components/GameCard.vue";
</script>
<template>
    <AppLayout>
        <section class="space-y-10 mt-10">
            <div class="text-2xl font-semibold">Chose Your Game</div>
            <div class="flex justify-center flex-wrap gap-14">
                <GameCard
                    title="League of Legends"
                    image="/images/leagueoflegends.webp"
                />
                <GameCard
                    title="League of Legends"
                    image="/images/leagueoflegends.webp"
                />
                <GameCard
                    title="League of Legends"
                    image="/images/leagueoflegends.webp"
                />
                <GameCard
                    title="League of Legends"
                    image="/images/leagueoflegends.webp"
                />
            </div>
        </section>
    </AppLayout>
</template>