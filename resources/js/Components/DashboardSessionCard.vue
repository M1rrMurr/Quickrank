<script setup>
import { ref, computed } from "vue";
import SessionTimestamp from "./SessionTimestamp.vue";

const props = defineProps({ session: Object });
const showApplies = ref(null);
const applyCounter = computed(() => props.session.session_applies.length);
</script>

<template>
    <div class="px-3 py-1 border w-full bg-slate-200">
        <div class="flex gap-1 items-center">
            <div v-text="new Date(session.start).toDateString()"></div>
            <SessionTimestamp :date="session.start" />
            <span>&dash;</span>
            <SessionTimestamp :date="session.end" />
        </div>
        <div
            class="cursor-pointer w-fit px-3 py-1 text-transparent bg-gradient-to-tr from-sky-500 to-red-500 font-semibold bg-clip-text"
            @click="showApplies = !showApplies"
        >
            Applies <span>&DownArrow;</span>
            <span v-if="applyCounter" v-text="applyCounter" />
        </div>
        <div
            v-if="showApplies"
            class="w-1/2 bg-slate-300 mb-1"
            v-for="apply in session.session_applies"
        >
            <div class="flex gap-2">
                <div>Customer:</div>
                <div v-text="apply.customer.username"></div>
            </div>
            <div class="flex gap-2">
                <div>Game:</div>
                <div v-text="apply.game.name"></div>
            </div>
        </div>
    </div>
</template>
