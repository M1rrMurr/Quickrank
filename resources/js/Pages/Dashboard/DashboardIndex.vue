<script setup>
import { computed, onMounted, onUnmounted } from "vue";
import { usePage, useForm } from "@inertiajs/vue3";
import AppLayout from "../../Layouts/AppLayout.vue";
import DashboardSessionCard from "../../Components/DashboardSessionCard.vue";
import SessionLockModal from "../../Components/SessionLockModal.vue";
import ClosedSessionCard from "../../Components/ClosedSessionCard.vue";
import ModalContainer from "../../Components/ModalContainer.vue";
import { ref } from "vue";

const props = defineProps({ sessions: Object });
const user = usePage().props.auth.user;

const sessions = ref([...props.sessions]);

const openSessions = computed(() =>
    sessions.value.filter((session) => session.status === "open"),
);
const closedSessions = computed(() =>
    sessions.value.filter((session) => session.status === "closed"),
);

const activeSessions = computed(() =>
    sessions.value.filter((session) => session.satus === "active"),
);

const showLockModal = ref(false);
const sessionToLock = ref(null);

// accept session apply

const acceptApplyform = useForm({ status: null, id: null });

function submitAcceptApplyForm(applyId, sessionId) {
    acceptApplyform.id = applyId;
    acceptApplyform.status = "accepted";
    acceptApplyform.patch("/dashboard/accept-session-apply", {
        preserveScroll: true,
        onSuccess: () => {
            const newSessions = [];

            sessions.value.forEach((session) => {
                if (session.id === sessionId) {
                    const apply = session.session_applies.find(
                        (apply) => apply.id === applyId,
                    );
                    session = {
                        ...session,
                        customer: apply.customer,
                        game: apply.game,
                    };
                    newSessions.push(session);
                } else newSessions.push(session);
            });
            sessions.value = newSessions;
        },
    });
}

//destroy session
const showDestroyModal = ref(false);
const destroyForm = useForm({ coachingSessionId: null });

function openDestroyModal(id) {
    destroyForm.coachingSessionId = id;
    showDestroyModal.value = !showDestroyModal.value;
}
function destroySession() {
    destroyForm.delete("/dashboard/destroy-session", {
        preserveScroll: true,
        onSuccess: () => {
            sessions.value = sessions.value.filter(
                (session) => session.id !== destroyForm.coachingSessionId,
            );
        },
    });
    showDestroyModal.value = !showDestroyModal.value;
}

// close session

const closeSessionForm = useForm({ coachingSessionId: null });

function closeSession(id) {
    closeSessionForm.coachingSessionId = id;
    closeSessionForm.patch("/dashboard/close-session", {
        preserveScroll: true,
        onSuccess: () => {
            const session = sessions.value.find((session) => session.id === id);
            session.status = "closed";
            showLockModal.value = !showLockModal.value;
        },
    });
}

function listenForApplies() {
    window.Echo.private(`App.Models.User.${user.id}`).listen(
        "SessionApplySent",
        (e) => {
            const coachingSession = openSessions.value.find(
                (session) => session.id === e.sessionApply.coaching_session_id,
            );
            console.log(coachingSession);
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
        <h1 class="text-3xl text-slate-800 font-bold mb-6">
            Coaching Dashboard
        </h1>

        <div class="flex gap-5">
            <div class="w-3/5 mr-5">
                <h2
                    class="text-2xl mb-5 font-semibold bg-gradient-to-r from-slate-400 to-sky-800 text-transparent bg-clip-text"
                >
                    Open Sessions
                </h2>
                <div class="relative space-y-5 overflow-hidden">
                    <TransitionGroup
                        move-class="transition-all duration-500 ease-in-out"
                        enter-active-class="transition-all ease-in duration-500"
                        enter-from-class="translate-y-4"
                        enter-to-class="translate-y-0"
                        leave-active-class="transition-all ease-out duration-500 absolute"
                        leave-from-class="opacity-100 translate-y-0"
                        leave-to-class="opacity-0 -translate-y-full"
                    >
                        <DashboardSessionCard
                            v-for="session in openSessions"
                            :key="session.id"
                            :session="session"
                            @delete-session="(id) => openDestroyModal(id)"
                            @open-session-lock-modal="
                                (session) => {
                                    showLockModal = !showLockModal;
                                    sessionToLock = session;
                                }
                            "
                            @accept-apply="
                                (applyId, sessionId) =>
                                    submitAcceptApplyForm(applyId, sessionId)
                            "
                        />
                    </TransitionGroup>
                </div>
            </div>
            <div class="w-2/5">
                <div class="">
                    <h2 class="">Active Sessions</h2>
                </div>
                <h2
                    class="text-2xl font-semibold bg-gradient-to-r from-slate-500 to-emerald-500 text-transparent bg-clip-text"
                >
                    Closed Sessions
                </h2>
                <div class="flex flex-wrap gap-2 mt-5">
                    <ClosedSessionCard
                        v-for="session in closedSessions"
                        :key="session.id"
                        :session="session"
                    >
                    </ClosedSessionCard>
                </div>
            </div>
        </div>
        <!-- modal-->
        <ModalContainer v-if="showLockModal">
            <SessionLockModal
                :session="sessionToLock"
                @close-session="(id) => closeSession(id)"
        /></ModalContainer>

        <!-- destroy modal -->
        <ModalContainer v-if="showDestroyModal">
            <div class="bg-white px-5 py-3">
                <div class="flex">
                    <p>Confirm to destroy this session:</p>
                    <button @click="showDestroyModal = !showDestroyModal">
                        X
                    </button>
                </div>

                <div class="flex gap-2">
                    <button @click="destroySession()">Confirm</button
                    ><button @click="showDestroyModal = !showDestroyModal">
                        Cancel
                    </button>
                </div>
            </div>
        </ModalContainer>
    </AppLayout>
</template>
