<script setup>
import { ref, onMounted, onUnmounted } from "vue";

import SessionApplyForm from "./SessionApplyForm.vue";
import SessionTimestamp from "./SessionTimestamp.vue";

const props = defineProps({ session: Object, games: Object });
const trigger = ref(null);
const sessionApply = ref(null);
const showApply = ref(false);

function handleOutsideClick(e) {
    if (sessionApply.value && trigger.value) {
        if (
            !trigger.value.contains(e.target) &&
            !sessionApply.value.$el.contains(e.target)
        ) {
            showApply.value = false;
        }
    }
}

onMounted(() =>
    document.addEventListener("click", (e) => handleOutsideClick(e)),
);
onUnmounted(() => document.removeEventListener("click", handleOutsideClick));
</script>
<template>
    <div
        class="bg-slate-500 px-22 py-1 rounded-sm cursor-pointer"
        @click="
            () => {
                showApply = false;
                showApply = true;
            }
        "
    >
        <div ref="trigger" class="flex items-center justify-center gap-1">
            <SessionTimestamp :date="session.start" />
            <span class="text-violet-300"> &dash; </span>
            <SessionTimestamp :date="session.end" />
        </div>
        <Transition
            enter-active-class="transition ease-in duration-300"
            enter-from-class="opacity-0"
            enter-to-class="opacity-100"
            leave-active-class="transtion esae-in duration-300"
            leave-from-class="opacity-100"
            leave-to-class="opacity-0"
        >
            <SessionApplyForm
                @close-apply="showApply = false"
                ref="sessionApply"
                v-if="showApply"
                :games="games"
                :sessionId="session.id"
            />
        </Transition>
    </div>
</template>
