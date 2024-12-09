<script setup>
import { onMounted, onUnmounted, ref } from "vue";

const emit = defineEmits(["closeWindow"]);

const props = defineProps({
    showButton: Object,
    show: Boolean,
});

const dropdown = ref(null);

const handleOutsideClick = (e, window, opener) => {
    if (
        e.target !== opener &&
        window.value &&
        !window.value.contains(e.target)
    ) {
        emit("closeWindow");
    }
};

onMounted(() => {
    document.addEventListener("click", (e) =>
        handleOutsideClick(e, dropdown, props.showButton)
    );
});

onUnmounted(() => {
    document.removeEventListener("click", handleOutsideClick);
});
</script>
<template>
    <div v-if="show" ref="dropdown">
        <slot />
    </div>
</template>