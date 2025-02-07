<script setup>
import { usePage, useForm } from "@inertiajs/vue3";
import { computed, ref, onMounted } from "vue";
import TextInput from "./TextInput.vue";
import InputLabel from "./InputLabel.vue";

const emit = defineEmits(["closeApply"]);
const props = defineProps({ games: Object, sessionId: Number });
const page = usePage();
const selectedGameName = ref(null);

const selectedGame = computed(
    () =>
        props.games.find((game) => game.name === selectedGameName.value) || {},
);

const form = useForm({
    user_id: page.props.auth?.user.id,
    game_id: computed(() => selectedGame.value?.id || null),
    coaching_session_id: props.sessionId,
});

function submitForm() {
    form.post("/sessions/apply", {
        onSuccess: () => emit("closeApply"),
        onError: (err) => console.error(err),
    });
}

function closeApply() {
    emit("closeApply");
}

onMounted(() => (page.props.errors = {}));
</script>

<template>
    <div
        class="absolute mt-2 bg-gradient-to-br from-sky-100 to-emerald-100 border border-slate-200 pr-4 shadow-md cursor-default"
    >
        <form class="px-5 py-2 space-y-2" @submit.prevent="submitForm">
            <div class="flex items-center gap-3">
                <InputLabel>Select a Game</InputLabel>
                <select
                    class="bg-white border-slate-200 h-6"
                    v-model="selectedGameName"
                >
                    <option
                        v-for="game in games"
                        :key="game.id"
                        v-text="game.name"
                    />
                </select>
            </div>
            <div
                class="text-sm text-red-500"
                v-if="$page.props.errors"
                v-text="$page.props.errors.game_id"
            ></div>
            <div class="flex items-center gap-3">
                <InputLabel for="comment">Comment</InputLabel>
                <TextInput id="comment" class="h-6" />
            </div>
            <div class="flex gap-2">
                <div class="font-medium">Session Name:</div>
                <div v-text="selectedGameName"></div>
            </div>
            <div class="flex gap-2">
                <div class="font-medium">Price:</div>
                <div v-text="selectedGame.pivot?.price_per_hour"></div>
            </div>
            <div class="flex w-full justify-end gap-2">
                <button class="text-slate-600" @click="closeApply">
                    Cancel
                </button>
                <button
                    class="px-3 py-1 text-slate-100 bg-violet-400 rounded-sm"
                >
                    Apply
                </button>
            </div>
        </form>
    </div>
</template>
