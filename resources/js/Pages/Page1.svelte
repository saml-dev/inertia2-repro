<script>
    import Layout from "@/Layouts/Layout.svelte";
    import { page } from "@inertiajs/svelte";
    import { Deferred } from "@inertiajs/svelte";
</script>

<Layout>
    <Deferred data="message">
        <svelte:fragment slot="fallback">Loading...</svelte:fragment>
        <div>Message: {$page.props.message.text}</div>
    </Deferred>
</Layout>
