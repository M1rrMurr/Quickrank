<script setup>
import { useForm } from "@inertiajs/vue3";
import MessagesLayout from "../../Layouts/MessagesLayout.vue";
import AppLayout from "../../Layouts/AppLayout.vue";
import TextInput from "../../Components/TextInput.vue";
import BasicButton from "../../Components/BasicButton.vue";
const form = useForm({ message: "", subject: "", email: "" });
const submit = () => form.post("/messages/store");
</script>
<template>
    <AppLayout>
        <MessagesLayout>
            <div class="text-3xl font-semibold">New Message</div>
            <form class="w-[700px] flex flex-col" @submit.prevent="submit">
                <label class="font-semibold" for="email">To:</label>
                <TextInput
                    class="bg-bg"
                    v-model="form.email"
                    type="email"
                    id="email"
                    name="email"
                    placeholder="receiver email"
                />
                <label class="font-semibold" for="subject">Subject</label>
                <TextInput
                    class="bg-bg"
                    v-model="form.subject"
                    type="text"
                    id="subject"
                    name="subject"
                    placeholder="title"
                />
                <label class="font-semibold" for="message">Message</label>
                <textarea
                    class="h-36 w-full block bg-bg text-black font-semibold py-1 px-3 placeholder:italic placeholder:text-primary/50"
                    v-model="form.message"
                    type="text"
                    id="message"
                    name="message"
                    placeholder="text..."
                />
                <div class="self-end pt-3">
                    <BasicButton> Send </BasicButton>
                </div>
                <div
                    v-for="(error, i) in $page.props.errors"
                    :key="i"
                    v-text="error"
                    class="text-red-500 text-sm"
                ></div>
            </form>
        </MessagesLayout>
    </AppLayout>
</template>