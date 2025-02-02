<script setup>
const props = defineProps({ sessions: Object, sessionsDate: String });
console.log(props.sessionsDate);
import { Transition } from "vue";
import SessionComponent from "./SessionComponent.vue";
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
            v-if="sessions.length"
            class="bg-slate-300 shadow-md mx-1 my-1 mt-6 py-4 px-1"
        >
            <div class="font-semibold text-slate-500">
                Sessions on
                <span class="text-slate-100" v-text="sessionsDate" />
            </div>
            <div class="flex gap-1 mt-3">
                <!-- sessions -->
                <SessionComponent
                    v-for="session in sessions"
                    :key="session.id"
                    :session="session"
                />
            </div>
        </div>
    </Transition>
</template>
