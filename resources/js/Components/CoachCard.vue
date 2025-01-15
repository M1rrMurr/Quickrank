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
        class="relative w-60 rounded-md bg-secondary"
        :class="{ 'z-10': showInput, 'rounded-none': showInput }"
    >
        <img class="size-60" :src="coach.avatar" />
        <div class="mt-3 mx-2 space-y-2">
            <div
                class="text-lg text-white font-semibold"
                v-text="coach.username"
            />
            <div class="text-sm text-white">
                drága jo istenem... azzal semi bajjom hogy mekkora.. de miért
                kell enyire lealázni magát???... miért kell ijenek liveoznia...
            </div>
            <div class="flex gap-3 pb-5">
                <BasicButton class="text-xs" @click="showInput = !showInput"
                    >Send Message</BasicButton
                >
                <BasicButton class="text-xs">View Profile</BasicButton>
            </div>
        </div>
        <Transition
            enter-active-class="transition ease-in duration-150"
            enter-from-class="opacity-0 -translate-y-4"
            enter-to-class="opacity-100 translate-y-0"
        >
            <form
                class="absolute bg-secondary w-full pt-4 pb-3"
                v-if="showInput"
                action=""
            >
                <TextInput class="w-full" placeholder="Send message..." />
            </form>
        </Transition>
    </div>
</template>
