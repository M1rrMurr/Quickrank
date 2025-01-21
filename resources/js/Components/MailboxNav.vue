<script setup>
import { Link } from "@inertiajs/vue3";
import MailNavButton from "./MailNavButton.vue";
</script>
<template>
    <div
        class="space-y-3 bg-gradient-to-b from-indigo-500 to-sky-500 px-3 py-3 pr-5 rounded"
    >
        <MailNavButton
            href="/messages/inbox"
            component="Message/InboxIndex"
            icon="/svgs/mailbox.svg"
            >Inbox</MailNavButton
        >
        <MailNavButton
            href="/messages/sent"
            icon="/svgs/mail-forward.svg"
            component="Message/SentIndex"
            >Sent</MailNavButton
        >
        <div class="">
            <Link href="/messages/create" class="font-semibold"
                >New Message</Link
            >
        </div>
    </div>
</template>
