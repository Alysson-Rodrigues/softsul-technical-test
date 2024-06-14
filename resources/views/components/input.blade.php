<!-- resources/views/components/input.blade.php -->
@props(['type' => 'text', 'class' => ''])

<div class="relative">
    <input type="{{ $type }}"
        {{ $attributes->merge([
            'class' => "flex h-10 w-full rounded-md border border-input bg-input px-3 text-foreground py-2 text-sm ring-offset-background placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 $class",
        ]) }} />
</div>
