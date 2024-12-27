<script setup>
import MailboxNav from "../Components/MailboxNav.vue";
import HorizontalDivider from "../Components/HorizontalDivider.vue";
</script>
<template>
    <div class="flex">
        <MailboxNav />
        <HorizontalDivider />
        <div class="w-full">
            <slot />
        </div>
    </div>
</template>