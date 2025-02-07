<script setup>
import { computed } from "vue";

import AppLayout from "../../Layouts/AppLayout.vue";
import DashboardSessionCard from "../../Components/DashboardSessionCard.vue";
const props = defineProps({ sessions: Object });
const openSessions = computed(() =>
    props.sessions.filter((session) => session.status === "open"),
);
</script>

<template>
    <AppLayout>
        <h1 class="text-3xl text-slate-800 font-bold">Coaching Dashboard</h1>

        <h2>Open Sessions</h2>
        <div class="space-y-2">
            <DashboardSessionCard
                v-for="session in openSessions"
                :key="session.id"
                :session="session"
            />
        </div>
        <h2>Pending Sessions</h2>
    </AppLayout>
</template>
