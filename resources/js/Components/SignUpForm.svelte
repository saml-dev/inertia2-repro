<script>
    import { useForm, inertia } from "@inertiajs/svelte";
    import Button from "@/Components/Button.svelte";
    import ErrorLabel from "@/Components/ErrorLabel.svelte";
    import Label from "@/Components/ui/label/label.svelte";
    import Input from "@/Components/ui/input/input.svelte";
    import FormSection from "@/Components/FormSection.svelte";
    import * as Card from "@/Components/ui/card";

    let form = useForm({
        name: null,
        email: null,
        password: null,
        password_confirmation: null,
    });

    function submit() {
        $form.post("/register");
    }
</script>

<Card.Root class="shadow-lg w-96">
    <Card.Header></Card.Header>
    <Card.Content>
        <form on:submit|preventDefault={submit} class="">
            <FormSection>
                <Label for="name">Name</Label>
                <Input
                    bind:value={$form.name}
                    name="email"
                    type="text"
                    autofocus
                />
                <ErrorLabel error={$form.errors.name} />
            </FormSection>
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
                <a use:inertia href="/login" class="mr-5 text-xs underline"
                    >Already registered?</a
                >
                <Button type="submit" disabled={$form.processing}
                    >Sign Up</Button
                >
            </div>
        </form>
    </Card.Content>
</Card.Root>
