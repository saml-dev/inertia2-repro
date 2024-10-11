<script>
    import { useForm, page } from "@inertiajs/svelte";
    import Button from "@/Components/Button.svelte";
    import ErrorLabel from "@/Components/ErrorLabel.svelte";
    import Label from "@/Components/ui/label/label.svelte";
    import Input from "@/Components/ui/input/input.svelte";
    import FormSection from "@/Components/FormSection.svelte";
    import * as Card from "@/Components/ui/card";

    let form = useForm({
        token: $page.props.token,
        email: $page.props.email,
        password: null,
        password_confirmation: null,
    });

    function submit() {
        $form.post("/reset-password");
    }
</script>

<div
    class="flex flex-col items-center justify-center min-h-screen px-10 bg-slate-100"
>
    <Card.Root class="shadow-lg w-96">
        <Card.Header>
            <Card.Title>Reset Password</Card.Title>
            <Card.Description>Set your new password below.</Card.Description>
        </Card.Header>
        <Card.Content>
            <form on:submit|preventDefault={submit} class="">
                <FormSection>
                    <Label for="email">Email</Label>
                    <Input bind:value={$form.email} name="email" type="email" />
                    <ErrorLabel error={$form.errors.email} />
                </FormSection>
                <FormSection>
                    <Label for="password">Password</Label>
                    <Input
                        bind:value={$form.password}
                        name="password"
                        type="password"
                    />
                    <ErrorLabel error={$form.errors.password} />
                </FormSection>
                <FormSection>
                    <Label for="password_confirmation">Confirm Password</Label>
                    <Input
                        bind:value={$form.password_confirmation}
                        name="password_confirmation"
                        type="password"
                    />
                </FormSection>
                <div class="flex items-center justify-end mt-4">
                    <Button type="submit" disabled={$form.processing}
                        >Reset Password</Button
                    >
                </div>
            </form>
        </Card.Content>
    </Card.Root>
</div>
