<script setup>
const props = defineProps({ displayName: String });
console.log(props.displayName);
</script>
<template>
    <span
        class="text-white font-semibold text-sm"
        v-text="
            displayName === $page.props.auth.user.username ? 'Me' : displayName
        "
    ></span>
</template>