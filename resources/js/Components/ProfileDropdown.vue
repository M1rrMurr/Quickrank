<script setup>
import LogoutSvg from "./Svgs/LogoutSvg.vue";
import MailboxSvg from "./Svgs/MailboxSvg.vue";
import { useForm } from "@inertiajs/vue3";
import ProfileLink from "./Profile/ProfileLink.vue";
import ProfileDivider from "./Profile/ProfileDivider.vue";
function logout() {
    form.delete("/logout");
}
const form = useForm({});
</script>
<template>
    <div
        class="absolute right-0 w-52 mt-1 bg-gradient-to-b from-indigo-500 to-sky-500 px-1.5 py-1.5 rounded-md mr-3 space-y-3"
        ref="dropdown"
    >
        <div class="p-0.5 bg-white rounded-md">
            <ProfileLink :href="`/profile`">
                <span v-text="$page.props.auth.user.email"></span>
            </ProfileLink>
            <ProfileDivider />
            <ProfileLink href="/messages/inbox">
                <div class="flex gap-3 items-center text-sm">
                    <MailboxSvg class="h-6 text-black" />
                    <span>Inbox</span>
                </div>
            </ProfileLink>
            <ProfileDivider />
            <ProfileLink href="/dashboard"
                ><div class="flex gap-3 items-center">
                    <MailboxSvg class="h-6 text-black" />
                    <span>Dashboard</span>
                </div></ProfileLink
            >
            <ProfileDivider />
            <!-- logout -->
            <form
                class="hover:bg-gradient-to-r from-indigo-400 to-sky-400 py-1 px-3 font-semibold rounded"
                @submit.prevent="logout"
            >
                <button class="flex gap-2 text-sm items-center w-full">
                    <LogoutSvg class="text-black w-6" />Log out
                </button>
            </form>
        </div>
    </div>
</template>
