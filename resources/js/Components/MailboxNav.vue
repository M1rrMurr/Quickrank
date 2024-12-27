<script setup>
import { Link } from "@inertiajs/vue3";
</script>
<template>
    <div
        class="space-y-3 bg-gradient-to-b from-secondary to -primary px-3 py-3 pr-5 rounded"
    >
        <Link
            :class="{ 'bg-primary': $page.component === 'Message/InboxIndex' }"
            class="group block pl-2 pr-12 py-1 rounded hover:bg-primary transition-all"
            href="/messages/inbox"
        >
            <div
                :class="{
                    'translate-x-5': $page.component === 'Message/InboxIndex',
                }"
                class="flex gap-1 transition-all group-hover:translate-x-5"
            >
                <img src="/public/svgs/mail-opened.svg" alt="mail" />Inbox
            </div>
        </Link>
        <Link
            :class="{ 'bg-primary': $page.component === 'Message/SentIndex' }"
            class="block group pl-2 pr-12 py-1 rounded hover:bg-primary transition-all"
            href="/messages/sent"
        >
            <div
                :class="{
                    'translate-x-5': $page.component === 'Message/SentIndex',
                }"
                class="flex gap-1 group-hover:translate-x-5 transition-all"
            >
                <img src="/public/svgs/mail.svg" alt="mail" />Sent
            </div>
        </Link>
        <div class="">
            <Link href="/messages/create" class="font-semibold"
                >New Message</Link
            >
        </div>
    </div>
</template>