<script>
    import Layout from "@/Layouts/Layout.svelte";
    import { inertia } from "@inertiajs/svelte";
</script>

<Layout>
    <div class="flex flex-col gap-y-4">
        <a class="text-blue-700 underline" href="/page1" use:inertia
            >This page uses $page.props.message</a
        >
        <a class="text-blue-700 underline" href="/page2" use:inertia
            >This page uses `export let message` (see error in console)</a
        >
    </div>
</Layout>
