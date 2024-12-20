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
</script>
<template>
    <Link href="#" class="border-y block border-primary p-1 hover:border-white">
        <div class="space-x-2">
            <span v-text="prefix[type]" />
            <span class="text-lg font-semibold" v-text="name[type]" />
        </div>
        <div class="ml-3" v-text="message.message" />
    </Link>
</template>