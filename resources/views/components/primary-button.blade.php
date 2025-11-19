<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-[var(--color-store-primary)] border border-transparent rounded-lg font-semibold text-xs text-white uppercase tracking-widest hover:opacity-90 focus:outline-none focus:ring-2 focus:ring-[var(--color-store-primary)] focus:ring-offset-2 focus:ring-offset-[var(--color-store-secondary)] transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
