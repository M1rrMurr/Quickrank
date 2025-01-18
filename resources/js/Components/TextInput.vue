<script setup>
defineProps({ type: { type: String, default: "text" }, modelValue: String });
const emit = defineEmits(["update:modelValue"]);
</script>
<template>
    <input
        class="block border rounded-sm border-slate-200 w-fit font-semibold py-1 px-3 placeholder:italic placeholder:text-black/20"
        :type="type"
        :value="modelValue"
        @input="emit('update:modelValue', $event.target.value)"
    />
</template>
