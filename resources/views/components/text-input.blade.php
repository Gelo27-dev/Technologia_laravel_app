@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'bg-gray-800 border-gray-700 text-white placeholder-gray-500 focus:border-primary-accent focus:ring focus:ring-primary-accent/50 rounded-lg shadow-sm']) }}>
