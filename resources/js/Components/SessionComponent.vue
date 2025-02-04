<script setup>
import SessionTimestamp from "./SessionTimestamp.vue";
import TextInput from "./TextInput.vue";
import InputLabel from "./InputLabel.vue";

import { ref, onMounted, onUnmounted, computed } from "vue";
import { useForm, usePage } from "@inertiajs/vue3";

const props = defineProps({ session: Object, games: Object });
const trigger = ref(null);
const sessionDropdown = ref(null);
const showDetails = ref(false);
const page = usePage();
const selectedGameName = ref(null);
const selectedGame = computed(
    () =>
        props.games.find((game) => game.name === selectedGameName.value) || {},
);

const form = useForm({
    user_id: page.props.auth?.user.id,
    game_id: computed(() => selectedGame.value?.id || null),
});

function submitForm() {
    form.post("/sessions/apply");
}

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
            <form class="px-5 py-2" @submit.prevent="submitForm">
                <div class="flex items-center gap-3">
                    <InputLabel>Comment</InputLabel>
                    <TextInput />
                </div>
                <div class="flex items-center gap-3">
                    <InputLabel>Select a Game</InputLabel>
                    <select v-model="selectedGameName">
                        <option
                            v-for="game in games"
                            :key="game.id"
                            v-text="game.name"
                        />
                    </select>
                </div>
                <button>zsa</button>
            </form>
            <!-- show price and game name -->
            <div class="flex">
                <div>Session Name:</div>
                <div v-text="selectedGameName"></div>
            </div>
            <div class="flex">
                <div>Price:</div>
                <div v-text="selectedGame.pivot?.price_per_hour" />
            </div>
        </div>
    </div>
</template>
