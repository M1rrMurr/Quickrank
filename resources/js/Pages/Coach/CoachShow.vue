<script setup>
import { ref, computed } from "vue";
import CalendarColumn from "../../Components/CalendarColumn.vue";
import AppLayout from "../../Layouts/AppLayout.vue";
const props = defineProps({ coach: Object });

const today = ref(new Date());
const month = computed(() =>
    today.value.toLocaleString("en-Gb", { month: "long" }),
);
const year = computed(() =>
    today.value.toLocaleString("en-Gb", { year: "numeric" }),
);

function nextMonth() {
    today.value = new Date(today.value.setMonth(today.value.getMonth() + 1));
}
function prevMonth() {
    today.value = new Date(today.value.setMonth(today.value.getMonth() - 1));
}
function getDays(year, month) {
    let date = new Date(year, month, 1);
    const days = [];
    while (date.getDay() > 1) {
        date.setDate(date.getDate() - 1);
        days.push(new Date(date));
    }
    if (date.getDay() === 0) {
        for (let i = 6; i > 0; i--) {
            date.setDate(date.getDate() - 1);
            days.push(new Date(date));
        }
    }
    date = new Date(year, month, 1);
    while (date.getMonth() === month) {
        days.push(new Date(date));
        date.setDate(date.getDate() + 1);
    }
    return days;
}
const days = computed(() =>
    getDays(today.value.getFullYear(), today.value.getMonth()),
);

const mondays = computed(() => days.value.filter((day) => day.getDay() === 1));
const tuesdays = computed(() => days.value.filter((day) => day.getDay() === 2));
const wednesdays = computed(() =>
    days.value.filter((day) => day.getDay() === 3),
);
const thursdays = computed(() =>
    days.value.filter((day) => day.getDay() === 4),
);
const fridays = computed(() => days.value.filter((day) => day.getDay() === 5));
const saturdays = computed(() =>
    days.value.filter((day) => day.getDay() === 6),
);
const sundays = computed(() => days.value.filter((day) => day.getDay() === 0));
</script>
<template>
    <AppLayout>
        <div class="w-fit bg-slate-300 px-1 py-2 shadow-md shadow-slate-500">
            <div class="flex">
                <div class="flex flex-1 gap-1 text-slate-500 font-semibold">
                    <div v-text="month"></div>

                    <div v-text="year"></div>
                </div>
                <div class="flex gap-2">
                    <button
                        class="px-2 text-slate-300 rounded-full bg-slate-400 hover:bg-slate-400 hover:text-slate-100 flex items-center justify-center"
                        @click="prevMonth"
                    >
                        &lt;
                    </button>
                    <button
                        class="px-2 text-slate-300 bg-slate-400 rounded-full hover:bg-slate-400 hover:text-slate-100 flex items-center justify-center"
                        @click="nextMonth"
                    >
                        &gt;
                    </button>
                </div>
            </div>
            <div class="flex">
                <CalendarColumn day="Mon" :days="mondays" :month="month" />
                <CalendarColumn day="Tue" :days="tuesdays" :month="month" />
                <CalendarColumn day="Wed" :days="wednesdays" :month="month" />
                <CalendarColumn day="Thu" :days="thursdays" :month="month" />
                <CalendarColumn day="Fri" :days="fridays" :month="month" />
                <CalendarColumn day="Sat" :days="saturdays" :month="month" />
                <CalendarColumn day="Sun" :days="sundays" :month="month" />
            </div>
        </div>
    </AppLayout>
</template>
