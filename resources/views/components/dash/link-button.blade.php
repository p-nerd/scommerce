@props(['href' => '#'])

<a
    href="{{ $href }}"
    {{ $attributes->merge(['class' => 'inline-flex items-center justify-center whitespace-nowrap text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 border border-input bg-background hover:bg-accent hover:text-accent-foreground h-9 rounded-md px-3']) }}
>
    {{ $slot }}
</a>
