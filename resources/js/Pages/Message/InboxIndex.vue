<script setup>
import AppLayout from "../../Layouts/AppLayout.vue";
import HorizontalDivider from "../../Components/HorizontalDivider.vue";
import MailboxNav from "../../Components/MailboxNav.vue";
import MessageLink from "../../Components/MessageLink.vue";
import { computed, onMounted, onUnmounted, ref } from "vue";
import { usePage } from "@inertiajs/vue3";

const props = defineProps({ messages: Object });
const messagesToShow = ref(props.messages);

const page = usePage();
const userId = computed(() => page.props.auth.user.id);

function listenForMessages() {
    console.log(`Subscribing to channel: App.Models.User.${userId.value}`);
    window.Echo.private(`App.Models.User.${userId.value}`).listen(
        "MessageSent",
        (event) => {
            console.log("New message received:", event);
            messagesToShow.value.push(event.message);
        }
    );
}
onMounted(() => listenForMessages());
onUnmounted(() => listenForMessages());
</script>
<template>
    <AppLayout>
        <div class="flex">
            <MailboxNav />
            <HorizontalDivider />
            <div class="">
                <div class="font-bold text-3xl">Messages</div>
                <MessageLink
                    v-for="message in messagesToShow"
                    :key="message.id"
                    :message="message"
                    type="received"
                />
            </div>
        </div>
    </AppLayout>
</template>