<script setup>
import GameCardSecondary from "../../Components/GameCardSecondary.vue";
import CalendarComponent from "../../Components/CalendarComponent.vue";
import AppLayout from "../../Layouts/AppLayout.vue";

const props = defineProps({ coach: Object });
</script>
<template>
    <AppLayout>
        <div class="grid grid-cols-2">
            <div class="flex-col flex items-center mt-6">
                <div
                    class="bg-gradient-to-br from-violet-300 to-emerald-300 w-2/3 rounded-md px-3 py-1 font-semibold flex gap-3 text-slate-800"
                >
                    <img
                        class="w-28 h-28 shadow-md rounded-full"
                        :src="coach.user.avatar"
                    />
                    <div class="text-slate-700">
                        <div v-text="coach.user.username"></div>
                        <div v-text="coach.user.email"></div>
                    </div>
                </div>
                <!-- games coached by the user -->
                <div class="bg-slate-200 py-3 px-5 mt-6 w-4/5">
                    <div class="text-lg font-semibold text-slate-700 mb-6">
                        <span v-text="coach.user.username.split(' ')[0]"></span>
                        <span>'s games</span>
                    </div>

                    <div class="flex gap-2 flex-wrap">
                        <GameCardSecondary
                            v-for="game in coach.user.games"
                            :game="game"
                            :key="game.id"
                        />
                    </div>
                </div>
            </div>
            <div class="flex flex-col items-center mt-6">
                <CalendarComponent
                    :coachId="coach.id"
                    :games="coach.user.games"
                />
            </div>
        </div>
    </AppLayout>
</template>
