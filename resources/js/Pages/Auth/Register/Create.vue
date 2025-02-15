<script setup>
import { Link } from "@inertiajs/vue3";
import { useForm, usePage } from "@inertiajs/vue3";
import TextInput from "../../../Components/TextInput.vue";
import InputLabel from "../../../Components/InputLabel.vue";
import BasicButton from "../../../Components/BasicButton.vue";

const form = useForm({
    email: "zsoli@citromail.hu",
    password: "",
    password_confirmation: "",
    username: "",
});

const submitForm = () => form.post("/register");
</script>
<template>
    <div class="grid place-items-center min-h-screen">
        <form @submit.prevent="submitForm" class="min-w-96">
            <div class="flex items-center justify-center">
                <img class="h-11 mt-2" src="/public/svgs/lightning.svg" />
                <div class="text-5xl font-bold">Register</div>
            </div>
            <div
                class="space-y-6 flex flex-col mt-12 py-10 border-0 border-y border-slate-200"
            >
                <div
                    class="self-end text-red-500"
                    v-if="$page.props.errors.email"
                    v-text="$page.props.errors.email"
                ></div>
                <div class="flex gap-3 items-center">
                    <InputLabel class="flex-1 text-lg" for="email"
                        >Email</InputLabel
                    >
                    <TextInput
                        type="email"
                        name="email"
                        id="email"
                        placeholder="Email Address"
                        v-model="form.email"
                    />
                </div>
                <div class="flex gap-3 items-center">
                    <InputLabel class="flex-1 text-lg" for="username"
                        >Username</InputLabel
                    >
                    <TextInput
                        name="username"
                        id="username"
                        placeholder="Username"
                        v-model="form.username"
                    />
                </div>
                <div
                    class="self-end text-red-500"
                    v-if="$page.props.errors.password"
                    v-text="$page.props.errors.password"
                ></div>
                <div class="flex gap-3 items-center">
                    <InputLabel class="flex-1" for="password"
                        >Password</InputLabel
                    >
                    <TextInput
                        type="password"
                        name="password"
                        id="password"
                        placeholder="Password"
                        v-model="form.password"
                    />
                </div>
                <div class="flex gap-3 items-center">
                    <InputLabel class="flex-1" for="password_confirmation"
                        >Confirm Your Password</InputLabel
                    >
                    <TextInput
                        type="password"
                        name="password_confirmation"
                        id="password_confirmation"
                        placeholder="Password"
                        v-model="form.password_confirmation"
                    />
                </div>
                <div>
                    <Link
                        class="text-sm text-sky-500 font-semibold italic hover:underline"
                        href="/login"
                        >Already have account? Go to login page...</Link
                    >
                </div>
                <div class="flex gap-3 self-end">
                    <Link
                        class="bg-violet-500/50 hover:bg-violet-500/80 px-3 py-1 font-medium inline-block"
                        href="/"
                    >
                        Home
                    </Link>
                    <BasicButton>Register</BasicButton>
                </div>
            </div>
        </form>
    </div>
</template>
