<script lang="ts">
    import { twMerge } from "tailwind-merge";
    import { inertia } from "@inertiajs/svelte";
    import {
        buttonVariants,
        type ButtonVariant,
        type ButtonSize,
    } from "@/Components/ui/button";
    import Button from "@/Components/ui/button/button.svelte";

    export let link = false;
    export let method = "get";
    export let variant: ButtonVariant = "default";
    export let size: ButtonSize = "default";
    export { className as class };

    let className = "";
</script>

{#if link}
    <!-- svelte-ignore a11y-missing-attribute -->
    <a
        use:inertia={{ method }}
        class={twMerge(
            buttonVariants({ variant, size }),
            "font-medium tracking-wide",
            className,
        )}
        {...$$restProps}
    >
        <slot />
    </a>
{:else}
    <Button
        class={twMerge("font-medium tracking-wide", className)}
        {variant}
        {size}
        {...$$restProps}
        on:click
    >
        <slot />
    </Button>
{/if}
