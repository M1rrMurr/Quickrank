<script setup>
const props = defineProps({ day: String, month: String, days: Array });
const today = new Date();
const emit = defineEmits(["clickDate"]);
function sendDate(date) {
    emit("clickDate", date);
}
</script>

<template>
    <div class="flex flex-col items-center w-8">
        <span class="text-slate-100 font-semibold text-sm">{{ day }}</span>
        <div
            class="font-medium py-1 cursor-pointer border-b-2 border-slate-300 hover:border-violet-500"
            @click="sendDate(day)"
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
