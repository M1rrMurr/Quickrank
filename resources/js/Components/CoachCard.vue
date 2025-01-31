<script setup>
const props = defineProps({ coach: Object });
import BasicButton from "./BasicButton.vue";
import { Link } from "@inertiajs/vue3";
import TextInput from "./TextInput.vue";
import { useForm } from "@inertiajs/vue3";
const flags = { hu: "🇭🇺", en: "🇬🇧", ro: "🇷🇴", ru: "🇷🇺" };
import { ref } from "vue";
const showInput = ref(false);
</script>
<template>
    <div
        class="relative w-52 rounded-md rounded-t-md shadow-md shadow-sky-500"
        :class="{ 'z-10': showInput, 'rounded-none': showInput }"
    >
        <div class="relative overflow-hidden h-32">
            <img class="rounded-t-md" :src="coach.avatar" />
        </div>
        <div
            class="space-y-2 bg-gradient-to-b from-slate-500 px-1 from-10% to-sky-500 to-90%"
        >
            <div class="text-white font-semibold" v-text="coach.username" />
            <div class="flex gap-3 items-center">
                <div
                    v-for="language in coach.coach.languages"
                    :key="language.id"
                    v-text="flags[language.iso_code]"
                ></div>
            </div>
            <div
                class="text-sm text-white min-h-20 font-semibold"
                v-text="coach.coach.description"
            ></div>
            <div class="flex gap-3 pb-5 ml-3">
                <BasicButton
                    @click="showInput = !showInput"
                    class="bg-indigo-500"
                    >Message</BasicButton
                >
                <Link
                    class="text-sm font-semibold flex text-slate-500 items-center justify-center py-1 px-3 bg-sky-300 hover:text-slate-200"
                    :href="`/coaches/${coach.coach.id}`"
                    >Profile</Link
                >
            </div>
        </div>
        <Transition
            enter-active-class="transition ease-in duration-150"
            enter-from-class="opacity-0 -translate-y-4"
            enter-to-class="opacity-100 translate-y-0"
            leave-active-class="transition ease-in duration-150"
            leave-from-class="opacity-100 translate-y-0"
            leave-to-class="opacity-0 -tranlate-y-4"
        >
            <form
                class="absolute bg-sky-500 px-2 pt-4 pb-3 shadow-md shadow-sky-500"
                v-if="showInput"
                action=""
            >
                <TextInput class="w-full" placeholder="Send message..." />
            </form>
        </Transition>
    </div>
</template>
