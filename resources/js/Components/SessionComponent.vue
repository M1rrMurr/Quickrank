<script setup>
import SessionTimestamp from "./SessionTimestamp.vue";
import { ref, onMounted, onUnmounted } from "vue";

const props = defineProps({ session: Object });
const trigger = ref(null);
const sessionDropdown = ref(null);
const showDetails = ref(false);
function handleOutsideClick(e) {
    if (sessionDropdown.value && trigger.value) {
        if (
            !trigger.value.contains(e.target) &&
            !sessionDropdown.value.contains(e.target)
        ) {
            showDetails.value = false;
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
        @click="showDetails = true"
    >
        <div ref="trigger" class="flex items-center justify-center gap-1">
            <SessionTimestamp :date="session.start" />
            <span class="text-violet-300"> &dash; </span>
            <SessionTimestamp :date="session.end" />
        </div>

        <div
            ref="sessionDropdown"
            v-if="showDetails"
            class="absolute mt-2 bg-gradient-to-br from-slate-700 to-slate-300 border border-slate-200 pr-4 shadow-md"
        >
            <div class="flex gap-2">
                <img class="h-32" :src="session.game.image" />
                <div class="text-slate-300 font-semibold">
                    <div class="" v-text="session.game.name"></div>
                    <div class="space-x-2">
                        <span class="text-slate-800">Coach: </span>
                        <span v-text="session.coach.user.username"></span>
                    </div>
                    <div class="space-x-2">
                        <span class="text-slate-800">Customer:</span>
                        <span v-text="session.customer.username"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
