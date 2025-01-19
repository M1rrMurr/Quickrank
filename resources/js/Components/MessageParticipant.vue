<script setup>
const props = defineProps({ displayName: String });
console.log(props.displayName);
</script>
<template>
    <span
        class="text-sky-500 font-semibold text-sm"
        v-text="
            displayName === $page.props.auth.user.username ? 'Me' : displayName
        "
    ></span>
</template>
