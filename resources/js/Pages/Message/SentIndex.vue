<script setup>
import MailboxNav from "../../Components/MailboxNav.vue";
import AppLayout from "../../Layouts/AppLayout.vue";
import HorizontalDivider from "../../Components/HorizontalDivider.vue";
import MessagePaginatorLink from "../../Components/MessagePaginatorLink.vue";
import MessageLink from "../../Components/MessageLink.vue";
const props = defineProps({ messages: Object });
</script>
<template>
    <AppLayout>
        <div class="flex">
            <MailboxNav />
            <HorizontalDivider />
            <div class="space-y-1">
                <div class="text-3xl font-bold">Sent Messages</div>
                <MessageLink
                    v-for="message in messages.data"
                    :key="message.id"
                    :message="message"
                    type="sent"
                ></MessageLink>
                <div class="flex gap-3">
                    <MessagePaginatorLink
                        v-for="(link, i) in messages.links"
                        :key="i"
                        :link="link"
                    />
                </div>
            </div>
        </div>
    </AppLayout>
</template>