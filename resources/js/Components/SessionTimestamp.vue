<script setup>
defineProps({ date: String });
</script>
<template>
    <div
        class="text-violet-300 text-sm font-semibold"
        v-text="
            new Date(date).toLocaleTimeString('en-Gb', {
                hour: '2-digit',
                minute: '2-digit',
            })
        "
    ></div>
</template>
