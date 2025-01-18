<script setup>
import { Link, useForm } from "@inertiajs/vue3";
function logout() {
    form.delete("/logout");
}
const form = useForm({});
</script>
<template>
    <div
        class="absolute right-0 w-52 mt-1 bg-gradient-to-b from-indigo-500 to-sky-500 px-2 py-2 rounded-md mr-3 space-y-3"
        ref="dropdown"
    >
        <Link
            class="hover:bg-sky-500 py-1 px-3 font-semibold rounded block"
            :href="`/profile`"
        >
            <span v-text="$page.props.auth.user.email"></span>
        </Link>

        <!-- logout -->
        <form
            class="hover:bg-sky-500 py-1 px-3 font-semibold rounded"
            @submit.prevent="logout"
        >
            <button class="flex gap-2">
                <img src="/public/svgs/logout.svg" alt="logout" />Logout
            </button>
        </form>
        <Link
            class="hover:bg-sky-500 py-1 px-3 font-semibold rounded block"
            :href="`/messages/inbox`"
        >
            <div class="flex gap-3">
                <img src="/public/svgs/mailbox.svg" alt="" />
                <span>Inbox</span>
            </div>
        </Link>
    </div>
</template>
