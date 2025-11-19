@props(['active'])

@php
$classes = ($active ?? false)
            ? 'block w-full ps-3 pe-4 py-2 border-l-4 border-primary-accent text-start text-base font-medium text-primary-accent bg-gray-800 focus:outline-none focus:text-primary-accent focus:bg-gray-800 focus:border-primary-accent transition duration-150 ease-in-out'
            : 'block w-full ps-3 pe-4 py-2 border-l-4 border-transparent text-start text-base font-medium text-[var(--color-store-text-muted)] hover:text-primary-accent hover:bg-gray-800 hover:border-primary-accent focus:outline-none focus:text-primary-accent focus:bg-gray-800 focus:border-primary-accent transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
