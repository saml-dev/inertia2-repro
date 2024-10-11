<script>
    import NavBar from "@/Components/NavBar.svelte";
    import { twMerge } from "tailwind-merge";

    export let gray = false;
    export { className as class };
    let className = "";
</script>

<NavBar />
<div class:gray class="pb-20">
    <div class={twMerge("px-4 mx-auto max-w-7xl sm:px-8", className)}>
        <slot></slot>
    </div>
</div>

<style>
    .gray {
        min-height: calc(100dvh - 65px);
        @apply bg-slate-100;
    }
</style>
