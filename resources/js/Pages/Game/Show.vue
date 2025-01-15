<script setup>
import CoachCard from "../../Components/CoachCard.vue";
import AppLayout from "../../Layouts/AppLayout.vue";
import InputLabel from "../../Components/InputLabel.vue";
import TextInput from "../../Components/TextInput.vue";
import { useForm } from "@inertiajs/vue3";
const form = useForm({});
const props = defineProps({ game: Object });
</script>
<template>
    <AppLayout>
        <div class="min-h-[1600px]">
            <div class="text-3xl font-bold text-white">
                Our <span v-text="game.name"></span> Coaches
            </div>
            <img class="" :src="game.image" />
            <div class="flex gap-14 my-6">
                <form class="">
                    <InputLabel for="username">Coach Name</InputLabel>
                    <TextInput
                        placeholder="Search"
                        id="username"
                        name="username"
                        class="bg-bg"
                    ></TextInput>
                </form>
                <form class="" action="">
                    <InputLabel for="language">Language</InputLabel>
                    <Select class="block" id="language" name="language">
                        <option value="">hun</option>
                        <option value="">de</option>
                        <option value="">ru</option>
                    </Select>
                </form>
            </div>
            <div class="border-0 border-b border-secondary"></div>
            <div>
                <div class="text-xl">Coaches</div>
                <div class="flex gap-4 flex-wrap">
                    <CoachCard
                        v-for="coach in game.users"
                        :key="coach.id"
                        :coach="coach"
                    />
                </div>
            </div>
        </div>
    </AppLayout>
</template>
