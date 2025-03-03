<script setup>
import SessionTimestamp from "./SessionTimestamp.vue";
import TransitionButton from "./TransitionButton.vue";
import ClosedSessionCardRow from "./ClosedSessionCardRow.vue";
import CancelSvg from "./Svgs/CancelSvg.vue";
import PlaySvg from "./Svgs/PlaySvg.vue";
const props = defineProps({ session: Object });
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
            <div class="w-full flex justify-end gap-2 mt-3">
                <TransitionButton
                    ><template #icon
                        ><CancelSvg class="h-5 text-red-300" /></template
                    ><span class="text-red-300">Cancel</span>
                </TransitionButton>
                <TransitionButton @click="console.log('helo')">
                    <template #icon
                        ><PlaySvg class="h-5 text-blue-300"
                    /></template>
                    <span class="text-blue-300"> Start</span>
                </TransitionButton>

                <!--
                <button class="group flex text-sm font-semibold items-center">
                    <span
                        class="text-red-200 group-hover:text-red-500 transition-colors duration-300"
                        >Cancel</span
                    >
                    <CancelSvg class="h-5 text-red-400" />
                </button>
                <button class="group flex font-semibold items-center text-sm">
                    <span
                        class="text-emerald-200 group-hover:text-emerald-500 transition-colors duration-300"
                        >Start</span
                    >
                    <PlaySvg class="h-5 text-emerald-400" />
                </button>
-->
            </div>
        </div>
    </div>
</template>
