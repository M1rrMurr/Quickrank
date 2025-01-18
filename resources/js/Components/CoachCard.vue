<script setup>
const props = defineProps({ coach: Object });
import BasicButton from "./BasicButton.vue";
import TextInput from "./TextInput.vue";
import { useForm } from "@inertiajs/vue3";
import { ref } from "vue";
const showInput = ref(false);
</script>
<template>
    <div
        class="relative w-60 rounded-md rounded-t-md"
        :class="{ 'z-10': showInput, 'rounded-none': showInput }"
    >
        <img class="size-60 rounded-t-md" :src="coach.avatar" />
        <div
            class="space-y-2 bg-gradient-to-b from-indigo-500 px-1 from-10% to-sky-500 to-90%"
        >
            <div
                class="text-lg text-white font-semibold"
                v-text="coach.username"
            />
            <div
                class="text-sm text-white min-h-20"
                v-text="coach.coach.description"
            ></div>
            <div class="flex gap-3 pb-5 ml-3">
                <BasicButton
                    @click="showInput = !showInput"
                    class="bg-indigo-500"
                    >Message</BasicButton
                >
                <BasicButton class="text-2xl">Profile</BasicButton>
            </div>
        </div>
        <Transition
            enter-active-class="transition ease-in duration-150"
            enter-from-class="opacity-0 -translate-y-4"
            enter-to-class="opacity-100 translate-y-0"
        >
            <form
                class="absolute bg-sky-500 w-full pt-4 pb-3"
                v-if="showInput"
                action=""
            >
                <TextInput class="w-full" placeholder="Send message..." />
            </form>
        </Transition>
    </div>
</template>
