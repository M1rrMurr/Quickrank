<script setup>
import { ref, computed } from "vue";
import CalendarColumn from "../Components/CalendarColumn.vue";
import axios from "axios";
import SessionContainer from "./SessionContainer.vue";

import { getDays } from "../composables/useCalendarDates";

const props = defineProps({ coachId: Number, games: Object });
const today = ref(new Date());
const month = computed(() =>
    today.value.toLocaleString("en-Gb", { month: "long" }),
);
const year = computed(() =>
    today.value.toLocaleString("en-Gb", { year: "numeric" }),
);

function nextMonth() {
    today.value = new Date(today.value.setMonth(today.value.getMonth() + 1));
    sessions.value = [];
}
function prevMonth() {
    today.value = new Date(today.value.setMonth(today.value.getMonth() - 1));
}
const days = computed(() =>
    getDays(today.value.getFullYear(), today.value.getMonth()),
);

// weekdays
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

// for the ajax request
const sessions = ref([]);
const sessionsDate = ref(null);
function fetchSessions(date) {
    sessionsDate.value = date.toDateString();
    axios
        .get("/sessions", {
            params: {
                coachId: props.coachId,
                date: date.toLocaleDateString("en-CA"),
            },
        })
        .then((response) => {
            sessions.value = response.data;
        });
}
</script>
<template>
    <div class="bg-slate-200 h-96 w-2/3">
        <div
            class="w-fit mx-1 bg-slate-300 px-1 my-1 py-2 shadow-md shadow-slate-500"
        >
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
                <CalendarColumn
                    @click-date="(date) => fetchSessions(date)"
                    day="Mon"
                    :days="mondays"
                    :month="month"
                />
                <CalendarColumn
                    @click-date="(date) => fetchSessions(date)"
                    day="Tue"
                    :days="tuesdays"
                    :month="month"
                />
                <CalendarColumn
                    @click-date="(date) => fetchSessions(date)"
                    day="Wed"
                    :days="wednesdays"
                    :month="month"
                />
                <CalendarColumn
                    @click-date="(date) => fetchSessions(date)"
                    day="Thu"
                    :days="thursdays"
                    :month="month"
                />
                <CalendarColumn
                    @click-date="(date) => fetchSessions(date)"
                    day="Fri"
                    :days="fridays"
                    :month="month"
                />
                <CalendarColumn
                    @click-date="(date) => fetchSessions(date)"
                    day="Sat"
                    :days="saturdays"
                    :month="month"
                />
                <CalendarColumn
                    @click-date="(date) => fetchSessions(date)"
                    day="Sun"
                    :days="sundays"
                    :month="month"
                />
            </div>
        </div>
        <SessionContainer
            :sessions="sessions"
            :sessionsDate="sessionsDate"
            :games="games"
        />
    </div>
</template>
