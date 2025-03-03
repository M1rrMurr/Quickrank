<script setup>
const props = defineProps({});
</script>

<template>
    <button class="group flex text-sm font-semibold items-center">
        <div class="overflow-hidden">
            <div
                class="-translate-x-full group-hover:translate-x-0 duration-300 transition-all"
            >
                <slot />
            </div>
        </div>

        <slot name="icon"></slot>
    </button>
</template>
