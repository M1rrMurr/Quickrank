<script setup>
import { ref, computed } from "vue";
import { useForm } from "@inertiajs/vue3";
import TrashBin from "./Svgs/TrashBin.vue";
import SessionTimestamp from "./SessionTimestamp.vue";
import LockSvg from "./Svgs/LockSvg.vue";
import SessionApplyCardRow from "../../../SessionApplyCardRow.vue";
import CheckMark from "./Svgs/CheckMark.vue";
import ArrowDown from "./Svgs/ArrowDown.vue";

const props = defineProps({ session: Object });
const emit = defineEmits([
    "openSessionLockModal",
    "acceptApply",
    "deleteSession",
]);
const applies = computed(() => props.session.session_applies);

const applyContainer = ref(null);
const showApplies = ref(null);
const applyCounter = computed(() => props.session.session_applies.length);

const toggleApplies = function () {
    showApplies.value = !showApplies.value;
    setTimeout(() => {
        if (showApplies) {
            applyContainer.value.classList.add("overflow-y-auto");
        }
    }, 300);
};
</script>

<template>
    <div
        class="px-3 py-1 border border-slate-200 shadow-md rounded w-full bg-sky-50"
    >
        <div class="flex items-center justify-between">
            <div class="flex gap-1 items-center">
                <div
                    class="font-medium text-slate-500"
                    v-text="new Date(session.start).toDateString()"
                ></div>
                <SessionTimestamp :date="session.start" class="text-sky-400" />
                <span>&dash;</span>
                <SessionTimestamp :date="session.end" class="text-sky-400" />
            </div>
            <div class="flex">
                <div class="w-72">
                    <div class="flex items-center gap-2">
                        <span class="font-semibold text-sky-400">Game:</span>
                        <span
                            class=""
                            :class="{
                                'text-slate-400': !session.game,
                                'font-semibold text-slate-700': session.game,
                            }"
                            v-text="session.game?.name ?? 'not selected'"
                        ></span>
                    </div>
                    <div class="flex gap-2 items-center">
                        <span class="font-semibold text-sky-400"
                            >Customer:</span
                        >
                        <span
                            class=""
                            :class="{
                                'text-slate-400': !session.customer,
                                'font-semibold text-slate-700':
                                    session.customer,
                            }"
                            v-text="
                                session.customer?.username ?? 'not selected'
                            "
                        />
                    </div>
                </div>
                <div class="flex gap-3 items-center">
                    <button
                        :disabled="!session.customer || !session.game"
                        @click="emit('openSessionLockModal', session)"
                        class=""
                    >
                        <LockSvg
                            class="h-6"
                            :class="{
                                'text-red-200':
                                    !session.game || !session.customer,
                                'text-green-500':
                                    session.game && session.customer,
                            }"
                        />
                    </button>
                    <button @click="emit('deleteSession', session.id)">
                        <TrashBin class="h-5 text-red-500" />
                    </button>
                </div>
            </div>
        </div>

        <!-- dropdown trigger -->
        <div
            class="cursor-pointer gap-1 flex items-center justify-center w-fit px-3 py-1 font-semibold text-slate-600"
            @click="toggleApplies"
        >
            Applies
            <span v-if="applyCounter" v-text="applyCounter" />
            <ArrowDown class="h-6 text-sky-400" />
        </div>

        <!-- applies -->
        <div
            ref="applyContainer"
            :class="{
                'max-h-0 ': !showApplies,
                'max-h-[200px] ': showApplies,
            }"
            class="transition-all duration-300 overflow-hidden space-y-2"
            style="
                scrollbar-gutter: stable;
                scrollbar-width: thin;
                scrollbar-color: #94a3b8 #bae6fd;
            "
        >
            <div
                class="w-1/2 bg-red-500 p-0.5 bg-gradient-to-br from-30% from-white to-slate-400 shadow-md rounded"
                v-for="apply in applies"
            >
                <div
                    class="bg-gradient-to-br from-white to-slate-200 px-3 py-1 rounded"
                >
                    <div class="flex justify-between items-center">
                        <div>
                            <SessionApplyCardRow
                                nameProp="Customer:"
                                :value="apply.customer.username"
                            ></SessionApplyCardRow>
                            <p class="text-indigo-200"></p>
                            <SessionApplyCardRow
                                nameProp="Game:"
                                :gameImg="apply.game.image"
                                :value="apply.game.name"
                            />
                            <SessionApplyCardRow
                                nameProp="Status:"
                                :value="apply.status"
                            />
                            <SessionApplyCardRow
                                name-prop="Price:"
                                :value="apply.price_per_hour + '$/hour'"
                            />
                        </div>

                        <button
                            class="text-sky-400 hover:scale-105 transition-all flex gap-1 font-semibold items-center text-sm"
                            @click="emit('acceptApply', apply.id, session.id)"
                        >
                            Accept
                            <CheckMark class="h-6" />
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
