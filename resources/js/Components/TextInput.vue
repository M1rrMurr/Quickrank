<script setup>
defineProps({ type: { type: String, default: "text" }, modelValue: String });
const emit = defineEmits(["update:modelValue"]);
</script>
<template>
    <input
        class="w-auto text-primary font-semibold py-1 px-3 placeholder:italic"
        :type="type"
        :value="modelValue"
        @input="emit('update:modelValue', $event.target.value)"
    />
</template>