<template>
    <button
        class="group relative inline-flex bg-white border border-slate-500 w-20"
    >
        <span
            class="flex w-full items-center justify-center -translate-x-1 translate-y-1 bg-sky-500 text-sm font-semibold text-white group-hover:translate-x-0 group-hover:-translate-y-0 transition-all px-3 py-1 shadow-md"
        >
            <slot />
        </span>
    </button>
</template>
