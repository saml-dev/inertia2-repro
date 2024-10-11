<script lang="ts">
    import { useForm, page } from "@inertiajs/svelte";
    import * as Card from "@/Components/ui/card";
    import FormSection from "@/Components/FormSection.svelte";
    import Label from "@/Components/ui/label/label.svelte";
    import Input from "@/Components/ui/input/input.svelte";
    import Button from "@/Components/Button.svelte";

    let form = useForm({
        current_password: "",
        password: "",
        password_confirmation: "",
    });

    function submit() {
        $form.put("/password");
    }
</script>

<Card.Root>
    <Card.Header>
        <Card.Title>Update Password</Card.Title>
        <Card.Description>
            Ensure your account is using a long, random password to stay secure.
        </Card.Description>
    </Card.Header>
    <Card.Content>
        <form on:submit|preventDefault={submit}>
            <FormSection>
                <Label for="current_password">Current Password</Label>
                <Input
                    id="current_password"
                    type="password"
                    bind:value={$form.current_password}
                    class="max-w-md"
                />
                {#if $form.errors.current_password}
                    <Label class="text-destructive"
                        >{$form.errors.current_password}</Label
                    >
                {/if}
            </FormSection>
            <FormSection>
                <Label for="password">New Password</Label>
                <Input
                    id="password"
                    type="password"
                    bind:value={$form.password}
                    class="max-w-md"
                />
                {#if $form.errors.password}
                    <Label class="text-destructive"
                        >{$form.errors.password}</Label
                    >
                {/if}
            </FormSection>
            <FormSection>
                <Label for="password_confirmation">Confirm New Password</Label>
                <Input
                    id="password_confirmation"
                    type="password"
                    bind:value={$form.password_confirmation}
                    class="max-w-md"
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
