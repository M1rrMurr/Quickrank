<script setup>
import SessionTimestamp from "./SessionTimestamp.vue";
const props = defineProps({ session: Object });
const emit = defineEmits(["closeSession"]);
</script>

<template>
    <div class="bg-white px-5 py-3 rounded-md">
        <div class="flex justify-between gap-2">
            <p class="text-lg font-semibold">Confirm your session data</p>
            <button @click="emit('closeModal')">x</button>
        </div>
        <div class="border-0 border-b border-b-slate-200 my-2"></div>
        <div class="flex items-center gap-1">
            <div v-text="new Date(session.start).toDateString()" />
            <span class="text-xs">From:</span
            ><SessionTimestamp :date="session.start" /><span class="text-xs"
                >To:</span
            ><SessionTimestamp :date="session.end" />
        </div>

        <div class="flex gap-2">
            <div class="font-semibold text-slate-500">Customer:</div>
            <div v-text="session.customer.username"></div>
        </div>
        <div class="flex gap-2">
            <div class="font-semibold text-slate-500">Game:</div>
            <div v-text="session.game.name"></div>
        </div>
        <div class="flex gap-2">
            <div class="font-semibold text-slate-500">Price:</div>
            <div v-text="session.price"></div>
        </div>
        <div class="w-full flex justify-end mt-3">
            <button
                class="text-sky-400"
                @click="emit('closeSession', session.id)"
            >
                Confirm
            </button>
        </div>
    </div>
</template>
