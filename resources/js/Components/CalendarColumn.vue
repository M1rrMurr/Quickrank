<script setup>
const props = defineProps({ day: String, month: String, days: Array });
const today = new Date();
</script>

<template>
    <div class="flex flex-col items-center w-8">
        <span class="text-slate-100 font-semibold text-sm">{{ day }}</span>
        <div
            class="font-medium py-1"
            :class="{
                'text-violet-500': day.toDateString() === today.toDateString(),
                'text-sky-500':
                    day.toLocaleString('en-Gb', { month: 'long' }) === month,
            }"
            v-for="(day, i) in days"
            :key="i"
            v-text="day.getDate()"
        />
    </div>
</template>
