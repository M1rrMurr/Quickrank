<script setup>
import { onMounted, onUnmounted, ref } from "vue";
import SessionTimestamp from "./SessionTimestamp.vue";
import TransitionButton from "./TransitionButton.vue";
import ClosedSessionCardRow from "./ClosedSessionCardRow.vue";
import CancelSvg from "./Svgs/CancelSvg.vue";
import PlaySvg from "./Svgs/PlaySvg.vue";
const props = defineProps({ session: Object, error: String });
const emit = defineEmits([
    "cancelSession",
    "destroySession",
    "startSession",
    "clearStartSessionError",
]);

const errorRef = ref(null);

function closeError(e) {
    if (errorRef.value) {
        if (!errorRef.value.contains(e.target)) {
            emit("clearStartSessionError");
        }
    }
}

onMounted(() => document.addEventListener("click", (e) => closeError(e)));

onUnmounted(() => document.removeEventListener("click", closeError));
</script>

<template>
    <div
        class="w-72 bg-gradient-to-br from-white to-emerald-300 from-20% p-0.5 rounded"
    >
        <div class="px-3 py-3 bg-white rounded">
            <div class="flex items-center gap-1">
                <div
                    class="font-semibold text-slate-600"
                    v-text="new Date(session.start).toDateString()"
                ></div>
                <SessionTimestamp :date="session.start" />&dash;
                <SessionTimestamp :date="session.end" />
            </div>
            <ClosedSessionCardRow
                nameProp="Customer:"
                :value="session.customer.username"
            />
            <ClosedSessionCardRow
                name-prop="Game:"
                :value="session.game.name"
            />
            <div class="relative w-full flex justify-end gap-2 mt-3">
                <TransitionButton @click="emit('cancelSession', session.id)"
                    ><template #icon
                        ><CancelSvg class="h-5 text-red-300" /></template
                    ><span class="text-red-300">Cancel</span>
                </TransitionButton>
                <div
                    ref="errorRef"
                    class="absolute text-sm font-normal text-red-500 -translate-y-6 bg-white border rounded-md px-2 py-1"
                    v-if="error"
                    v-text="error"
                ></div>

                <TransitionButton @click="emit('startSession', session.id)">
                    <template #icon
                        ><PlaySvg class="h-5 text-blue-300"
                    /></template>
                    <span class="text-blue-300"> Start</span>
                </TransitionButton>
            </div>
        </div>
    </div>
</template>
