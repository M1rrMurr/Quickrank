<script setup>
import AppLayout from "../../Layouts/AppLayout.vue";
import HorizontalDivider from "../../Components/HorizontalDivider.vue";
import MailboxNav from "../../Components/MailboxNav.vue";
import MessageLink from "../../Components/MessageLink.vue";
const props = defineProps({ messages: Object });
</script>
<template>
    <AppLayout>
        <div class="flex">
            <MailboxNav />
            <HorizontalDivider />
            <div class="">
                <div class="font-bold text-3xl">Messages</div>
                <MessageLink
                    v-for="message in messages"
                    :key="message.id"
                    :message="message"
                    type="received"
                />
            </div>
        </div>
    </AppLayout>
</template>