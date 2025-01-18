<script setup>
import MailboxNav from "../Components/MailboxNav.vue";
import HorizontalDivider from "../Components/HorizontalDivider.vue";
</script>
<template>
    <div class="flex">
        <MailboxNav />
        <HorizontalDivider />
        <div class="w-full">
            <h1 class="text-2xl font-semibold text-slate-800 mb-6">Messages</h1>
            <slot />
        </div>
    </div>
</template>
