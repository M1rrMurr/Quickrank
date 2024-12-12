<script setup>
import { Link } from "@inertiajs/vue3";
import { useForm, usePage } from "@inertiajs/vue3";
import TextInput from "../../../Components/TextInput.vue";

const form = useForm({
    email: "zsoli@citromail.hu",
    password: "",
    password_confirmation: "",
    name: "",
});

const submitForm = () => form.post("/register");
</script>
<template>
    <div class="grid place-items-center min-h-screen">
        <form @submit.prevent="submitForm" class="min-w-96">
            <div class="flex items-center justify-center">
                <img class="h-11 mt-2" src="/public/svgs/lightning.svg" />
                <span class="text-5xl font-semibold">Register</span>
            </div>
            <div
                class="space-y-6 flex flex-col mt-12 py-10 border-0 border-y border-secondary"
            >
                <div
                    class="self-end text-red-500"
                    v-if="$page.props.errors.email"
                    v-text="$page.props.errors.email"
                ></div>
                <div class="flex gap-3 items-center">
                    <label class="flex-1 text-lg" for="email">Email</label>
                    <input
                        class="w-auto text-primary font-semibold py-1 px-3 placeholder:italic"
                        type="email"
                        name="email"
                        id="email"
                        placeholder="Email Address"
                        v-model="form.email"
                    />
                </div>
                <div class="flex gap-3 items-center">
                    <label class="flex-1 text-lg" for="name">Username</label>
                    <TextInput
                        class="w-auto text-primary font-semibold py-1 px-3 placeholder:italic"
                        name="name"
                        id="name"
                        placeholder="Username"
                        v-model="form.name"
                    />
                </div>
                <div
                    class="self-end text-red-500"
                    v-if="$page.props.errors.password"
                    v-text="$page.props.errors.password"
                ></div>
                <div class="flex gap-3 items-center">
                    <label class="flex-1" for="password">Password</label>
                    <input
                        class="w-auto text-primary font-semibold py-1 px-3 placeholder:italic"
                        type="password"
                        name="password"
                        id="password"
                        placeholder="Password"
                        v-model="form.password"
                    />
                </div>
                <div class="flex gap-3 items-center">
                    <label class="flex-1" for="password_confirmation"
                        >Confirm Your Password</label
                    >
                    <input
                        class="w-auto text-primary font-semibold py-1 px-3 placeholder:italic"
                        type="password"
                        name="password_confirmation"
                        id="password_confirmation"
                        placeholder="Password"
                        v-model="form.password_confirmation"
                    />
                </div>
                <div>
                    <Link
                        class="text-sm text-blueberry font-semibold italic hover:underline"
                        href="/login"
                        >Already have account? Visit the login page...</Link
                    >
                </div>
                <div class="self-end space-x-3">
                    <Link
                        class="bg-secondary/50 hover:bg-secondary/80 px-3 py-1 font-medium inline-block"
                        href="/"
                    >
                        Home
                    </Link>
                    <button
                        class="bg-secondary/50 hover:bg-secondary/80 px-3 py-1 font-medium border border-white"
                    >
                        Register
                    </button>
                </div>
            </div>
        </form>
    </div>
</template>