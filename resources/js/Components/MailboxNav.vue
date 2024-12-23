<script setup>
import { Link } from "@inertiajs/vue3";
</script>
<template>
    <div class="space-y-3">
        <Link class="flex gap-2" href="/messages/inbox"
            ><img src="/public/svgs/mail-opened.svg" alt="mail" />Inbox</Link
        >
        <Link class="flex gap-2" href="/messages/sent"
            ><img src="/public/svgs/mail.svg" alt="mail" />Sent</Link
        >
        <div class="">
            <Link href="/messages/create" class="font-semibold"
                >+ New Message</Link
            >
        </div>
    </div>
</template>