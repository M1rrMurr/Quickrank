<script setup>
import { computed, onMounted, onUnmounted } from "vue";
import { usePage } from "@inertiajs/vue3";
import AppLayout from "../../Layouts/AppLayout.vue";
import DashboardSessionCard from "../../Components/DashboardSessionCard.vue";
const props = defineProps({ sessions: Object });

const computedSessions = computed(() => props.sessions);
const openSessions = computed(() =>
    computedSessions.value.filter((session) => session.status === "open"),
);

const user = usePage().props.auth.user;

function listenForApplies() {
    window.Echo.private(`App.Models.User.${user.id}`).listen(
        "SessionApplySent",
        (e) => {
            const coachingSession = computedSessions.value.find(
                (session) => session.id === e.sessionApply.coaching_session_id,
            );
            coachingSession.session_applies.push(e.sessionApply);
        },
    );
}

onMounted(() => listenForApplies());

onUnmounted(() =>
    window.Echo.private(`App.Models.User.${user.id}`).stopListening(
        "SessionApplySent",
    ),
);
</script>

<template>
    <AppLayout>
        <h1 class="text-3xl text-slate-800 font-bold">Coaching Dashboard</h1>

        <h2>Open Sessions</h2>
        <div class="flex">
            <div class="space-y-2 w-3/5">
                <DashboardSessionCard
                    v-for="session in openSessions"
                    :key="session.id"
                    :session="session"
                />
            </div>
        </div>
        <h2>Pending Sessions</h2>
    </AppLayout>
</template>
