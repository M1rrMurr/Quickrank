<script setup>
import AppLayout from "../../Layouts/AppLayout.vue";
import MessagesLayout from "../../Layouts/MessagesLayout.vue";
import MessageParticipant from "../../Components/MessageParticipant.vue";
const props = defineProps({ message: Object });
</script>
<template>
    <AppLayout>
        <MessagesLayout>
            <div>
                <span class="font-semibold">From: </span>
                <MessageParticipant :displayName="message.sender.username" />
            </div>
            <div>
                <span class="font-semibold">To: </span>
                <MessageParticipant :displayName="message.receiver.username" />
            </div>
            <div class="font-medium" v-text="message.message"></div>
        </MessagesLayout>
    </AppLayout>
</template>
