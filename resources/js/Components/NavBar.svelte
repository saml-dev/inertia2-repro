<script>
    import { page, inertia } from "@inertiajs/svelte";
    import Button from "@/Components/Button.svelte";
    import UserDropdown from "@/Components/UserDropdown.svelte";
    import NavLink from "@/Components/NavLink.svelte";

    $: user = $page.props.auth.user;
</script>

<nav class="border-b">
    <div
        class="flex items-center justify-between h-16 max-w-screen-xl px-4 mx-auto sm:px-8"
    >
        <div class="flex items-center py-3 gap-x-10">
            <a use:inertia href="/">App Logo</a>
            {#if user}
                <div class="items-center hidden gap-x-6 sm:flex">
                    <NavLink href="/page1">Page 1</NavLink>
                    <NavLink href="/page2">Page 2</NavLink>
                </div>
            {/if}
        </div>
        <div>
            {#if user}
                <UserDropdown />
            {:else}
                <div class="flex items-center gap-x-3">
                    <Button link variant="outline" href="/login">Log in</Button>
                    <Button link href="/register">Sign Up</Button>
                </div>
            {/if}
        </div>
    </div>
</nav>
