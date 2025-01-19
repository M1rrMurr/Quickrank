<script setup>
import CoachCard from "../../Components/CoachCard.vue";
import AppLayout from "../../Layouts/AppLayout.vue";
import InputLabel from "../../Components/InputLabel.vue";
import TextInput from "../../Components/TextInput.vue";
import { useForm } from "@inertiajs/vue3";
import { Link } from "@inertiajs/vue3";
const form = useForm({});
const props = defineProps({ game: Object });
</script>
<template>
    <AppLayout>
        <div class="min-h-[1600px] pl-3">
            <div class="text-3xl font-bold text-slate-800">
                Our <span v-text="game.name"></span> Coaches
            </div>
            <div class="flex gap-14 items-center">
                <img class="" :src="game.image" />
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
                    <Link href="#" class="text-sky-500 italic"
                        >Visit <span v-text="game.name"></span> homepage</Link
                    >
                </div>
            </div>
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
                    <select class="block" id="language" name="language">
                        <option value="">hun</option>
                        <option value="">de</option>
                        <option value="">ru</option>
                    </select>
                </form>
            </div>
            <div class="border-0 border-b border-slate-200"></div>

            <div class="mx-auto">
                <div class="text-xl font-semibold mb-4">Coaches</div>
                <div class="flex gap-7 flex-wrap self-center">
                    <CoachCard
                        v-for="coach in game.coaches"
                        :key="coach.id"
                        :coach="coach"
                    />
                </div>
            </div>
        </div>
    </AppLayout>
</template>
