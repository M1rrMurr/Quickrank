<script setup>
import { useForm } from "@inertiajs/vue3";
import { Link } from "@inertiajs/vue3";

import TextInput from "../../../Components/TextInput.vue";
import InputLabel from "../../../Components/InputLabel.vue";
import BasicButton from "../../../Components/BasicButton.vue";

const form = useForm({ email: "zsoli@citromail.hu", password: "" });
const login = () => form.post("/login");
</script>

<template>
    <div class="grid place-items-center min-h-screen">
        <form @submit.prevent="login">
            <div class="flex items-center justify-center">
                <img class="h-11 mt-2" src="/public/svgs/lightning.svg" />
                <span class="text-5xl font-semibold">Log In</span>
            </div>
            <div
                class="flex flex-col mt-12 border-0 border-y border-slate-200 space-y-6 py-10"
            >
                <div class="flex items-center gap-3">
                    <InputLabel class="flex-1 font-semibold" for="email"
                        >Email Address</InputLabel
                    >
                    <TextInput
                        class="placeholder:italic px-3 py-1 font-semibold"
                        type="email"
                        id="email"
                        name="email"
                        v-model="form.email"
                        placeholder="Your Email"
                    />
                </div>
                <div class="flex items-center gap-3">
                    <InputLabel class="flex-1 font-semibold" for="password"
                        >Password</InputLabel
                    >
                    <TextInput
                        class="placeholder:italic px-3 py-1 font-semibold"
                        type="password"
                        id="password"
                        name="password"
                        placeholder="Your Password"
                        v-model="form.password"
                    />
                </div>
                <div>
                    <Link
                        class="text-sm text-sky-500 font-semibold italic hover:underline"
                        href="/register"
                        >Not registered yet? Go to register page...</Link
                    >
                </div>
                <div
                    class="self-end text-sm text-red-500"
                    v-if="$page.props.errors"
                >
                    <div
                        v-for="key in $page.props.errors"
                        :key="key"
                        v-text="key"
                    ></div>
                </div>
                <div class="flex gap-3 self-end">
                    <Link
                        class="bg-violet-500/50 text-slate-100 text-sm font-semibold hover:bg-violet-500/80 px-3 py-1 inline-block"
                        href="/"
                        >Cancel</Link
                    >
                    <BasicButton>Log in</BasicButton>
                </div>
            </div>
        </form>
    </div>
</template>
