<script setup>
import { Link } from "@inertiajs/vue3";
import MailSvg from "./MailSvg.vue";
import OpenedMailSvg from "./OpenedMailSvg.vue";
const props = defineProps({
    message: Object,
    type: String,
});

const name = {
    sent: props.message.receiver?.username,
    received: props.message.sender?.username,
};
const date = new Date(props.message.created_at);
const formattedDate = date.toLocaleString("en-US");
</script>
<template>
    <Link
        :href="`/message/${message.id}`"
        class="border-b block w-full p-1 hover:bg-slate-300"
    >
        <div class="">
            <div class="flex items-end py-1">
                <div
                    class="text-lg font-semibold leading-none"
                    v-text="name[type]"
                ></div>
                <div class="mx-3 text-lg font-semibold leading-none">-</div>
                <div
                    class="flex-1 text-sm font-semibold leading-none"
                    v-text="message.subject"
                ></div>
                <div
                    class="text-sm font-semibold leading-none"
                    v-text="formattedDate"
                ></div>
            </div>
        </div>
        <div class="ml-3 flex gap-3">
            <OpenedMailSvg
                v-if="message.is_opened"
                class="text-indigo-500 h-6"
            />
            <MailSvg v-if="!message.is_opened" class="text-indigo-500 h-6" />
            <div
                class="text-sky-500"
                v-text="message.message.slice(0, 150) + ' ...'"
            ></div>
        </div>
    </Link>
</template>
