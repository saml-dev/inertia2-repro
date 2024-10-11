<script>
    export let error;
</script>

{#if error}
    <p class="text-sm text-destructive">{error}</p>
{/if}
