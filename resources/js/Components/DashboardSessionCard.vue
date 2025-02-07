<script setup>
const props = defineProps({ session: Object });
import SessionTimestamp from "./SessionTimestamp.vue";
</script>

<template>
    <div class="px-3 py-1 border w-full">
        <div class="flex gap-1 items-center">
            <div v-text="new Date(session.start).toDateString()"></div>
            <SessionTimestamp :date="session.start" />
            <span>&dash;</span>
            <SessionTimestamp :date="session.end" />
        </div>
        <div>Applies</div>
        <div
            class="w-1/2 border border-sky-300"
            v-for="apply in session.session_applies"
        >
            <div class="flex gap-2">
                <div>Customer:</div>
                <div v-text="apply.customer.username"></div>
            </div>
        </div>
    </div>
</template>
