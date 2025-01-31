<script setup>
const props = defineProps({ sessions: Object });
import { Transition } from "vue";
import SessionTimestamp from "./SessionTimestamp.vue";
</script>
<template>
    <Transition
        enter-active-class="transition ease-in druation-150"
        enter-from-class="opacity-0 -translate-y-4"
        enter-to-class="opacity-100 tranlsate-y-0"
        leave-active-class="transition ease-in duration-150"
        leave-from-class="opacity-100 translate-y-0"
        leave-to-class="opacity-0 -translate-y-4"
    >
        <div
            class="bg-slate-300 shadow-md mx-1 my-1 mt-6 py-4 px-1"
            v-show="sessions.length > 1"
        >
            <div class="font-semibold text-slate-500">Sessions</div>
            <div class="flex gap-1 mt-3">
                <div
                    class="flex flex-wrap items-center justify-center gap-1 bg-slate-500 px-22 py-1 rounded-sm"
                    v-for="session in sessions"
                    :key="session.id"
                >
                    <SessionTimestamp :date="session.start" />
                    <span class="text-violet-300"> &dash; </span>
                    <SessionTimestamp :date="session.end" />
                </div>
            </div>
        </div>
    </Transition>
</template>
