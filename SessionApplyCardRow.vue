<script setup>
const props = defineProps({ nameProp: String, value: String, gameImg: String });
</script>

<template>
    <div class="flex gap-2 items-center">
        <div class="font-bold text-slate-400 text-sm" v-text="nameProp"></div>
        <div
            :class="{
                'px-3 py-1 flex items-center justify-center rounded-full border gap-1 border-slate-200 text-sm':
                    gameImg,
            }"
        >
            <img class="h-8" v-if="gameImg" :src="gameImg" />
            <div
                class="text-slate-600 font-semibold text-base"
                v-text="value"
            ></div>
        </div>
    </div>
</template>
