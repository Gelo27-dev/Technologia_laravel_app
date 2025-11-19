@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-1 pt-1 border-b-2 border-primary-accent text-sm font-medium leading-5 text-[var(--nav-text-active)] focus:outline-none focus:border-primary-accent transition duration-150 ease-in-out'
            : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-[var(--color-store-text-muted)] hover:text-primary-accent hover:border-primary-accent focus:outline-none focus:text-primary-accent focus:border-primary-accent transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
