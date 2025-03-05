<script setup>
import FlagSvg from "./Svgs/FlagSvg.vue";
import ClosedSessionCardRow from "./ClosedSessionCardRow.vue";

const prop = defineProps({ session: Object });
const emit = defineEmits(["finishSession"]);
</script>

<template>
    <div class="bg-white rounded-lg">
        <div class="bg-slate-200 h-1 overflow-hidden">
            <div
                class="bg-green-200 w-1/5 h-1 -translate-x-full shadow-current animate-progress"
                style=""
            ></div>
        </div>

        <div class="px-3 pb-1">
            <p v-text="session.game.name"></p>
            <div class="flex justify-between">
                <ClosedSessionCardRow
                    name-prop="Customer"
                    :value="session.customer.username"
                />
                <button
                    @click="emit('finishSession', session.id)"
                    class="group flex gap-2 items-center"
                >
                    <span class="text-slate-700 text-sm font-semibold"
                        >Finish Session</span
                    >

                    <FlagSvg
                        class="h-4 group-hover:text-green-500 transition-colors"
                    />
                </button>
            </div>
        </div>
    </div>
</template>
