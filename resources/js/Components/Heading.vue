<script setup>
import { computed, onMounted, ref } from "vue";
import { Link } from "@inertiajs/vue3";

import { usePage } from "@inertiajs/vue3";
import DropdownContainer from "./DropdownContainer.vue";
import NavContainer from "./NavLinkContainer.vue";
import NavLink from "./NavLink.vue";
import ProfileDropdown from "./ProfileDropdown.vue";

const showProfile = ref(false);

const profileButton = ref(null);
</script>
<template>
    <div
        class="flex justify-between items-center border-0 border-b border-secondary px-3 py-2"
    >
        <div class="flex gap-2">
            <div class="text-lg font-semibold">Menu</div>
            <input
                class="w-20 px-3 py-1 focus:w-52 duration-300 text-white bg-secondary font-semibold"
                type="text"
                placeholder="Search..."
            />
        </div>
        <Link
            class="absolute left-1/2 -translate-x-1/2 flex items-center"
            href="/"
        >
            <div class="text-xl text-white font-bold">QuickRank</div>
            <img class="h-10" src="/public/svgs/lightning.svg" />
        </Link>
        <div class="flex gap-3">
            <div class="" v-if="$page.props.auth">
                <div
                    class="flex items-center justify-center gap-2 cursor-pointer"
                    @click="showProfile = !showProfile"
                    ref="profileButton"
                >
                    <img
                        class="h-8 cursor-pointer pointer-events-none"
                        src="/public/svgs/user-circle.svg"
                    />
                    <span
                        class="font-semibold capitalize pointer-events-none"
                        v-text="$page.props.auth.user.username"
                    />
                </div>
                <!-- profile modal -->
                <DropdownContainer
                    @closeWindow="showProfile = false"
                    :showButton="profileButton"
                    :show="showProfile"
                >
                    <ProfileDropdown v-if="showProfile" />
                </DropdownContainer>
            </div>

            <div v-if="!$page.props.auth">
                <NavLink href="/login">Sign In</NavLink>
                <NavLink href="/register">Register</NavLink>
            </div>
        </div>
    </div>

    <NavContainer />
</template>
