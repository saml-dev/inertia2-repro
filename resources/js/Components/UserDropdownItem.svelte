<script lang="ts">
    import { inertia, page } from "@inertiajs/svelte";
    import * as DropdownMenu from "@/Components/ui/dropdown-menu";

    export let href: string;
    export let method = "get";
</script>

<DropdownMenu.Item asChild>
    <a
        {href}
        class="block px-2 py-2 rounded hover:bg-muted"
        class:active={$page.url === href}
        use:inertia={{ method }}
    >
        <slot />
    </a>
</DropdownMenu.Item>

<style>
    .active {
        @apply bg-primary/5;
    }
</style>
