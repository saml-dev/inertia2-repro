<script lang="ts">
    import { useForm, page } from "@inertiajs/svelte";
    import * as Card from "@/Components/ui/card";
    import * as Dialog from "@/Components/ui/dialog";
    import Button from "@/Components/Button.svelte";
    import Label from "@/Components/ui/label/label.svelte";
    import Input from "@/Components/ui/input/input.svelte";
    import FormSection from "@/Components/FormSection.svelte";

    let form = useForm({
        password: null,
    });

    let deleteDialogOpen = false;

    function deleteAccount() {
        console.log("deleting");
        $form.delete("/profile");
    }
</script>

<Card.Root>
    <Card.Header>
        <Card.Title>Delete Account</Card.Title>
        <Card.Description>
            Delete your account and all data. This is irreversible.
        </Card.Description>
    </Card.Header>
    <Card.Content>
        <Dialog.Root bind:open={deleteDialogOpen}>
            <Dialog.Trigger asChild>
                <Button
                    variant="destructive"
                    on:click={() => (deleteDialogOpen = true)}
                    >Delete Account</Button
                >
            </Dialog.Trigger>
            <Dialog.Content>
                <Dialog.Header>
                    <Dialog.Title>Are you sure absolutely sure?</Dialog.Title>
                    <Dialog.Description>
                        This action cannot be undone. This will permanently
                        delete your account and remove your data from our
                        servers.
                    </Dialog.Description>
                    <Dialog.Description
                        >Enter your current password to continue.</Dialog.Description
                    >
                </Dialog.Header>
                <form on:submit|preventDefault={deleteAccount}>
                    <FormSection>
                        <Label for="password">Password</Label>
                        <Input
                            id="password"
                            type="password"
                            bind:value={$form.password}
                        />
                        {#if $form.errors.password}
                            <Label class="text-destructive"
                                >{$form.errors.password}</Label
                            >
                        {/if}
                    </FormSection>
                    <div class="flex items-end justify-end gap-x-4">
                        <Button
                            type="button"
                            variant="outline"
                            class="w-fit"
                            on:click={() => (deleteDialogOpen = false)}
                        >
                            Cancel
                        </Button>
                        <Button
                            type="submit"
                            variant="destructive"
                            class="w-fit"
                        >
                            Delete Account
                        </Button>
                    </div>
                </form>
            </Dialog.Content>
        </Dialog.Root>
    </Card.Content>
</Card.Root>
