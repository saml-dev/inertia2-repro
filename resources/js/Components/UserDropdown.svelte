<script lang="ts">
    import { page } from "@inertiajs/svelte";
    import Menu from "lucide-svelte/icons/menu";
    import * as DropdownMenu from "@/Components/ui/dropdown-menu";
    import { ChevronDown } from "lucide-svelte";
    import UserDropdownItem from "@/Components/UserDropdownItem.svelte";

    $: user = $page.props.auth.user;
</script>

<DropdownMenu.Root>
    <DropdownMenu.Trigger>
        <div
            class="items-center hidden text-sm transition text-muted-foreground sm:flex hover:text-foreground"
        >
            <span>{user.name}</span>
            <span class="ml-1"><ChevronDown size="1em" /></span>
        </div>
        <div class="block sm:hidden"><Menu /></div>
    </DropdownMenu.Trigger>
    <DropdownMenu.Content class="w-56 text-base sm:text-sm" align="end">
        <DropdownMenu.Group>
            <DropdownMenu.Label
                class="flex flex-col items-start font-normal text-muted-foreground"
            >
                <span class="mb-1 sm:hidden"> {user.name} </span>
                <span> {user.email} </span>
            </DropdownMenu.Label>
            <DropdownMenu.Separator class="my-2" />
            <div class="sm:hidden">
                <UserDropdownItem href="/page1">Page 1</UserDropdownItem>
                <UserDropdownItem href="/page2">Page 2</UserDropdownItem>
                <DropdownMenu.Separator class="my-2" />
            </div>
            <UserDropdownItem href="/profile">Profile</UserDropdownItem>
            <UserDropdownItem href="/logout" method="post">
                Log out
            </UserDropdownItem>
        </DropdownMenu.Group>
    </DropdownMenu.Content>
</DropdownMenu.Root>
