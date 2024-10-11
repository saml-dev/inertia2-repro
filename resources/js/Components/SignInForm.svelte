<script lang="ts">
    import { useForm, inertia, page } from "@inertiajs/svelte";
    import ErrorLabel from "@/Components/ErrorLabel.svelte";
    import Button from "@/Components/Button.svelte";
    import Input from "@/Components/ui/input/input.svelte";
    import FormSection from "@/Components/FormSection.svelte";
    import Checkbox from "@/Components/ui/checkbox/checkbox.svelte";
    import Label from "@/Components/ui/label/label.svelte";
    import * as Card from "@/Components/ui/card";

    let form = useForm({
        email: null,
        password: null,
        remember: false,
    });

    function submit() {
        $form.post("login");
    }
</script>

<Card.Root class="shadow-lg w-96">
    <Card.Header>
        {#if $page.props.status}
            <p class="text-sm text-green-600">{$page.props.status}</p>
        {/if}
    </Card.Header>
    <Card.Content>
        <form on:submit|preventDefault={submit} class="">
            <FormSection>
                <Label for="email">Email</Label>
                <Input
                    bind:value={$form.email}
                    name="email"
                    type="email"
                    autofocus
                />
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
                <div class="flex items-center justify-start gap-x-2">
                    <Checkbox bind:checked={$form.remember} id="remember" />
                    <Label for="remember" class="text-muted-foreground"
                        >Remember me</Label
                    >
                </div>
            </FormSection>
            <div class="flex items-center justify-end mt-4">
                <a
                    use:inertia
                    href="/forgot-password"
                    class="mr-5 text-xs underline"
                >
                    Forgot your password?
                </a>
                <Button type="submit" disabled={$form.processing}>Log In</Button
                >
            </div>
        </form>
    </Card.Content>
</Card.Root>
