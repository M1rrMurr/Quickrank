<script setup>
import AppLayout from "../../Layouts/AppLayout.vue";
import MessagesLayout from "../../Layouts/MessagesLayout.vue";
import MessagePaginatorLink from "../../Components/MessagePaginatorLink.vue";
import MessageLink from "../../Components/MessageLink.vue";
const props = defineProps({ messages: Object });
</script>
<template>
    <AppLayout>
        <MessagesLayout>
            <div class="space-y-1">
                <div class="min-h-[700px]">
                    <MessageLink
                        :class="{
                            'bg-secondary/30':
                                messages.data.indexOf(message) % 2 === 0,
                        }"
                        v-for="message in messages.data"
                        :key="message.id"
                        :message="message"
                        type="sent"
                    ></MessageLink>
                </div>
                <div class="flex gap-3">
                    <MessagePaginatorLink
                        v-for="(link, i) in messages.links"
                        :key="i"
                        :link="link"
                    />
                </div>
            </div>
        </MessagesLayout>
    </AppLayout>
</template>