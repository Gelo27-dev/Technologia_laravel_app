<x-guest-layout>
<div class="pb-12 pt-8 min-h-screen">
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
        <h1 class="text-5xl font-extrabold text-[var(--color-store-text)] mb-8 tracking-tight">
            Your Shopping Cart
        </h1>

        @if (session('success'))
            <div class="mb-6 p-4 bg-green-900/30 border border-green-700 text-green-300 rounded-lg">
                {{ session('success') }}
            </div>
        @endif
        
        @if (session('error'))
            <div class="mb-6 p-4 bg-red-900/30 border border-red-700 text-red-300 rounded-lg">
                {{ session('error') }}
            </div>
        @endif

        @error('quantity')
            <div class="mb-6 p-4 bg-red-900/30 border border-red-700 text-red-300 rounded-lg">
                {{ $message }}
            </div>
        @enderror

        @if (Cart::count() > 0)

            <div class="card-tech overflow-hidden border border-gray-700 mb-8">
                <table class="min-w-full">
                    <thead class="bg-gray-800 text-white">
                        <tr>
                            <th class="py-4 px-6 text-left text-sm font-semibold uppercase tracking-wider">Product</th>
                            <th class="py-4 px-6 text-left text-sm font-semibold uppercase tracking-wider">Price</th>
                            <th class="py-4 px-6 text-left text-sm font-semibold uppercase tracking-wider">Quantity</th>
                            <th class="py-4 px-6 text-left text-sm font-semibold uppercase tracking-wider">Subtotal</th>
                            <th class="py-4 px-6 text-left text-sm font-semibold uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach (Cart::content() as $item)
                            <tr class="border-b border-gray-700 hover:bg-gray-800 transition">
                                <td class="py-4 px-6 text-[var(--color-store-text)] font-medium">
                                    {{ $item->name }}
                                    @if ($item->options->isNotEmpty())
                                        <div class="text-xs text-gray-400 mt-2 space-y-1">
                                            @foreach ($item->options as $key => $value)
                                                <span class="inline-block bg-gray-700 rounded-full px-3 py-1 text-xs font-semibold mr-2">{{ ucfirst($key) }}: {{ $value }}</span>
                                            @endforeach
                                        </div>
                                    @endif
                                </td>

                                <td class="py-4 px-6 text-gray-300">${{ number_format($item->price, 2) }}</td>

                                <td class="py-4 px-6">
                                    <form action="{{ route('cart.update', $item->rowId) }}" method="POST" class="flex items-center space-x-2">
                                        @csrf
                                        @method('PATCH')
                                        <input
                                            type="number"
                                            name="quantity"
                                            value="{{ $item->qty }}"
                                            min="1"
                                            class="w-16 px-3 py-2 bg-gray-800 border border-gray-700 rounded-lg text-white text-center text-sm focus:border-primary-accent focus:ring focus:ring-primary-accent/50 transition"
                                            onchange="this.form.submit()"
                                        />
                                    </form>
                                </td>

                                <td class="py-4 px-6 text-[var(--color-store-text)] font-semibold">${{ number_format((float) $item->subtotal, 2) }}</td>

                                <td class="py-4 px-6">
                                    <form action="{{ route('cart.destroy', $item->rowId) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button
                                            type="submit"
                                            class="text-red-400 hover:text-red-300 text-sm font-medium transition"
                                            onclick="return confirm('Are you sure you want to remove {{ $item->name }} from the cart?')"
                                        >
                                            Remove
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                        <tr class="font-bold bg-gray-800 border-t-2 border-primary-accent/50">
                            <td colspan="3" class="py-4 px-6 text-right text-lg text-[var(--color-store-text)]">Cart Total</td>
                            <td class="py-4 px-6 text-lg text-primary-accent">${{ number_format((float) Cart::total(), 2) }}</td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="flex flex-col md:flex-row justify-between items-center gap-4 p-6 card-tech border border-gray-700 rounded-lg">
                <a href="{{ route('shop.index') }}" class="text-primary-accent hover:text-white font-semibold transition flex items-center group">
                    <svg class="w-4 h-4 mr-2 group-hover:-translate-x-1 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16l-4-4m0 0l4-4m-4 4h18"/></svg>
                    Continue Shopping
                </a>

                <div class="flex items-center gap-3 w-full md:w-auto justify-end">
                    <form action="{{ route('cart.clear') }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button
                            type="submit"
                            class="px-6 py-2 bg-gray-700 text-gray-200 font-medium text-sm rounded-lg hover:bg-red-600 hover:text-white transition"
                            onclick="return confirm('Are you sure you want to clear the entire cart? This action cannot be undone.')"
                        >
                            Clear Cart
                        </button>
                    </form>

                    <a href="{{ route('checkout.index') }}">
                        <button class="btn-primary px-8 py-3 text-sm">
                            Proceed to Checkout →
                        </button>
                    </a>
                </div>
            </div>

        @else
            <div class="text-center p-12 card-tech border border-gray-700 rounded-xl">
                <svg class="w-16 h-16 mx-auto text-gray-600 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                <p class="text-xl text-gray-300 mb-6">Your shopping cart is currently empty.</p>
                <a href="{{ route('shop.index') }}" class="btn-primary px-8 py-3 inline-flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                    Start Shopping
                </a>
            </div>
        @endif

    </div>
</div>
</x-guest-layout>