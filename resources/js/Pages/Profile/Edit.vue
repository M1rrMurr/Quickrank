<script setup>
import AppLayout from "../../Layouts/AppLayout.vue";
import { useForm } from "@inertiajs/vue3";
import { Link } from "@inertiajs/vue3";
const props = defineProps({ user: Object });
const form = useForm({
    email: props.user.email,
    password: "",
    password_confirmation: "",
});
const submitForm = () => form.patch("/profile/update");
</script>
<template>
    <AppLayout>
        <h1 class="text-3xl font-bold">Edit profile</h1>
        <form @submit.prevent="submitForm" class="max-w-96">
            <div class="space-y-6 flex flex-col mt-12 py-10">
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

                <div class="self-end space-x-3">
                    <Link
                        class="bg-secondary/50 hover:bg-secondary/80 px-3 py-1 font-medium inline-block"
                        href="/"
                    >
                        Cancel
                    </Link>
                    <button
                        class="bg-secondary/50 hover:bg-secondary/80 px-3 py-1 font-medium border border-white"
                    >
                        Register
                    </button>
                </div>
            </div>
        </form>
    </AppLayout>
</template>