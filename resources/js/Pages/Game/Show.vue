<script setup>
import TrashBin from "../../Components/Svgs/TrashBin.vue";
import CoachCard from "../../Components/CoachCard.vue";
import AppLayout from "../../Layouts/AppLayout.vue";
import InputLabel from "../../Components/InputLabel.vue";
import TextInput from "../../Components/TextInput.vue";
import { useForm } from "@inertiajs/vue3";
import { watch, ref } from "vue";
import { Link } from "@inertiajs/vue3";
import BasicButton from "../../Components/BasicButton.vue";

import debounce from "lodash/debounce";
const props = defineProps({
    game: Object,
    selectFilter: Object,
    nameFilter: Object,
});

const coachFound = props.game.coaches.length > 0;
const form = useForm({ selected: props.selectFilter.selected ?? "all" });
const filterBySelect = () =>
    form.get(`/games/${props.game.name}`, { preserveScroll: true });

const nameForm = useForm({ coachName: props.nameFilter.coachName ?? null });
const filterByName = () => {
    nameForm.get(`/games/${props.game.name}`, { preserveScroll: true });
};

watch(
    nameForm,
    debounce(() => filterByName(), 1000),
);
</script>
<template>
    <AppLayout>
        <div class="min-h-[1600px] pl-3">
            <div class="flex pt-10 gap-14 items-center">
                <img class="h-96" :src="game.image" />
                <div class="font-semibold text-sm text-slate-400 mr-3">
                    <div>
                        Nekem ESZT-be bekerült valami pszichiátriai vizsgálat
                        epilepszia miatt tavaly februárra. Csak nemrég vettem
                        ezt észre, mert mostanság kellett belépnem. Mondom ok,
                        felhívom őket, hogy ez hibásan került oda, mivel én
                        aznap épp dolgoztam, soha nem volt hasonló problémám :)
                        plusz a zárójelentést, vagymit amit ott pdf-ben le lehet
                        tölteni az egy full üres lap. Mondták, hogy valami másik
                        N betűs honlapra lépjek be ott panaszkodjak. Jó, ezt is
                        tettem. Jött is visszaigazolás, hogy foglalkoznak vele.
                        1 hónap múlva kaptam emailt, hogy: Hát, nem tudják, nem
                        a rendszer hibája; beszéljek a kórházzal. Hát itt voltam
                        úgy, hogy jó lesz*rom, elfér az a bejegyzés ott. Bár így
                        már, hogy ezt említettétek lehet mégiscsak felkeresem
                        őket.
                    </div>
                    <Link href="#" class="text-sky-500 italic hover:underline"
                        >Visit <span v-text="game.name"></span> official
                        homepage</Link
                    >
                </div>
            </div>
            <div class="flex items-center gap-14 my-6">
                <form class="flex gap-3 items-center justify-center">
                    <InputLabel for="username">Coach Name</InputLabel>
                    <TextInput
                        ref="nameInput"
                        placeholder="Search"
                        id="username"
                        name="username"
                        class="bg-bg"
                        v-model="nameForm.coachName"
                    ></TextInput>
                </form>
                <form
                    class="flex justify-center items-center gap-3"
                    @submit.prevent="filterBySelect"
                >
                    <InputLabel for="language">Language</InputLabel>
                    <select
                        class="block"
                        id="language"
                        name="language"
                        v-model="form.selected"
                    >
                        <option value="all">all</option>
                        <option>hu</option>
                        <option>en</option>
                        <option>ru</option>
                        <option>ro</option>
                    </select>
                    <BasicButton>filter</BasicButton>
                </form>
                <Link
                    class="group flex items-center justify-center gap-1"
                    :href="`/games/${game.name}`"
                    preserve-scroll
                    ><span
                        class="text-slate-600 group-hover:text-red-500 transition-colors font-semibold text-sm"
                        >Clear Filter</span
                    ><TrashBin class="h-6 text-slate-600"
                /></Link>
            </div>
            <div class="border-0 border-b border-slate-200"></div>

            <div class="mt-10">
                <div class="text-2xl font-bold text-slate-800">
                    Our <span v-text="game.name"></span> Coaches
                </div>

                <div class="flex gap-7 flex-wrap self-center" v-if="coachFound">
                    <CoachCard
                        v-for="coach in game.coaches"
                        :key="coach.id"
                        :coach="coach"
                    />
                </div>
                <div class="text-xl text-slate-800" v-else>
                    No coach has found...
                </div>
            </div>
        </div>
    </AppLayout>
</template>
