<script setup>
defineProps({ type: { type: String, default: "text" }, modelValue: String });
const emit = defineEmits(["update:modelValue"]);
</script>
<template>
    <input
        class="block w-fit text-black font-semibold py-1 px-3 placeholder:italic placeholder:text-primary/50"
        :type="type"
        :value="modelValue"
        @input="emit('update:modelValue', $event.target.value)"
    />
</template>
