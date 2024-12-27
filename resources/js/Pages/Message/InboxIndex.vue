<script setup>
import { computed, onMounted, onUnmounted, ref } from "vue";
import { usePage } from "@inertiajs/vue3";

import MessagePaginatorLink from "../../Components/MessagePaginatorLink.vue";
import AppLayout from "../../Layouts/AppLayout.vue";
import MessageLink from "../../Components/MessageLink.vue";
import MessagesLayout from "../../Layouts/MessagesLayout.vue";

const props = defineProps({ messages: Object });

const messagesToShow = ref(props.messages.data);

const page = usePage();
const userId = computed(() => page.props.auth.user.id);

function listenForMessages() {
    window.Echo.private(`App.Models.User.${userId.value}`).listen(
        "MessageSent",
        (event) => {
            console.log("New message received:", event);
            messagesToShow.value.unshift(event.message);
        }
    );
}
onMounted(() => listenForMessages());
onUnmounted(() => listenForMessages());
</script>
<template>
    <AppLayout>
        <MessagesLayout>
            <div class="w-full">
                <div class="font-bold text-3xl">Messages</div>
                <div class="min-h-[700px]">
                    <MessageLink
                        v-for="message in messagesToShow"
                        :key="message.id"
                        :message="message"
                        type="received"
                    />
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