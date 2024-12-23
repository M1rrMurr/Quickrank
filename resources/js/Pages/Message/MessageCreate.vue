<script setup>
import AppLayout from "../../Layouts/AppLayout.vue";
import { useForm } from "@inertiajs/vue3";
const form = useForm({ message: "", receiver_id: null });
const submit = () => form.post("/messages/store");
</script>
<template>
    <AppLayout
        >create Messageform
        <form @submit.prevent="submit">
            <input class="text-primary" v-model="form.message" type="text" />
            <input
                class="text-primary"
                v-model="form.receiver_id"
                type="text"
            />
            <button>submit</button>
        </form></AppLayout
    >
</template>