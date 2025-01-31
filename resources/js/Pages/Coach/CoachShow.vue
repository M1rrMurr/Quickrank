<script setup>
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
                    <div>
                        <div v-text="coach.user.username"></div>
                        <div v-text="coach.user.email"></div>
                    </div>
                </div>
                <!-- games coached by the user -->

                <div class="bg-slate-300 py-2 px-3 mt-6">
                    <div class="flex flex-wrap gap-2">
                        <div
                            class="flex w-56 bg-slate-600"
                            v-for="game in coach.user.games"
                            :key="game.id"
                        >
                            <img class="w-24" :src="game.image" />
                            <div>
                                <div v-text="game.name"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex flex-col items-center mt-6">
                <CalendarComponent :coachId="coach.id" />
            </div>
        </div>
    </AppLayout>
</template>
