<script setup>
import { Link } from "@inertiajs/vue3";
const props = defineProps({ component: String, icon: String });
</script>
<template>
    <Link
        :class="{
            'bg-sky-400': $page.component === component,
        }"
        class="group block pl-2 pr-12 py-1 rounded bg-indigo-300 border-slate-300 shadow-md hover:bg-sky-400 transition-all"
    >
        <div
            :class="{
                'translate-x-5': $page.component === component,
            }"
            class="font-semibold flex gap-1 transition-all group-hover:translate-x-5"
        >
            <img :src="icon" alt="mail" />Inbox
        </div>
    </Link>
</template>
