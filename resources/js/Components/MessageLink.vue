<script setup>
import { Link } from "@inertiajs/vue3";
const props = defineProps({
    message: Object,
    type: String,
});
const prefix = {
    sent: "To",
    received: "From",
};

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
        <div class="flex gap-2">
            <span v-text="prefix[type]" />
            <span class="text-lg flex-1 font-semibold" v-text="name[type]" />
            <div v-text="formattedDate" />
        </div>
        <div
            class="ml-3 text-white"
            v-text="message.message.slice(0, 150) + ' ...'"
        />
    </Link>
</template>