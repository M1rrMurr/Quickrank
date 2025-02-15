<script setup>
import { ref, computed } from "vue";
import { useForm } from "@inertiajs/vue3";

import SessionTimestamp from "./SessionTimestamp.vue";

const props = defineProps({ session: Object });

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

// accepting session apply

const form = useForm({ status: null, id: null });
function submitForm(id) {
    form.id = id;
    form.status = "accepted";
    form.patch("/dashboard", {
        preserveScroll: true,
    });
}
</script>

<template>
    <div
        class="px-3 py-1 border border-slate-200 shadow-md rounded w-full bg-sky-50"
    >
        <div class="flex gap-1 items-center">
            <div v-text="new Date(session.start).toDateString()"></div>
            <SessionTimestamp :date="session.start" />
            <span>&dash;</span>
            <SessionTimestamp :date="session.end" />
        </div>
        <div
            class="cursor-pointer w-fit px-3 py-1 text-transparent bg-gradient-to-tr from-sky-500 to-red-500 font-semibold bg-clip-text"
            @click="toggleApplies"
        >
            Applies <span>&DownArrow;</span>
            <span v-if="applyCounter" v-text="applyCounter" />
        </div>
        <!-- applies -->
        <div
            ref="applyContainer"
            :class="{
                'max-h-0 ': !showApplies,
                'max-h-[200px] ': showApplies,
            }"
            class="transition-all duration-300 overflow-hidden"
            style="scrollbar-gutter: stable"
        >
            <div
                class="w-1/2 bg-gradient-to-br from-sky-100 to-emerald-100 shadow-md px-3 py-1 rounded mb-1"
                v-for="apply in applies"
            >
                <div class="flex justify-between items-center">
                    <div>
                        <div class="flex gap-2">
                            <div class="font-semibold text-slate-500">
                                Customer:
                            </div>
                            <div v-text="apply.customer.username"></div>
                        </div>
                        <div class="flex gap-2">
                            <div class="font-semibold text-slate-500">
                                Game:
                            </div>
                            <div v-text="apply.game.name"></div>
                        </div>
                        <div class="flex gap-2">
                            <div class="font-semibold text-slate-500">
                                Status:
                            </div>
                            <div v-text="apply.status"></div>
                        </div>
                    </div>
                    <div class="space-x-3">
                        <button @click="submitForm(apply.id)">Apply</button>
                        <button>Reject</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
