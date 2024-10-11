<script>
    import Layout from "@/Layouts/Layout.svelte";
    import { page } from "@inertiajs/svelte";
    import { Deferred } from "@inertiajs/svelte";

    export let message;
    $: console.log(
        `prop: ${message?.text} |`,
        `page store: ${$page.props.message?.text}`,
    );
</script>

<Layout>
    <Deferred data="message">
        <svelte:fragment slot="fallback">Loading...</svelte:fragment>
        <!-- Check the console.log above to see the bug. -->
        <!-- You will see a point where the prop is undefined but the $page store has the deferred value. -->

        <!-- Since the Deferred component checks $page.props, it renders  -->
        <!-- the slot content before the prop is actually available. -->
        <!-- This throws an error because we're reading .text on undefined :)  -->
        <div>Message: {message.text}</div>
    </Deferred>
</Layout>
