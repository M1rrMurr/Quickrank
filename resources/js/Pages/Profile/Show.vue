<script setup>
import AppLayout from "../../Layouts/AppLayout.vue";
import NavLink from "../../Components/NavLink.vue";
const props = defineProps({ user: Object });
</script>
<template>
    <AppLayout>
        <div class="mt-10">
            <h1 class="text-3xl font-bold">Profile</h1>
            <section class="my-10">
                <div v-text="user.email" />
                <div class="mt-10 space-x-3">
                    <NavLink href="/">Home</NavLink>
                    <NavLink class="border" :href="`/profile/edit`"
                        >Edit Profile</NavLink
                    >
                </div>
            </section>
        </div>
    </AppLayout>
</template>