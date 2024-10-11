<script>
    import { useForm, page } from "@inertiajs/svelte";
    import Button from "@/Components/Button.svelte";
    import ErrorLabel from "@/Components/ErrorLabel.svelte";
    import Label from "@/Components/ui/label/label.svelte";
    import Input from "@/Components/ui/input/input.svelte";
    import FormSection from "@/Components/FormSection.svelte";
    import * as Card from "@/Components/ui/card";

    let form = useForm({
        email: null,
    });

    function submit() {
        $form.post("forgot-password");
    }
</script>

<div
    class="flex flex-col items-center justify-center min-h-screen px-10 bg-slate-100"
>
    <Card.Root class="shadow-lg w-96">
        <Card.Header>
            <Card.Title>Forgot your password?</Card.Title>
            <Card.Description>
                Enter your email address and we'll send you a link to reset your
                password.
            </Card.Description>
        </Card.Header>
        <Card.Content>
            <form on:submit|preventDefault={submit}>
                <FormSection>
                    <Label for="email">Email</Label>
                    <Input
                        bind:value={$form.email}
                        name="email"
                        type="email"
                        autofocus
                    />
                    <ErrorLabel error={$form.errors.email} />
                    {#if $page.props.status}
                        <p class="text-sm text-green-600">
                            {$page.props.status}
                        </p>
                    {/if}
                </FormSection>
                <div class="flex justify-end mt-4">
                    <Button type="submit" disabled={$form.processing}>
                        Send Email
                    </Button>
                </div>
            </form>
        </Card.Content>
    </Card.Root>
</div>
