<script lang="ts">
    import { useForm, page } from "@inertiajs/svelte";
    import * as Card from "@/Components/ui/card";
    import FormSection from "@/Components/FormSection.svelte";
    import Label from "@/Components/ui/label/label.svelte";
    import Input from "@/Components/ui/input/input.svelte";
    import Button from "@/Components/Button.svelte";

    let form = useForm({
        name: $page.props.auth.user.name,
        email: $page.props.auth.user.email,
    });

    function submit() {
        $form.patch("/profile");
    }
</script>

<Card.Root>
    <Card.Header>
        <Card.Title>Profile Information</Card.Title>
        <Card.Description>Update your name and email address.</Card.Description>
    </Card.Header>
    <Card.Content class="">
        <form on:submit|preventDefault={submit}>
            <FormSection>
                <Label for="name">Name</Label>
                <Input
                    id="name"
                    type="text"
                    bind:value={$form.name}
                    class="max-w-md"
                />
            </FormSection>
            <FormSection>
                <Label for="email">Email address</Label>
                <Input
                    id="email"
                    type="text"
                    class="max-w-md"
                    bind:value={$form.email}
                />
            </FormSection>
            <FormSection>
                <div class="flex items-center gap-x-4">
                    <Button type="submit" class="w-fit">Save</Button>
                    {#if $form.recentlySuccessful}
                        <p class="text-sm text-muted-foreground">Saved.</p>
                    {/if}
                </div>
            </FormSection>
        </form>
    </Card.Content>
</Card.Root>
