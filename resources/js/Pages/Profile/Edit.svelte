<script>
    import Layout from "@/Layouts/Layout.svelte";
    import UpdateProfileSection from "./Partials/UpdateProfileSection.svelte";
    import UpdatePasswordSection from "./Partials/UpdatePasswordSection.svelte";
    import DeleteAccountSection from "./Partials/DeleteAccountSection.svelte";
</script>

<Layout gray>
    <div class="flex flex-col w-full pt-10 gap-y-8">
        <UpdateProfileSection />
        <UpdatePasswordSection />
        <DeleteAccountSection />
    </div>
</Layout>
