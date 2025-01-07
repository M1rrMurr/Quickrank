<script setup>
import { Link } from "@inertiajs/vue3";
const props = defineProps({
    message: Object,
    type: String,
});

const name = {
    sent: props.message.receiver?.name,
    received: props.message.sender?.name,
};
const date = new Date(props.message.created_at);
const formattedDate = date.toLocaleString("en-US");
</script>
<template>
    <Link
        href="#"
        class="border-b block w-full border-secondary p-1 hover:border-textColor"
    >
        <div class="">
            <div class="flex items-end py-1">
                <div
                    class="text-lg font-semibold leading-none"
                    v-text="name[type]"
                ></div>
                <div
                    class="flex-1 text-sm font-semibold pl-6 leading-none"
                    v-text="message.subject"
                ></div>
                <div class="text-sm leading-none" v-text="formattedDate"></div>
            </div>
        </div>
        <div
            class="ml-3 text-white"
            v-text="message.message.slice(0, 150) + ' ...'"
        ></div>
    </Link>
</template>
