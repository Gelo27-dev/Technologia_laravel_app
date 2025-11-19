@props(['product', 'context' => 'shop', 'index' => 0])

<style>
@keyframes fade-in-up {
    0% {
        opacity: 0;
        transform: translateY(30px) scale(0.95);
    }
    100% {
        opacity: 1;
        transform: translateY(0) scale(1);
    }
}

@keyframes pulse-glow {
    0%, 100% {
        text-shadow: 0 0 5px rgba(249, 115, 22, 0.5);
    }
    50% {
        text-shadow: 0 0 20px rgba(249, 115, 22, 0.8), 0 0 30px rgba(249, 115, 22, 0.6);
    }
}

@keyframes highlight-pulse {
    0%, 100% {
        box-shadow: 0 0 0 0 rgba(249, 115, 22, 0.4);
    }
    50% {
        box-shadow: 0 0 0 10px rgba(249, 115, 22, 0);
    }
}

@keyframes float {
    0%, 100% {
        transform: translateY(0px);
    }
    50% {
        transform: translateY(-5px);
    }
}

.animate-fade-in-up {
    animation: fade-in-up 0.8s ease-out;
}

.animate-pulse-glow {
    animation: pulse-glow 2s ease-in-out infinite;
}

.animate-highlight-pulse {
    animation: highlight-pulse 2s ease-in-out infinite;
}

.animate-float {
    animation: float 3s ease-in-out infinite;
}
</style>

@php
    // Skip rendering if product is null or doesn't have required data
    if (!$product || !$product->id || !$product->name) {
        return;
    }
    // Handle product data (assuming Product model with category relationship loaded)
    $productId = $product->id ?? null;
    $productName = $product->name ?? 'Unknown Product';
    $productPrice = $product->price ?? 0;
    $productStock = $product->stock ?? 0;

    // Determine the product image, using the storage asset path or a robust placeholder
    $productImage = $product->image ? asset('storage/' . $product->image) : 'https://via.placeholder.com/400?text=' . urlencode($productName);

    // Determine the description and category with robust fallbacks
    $productDescription = $product->description ?? '';
    $productCategory = $product->category->name ?? 'Uncategorized';

    // Truncate description for display
    $shortDescription = strlen($productDescription) > 100 ? substr($productDescription, 0, 100) . '...' : $productDescription;

    // Calculate animation delay based on index for staggered entrance
    $animationDelay = ($index % 12) * 100; // Stagger up to 12 products per row

    // **Refinement: Create a single JSON payload for the Alpine quick-view component.**
    $quickViewData = [
        'id' => $productId,
        'name' => $productName,
        'price' => $productPrice,
        'image' => $productImage,
        'description' => $productDescription,
        'stock' => $productStock,
        'category' => $productCategory,
    ];

    // Determine favorite state and action based on context
    $isFavorited = false;
    $favoriteAction = 'toggle';
    $favoriteMethod = 'POST';

    if ($context === 'favorites') {
        $isFavorited = true; // In favorites page, all products are favorited
        $favoriteAction = 'toggle';
        $favoriteMethod = 'DELETE'; // Use DELETE for removing from favorites
    } elseif (auth()->check() && $productId) {
        $isFavorited = auth()->user()->favoriteProducts()->where('product_id', $productId)->exists();
    }
@endphp

{{-- Enhanced Product Card with Noticeable Animations --}}
<div class="group/product relative w-full animate-fade-in-up"
     style="animation-delay: {{ $animationDelay }}ms; animation-fill-mode: both;">
    <!-- Modern Product Card with Highlighting -->
    <div class="bg-white/5 backdrop-blur-lg border border-white/20 rounded-2xl overflow-hidden hover:bg-white/10 hover:border-white/30 transition-all duration-500 ease-out hover:scale-[1.02] hover:shadow-2xl hover:shadow-orange-500/20 h-[480px] flex flex-col shadow-lg transform-gpu relative before:absolute before:inset-0 before:rounded-2xl before:bg-gradient-to-r before:from-orange-500/10 before:to-pink-500/10 before:opacity-0 hover:before:opacity-100 before:transition-opacity before:duration-500 animate-highlight-pulse"
         x-data="{ quickViewData: {{ json_encode($quickViewData) }} }"
         x-init="setTimeout(() => $el.classList.add('animate-highlight-pulse'), {{ $animationDelay + 2000 }})">

        <!-- Product Image with Overlay Elements -->
        <div class="relative aspect-square overflow-hidden bg-gray-900/50">
            {{-- Quick View Button --}}
            <button @click="$dispatch('open-quick-view', quickViewData)" type="button" class="absolute inset-0 w-full h-full z-10 transition-opacity duration-300 group-hover/product:opacity-95">
                <img class="w-full h-full object-contain transition-transform duration-700 ease-out group-hover/product:scale-110 group-hover/product:rotate-1"
                     src="{{ $productImage }}"
                     alt="{{ $productName }}">
            </button>

            <!-- Favorite Button -->
            <div class="absolute top-3 right-3 z-20 transition-all duration-500 ease-out group-hover/product:translate-y-0 group-hover/product:opacity-100 translate-y-2 opacity-80">
                @auth
                    @if($context === 'favorites')
                        <!-- Remove from favorites (filled heart) -->
                        @if($productId)
                        <form action="{{ route('favorites.toggle', $productId) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="p-2 rounded-full bg-red-500/20 hover:bg-red-500/30 text-white backdrop-blur-sm border border-white/20 transition-all duration-300 ease-out hover:scale-110 hover:rotate-12 hover:shadow-lg hover:shadow-red-500/30" title="Remove from favorites">
                                <svg class="w-4 h-4 text-red-400 transition-all duration-300 ease-out group-hover/button:scale-110" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                                </svg>
                            </button>
                        </form>
                        @endif
                    @else
                        <!-- Add/Remove toggle (outline heart) -->
                        @if($productId)
                        <form action="{{ route('favorites.toggle', $productId) }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="p-2 rounded-full bg-black/50 hover:bg-black/70 text-white backdrop-blur-sm border border-white/20 transition-all duration-300 ease-out hover:scale-110 hover:rotate-12 hover:shadow-lg hover:shadow-red-500/30" title="{{ $isFavorited ? 'Remove from favorites' : 'Add to favorites' }}">
                                <svg class="w-4 h-4 {{ $isFavorited ? 'text-red-400 fill-current' : 'text-white' }} transition-all duration-300 ease-out group-hover/button:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                </svg>
                            </button>
                        </form>
                        @endif
                    @endif
                @else
                    <a href="{{ route('login') }}" class="inline-block p-2 rounded-full bg-black/50 hover:bg-black/70 text-white backdrop-blur-sm border border-white/20 transition-all duration-300 ease-out hover:scale-110 hover:rotate-12 hover:shadow-lg hover:shadow-red-500/30" title="Login to add to favorites">
                        <svg class="w-4 h-4 text-white transition-all duration-300 ease-out group-hover/button:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                        </svg>
                    </a>
                @endauth
            </div>

            <!-- Category Badge -->
            <div class="absolute top-3 left-3 z-20 transition-all duration-500 ease-out delay-100 group-hover/product:translate-y-0 group-hover/product:opacity-100 translate-y-2 opacity-80">
                <span class="px-2 py-1 bg-blue-500/80 text-blue-100 text-xs font-medium rounded-lg backdrop-blur-sm transition-all duration-300 ease-out group-hover/badge:scale-105 group-hover/badge:shadow-lg group-hover/badge:shadow-blue-500/30">
                    {{ $productCategory }}
                </span>
            </div>
        </div>

        <!-- Product Details -->
        <div class="p-5 flex-1 flex flex-col transition-all duration-300 ease-out">
            <!-- Product Name -->
            <h3 class="text-lg font-bold text-white mb-2 leading-tight line-clamp-2 group-hover/product:text-orange-400 transition-all duration-500 ease-out min-h-[3.5rem] flex items-start transform group-hover/product:translate-x-1">
                {{ $productName }}
            </h3>

            <!-- Prominent Price Display -->
            <div class="mb-3 transform group-hover/product:scale-105 transition-all duration-300 ease-out animate-float">
                <div class="bg-gradient-to-r from-orange-500/20 to-pink-500/20 rounded-lg p-3 border border-orange-400/30 backdrop-blur-sm shadow-lg shadow-orange-500/20">
                    <div class="text-center">
                        <span class="text-3xl font-black text-orange-400 animate-pulse-glow">${{ number_format($productPrice, 2) }}</span>
                        <div class="text-xs text-orange-200 font-medium mt-1">Starting Price</div>
                    </div>
                </div>
            </div>

            <!-- Product Description -->
            @if($shortDescription)
            <div class="mb-3 flex-1">
                <p class="text-sm text-gray-300 leading-relaxed line-clamp-3 group-hover/product:text-gray-200 transition-all duration-300 ease-out">
                    {{ $shortDescription }}
                </p>
            </div>
            @endif

            <!-- Stock Status -->
            <div class="flex items-center justify-between mb-4 transition-all duration-300 ease-out group-hover/product:translate-x-1">
                <div class="text-right transition-all duration-300 ease-out group-hover/product:translate-x-[-4px]">
                    @if ($productStock > 10)
                        <span class="px-3 py-1 bg-green-500/30 text-green-200 text-xs font-medium rounded-full border border-green-400/40 animate-stock-pulse transition-all duration-300 ease-out group-hover/stock:scale-105 group-hover/stock:shadow-lg group-hover/stock:shadow-green-500/30">IN STOCK</span>
                    @elseif ($productStock > 0)
                        <span class="px-3 py-1 bg-yellow-500/30 text-yellow-200 text-xs font-medium rounded-full border border-yellow-400/40 transition-all duration-300 ease-out group-hover/stock:scale-105 group-hover/stock:shadow-lg group-hover/stock:shadow-yellow-500/30">LOW ({{ $productStock }})</span>
                    @else
                        <span class="px-3 py-1 bg-red-500/30 text-red-200 text-xs font-medium rounded-full border border-red-400/40 transition-all duration-300 ease-out group-hover/stock:scale-105 group-hover/stock:shadow-lg group-hover/stock:shadow-red-500/30">OUT OF STOCK</span>
                    @endif
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="space-y-2 mt-auto transition-all duration-300 ease-out group-hover/product:translate-y-[-2px]">
                @if($productStock > 0)
                    <form action="{{ route('cart.store') }}" method="POST" class="w-full transition-all duration-300 ease-out group-hover/form:scale-[1.02]">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $productId }}">
                        <input type="hidden" name="quantity" value="1">
                        <button type="submit" class="w-full py-2.5 bg-gradient-to-r from-orange-500 to-orange-600 hover:from-orange-600 hover:to-orange-700 text-white font-semibold rounded-lg transition-all duration-300 ease-out hover:scale-105 hover:shadow-lg hover:shadow-orange-500/30 hover:rotate-1 transform-gpu group-hover/button:shadow-2xl group-hover/button:shadow-orange-500/40">
                            <span class="flex items-center justify-center gap-2 transition-all duration-300 ease-out group-hover/span:scale-105">
                                <svg class="w-4 h-4 transition-all duration-300 ease-out group-hover/svg:rotate-12 group-hover/svg:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4m0 0L7 13m0 0l-1.1 5H19M7 13l-1.1 5M7 13l1.1-5"></path>
                                </svg>
                                Add to Cart
                            </span>
                        </button>
                    </form>
                @else
                    <button type="button" class="w-full py-2.5 bg-gray-600/50 text-gray-300 font-semibold rounded-lg cursor-not-allowed backdrop-blur-sm border border-gray-500/30 transition-all duration-300 ease-out group-hover/disabled:opacity-80" disabled>
                        Out of Stock
                    </button>
                @endif

                @if($productId)
                <a href="{{ route('products.show', ['product' => $productId]) }}" class="w-full py-2.5 bg-white/10 hover:bg-white/20 text-white font-semibold rounded-lg transition-all duration-300 ease-out hover:scale-105 backdrop-blur-sm border border-white/20 block text-center hover:shadow-lg hover:shadow-blue-500/20 hover:rotate-[-1deg] transform-gpu group-hover/link:shadow-2xl group-hover/link:shadow-blue-500/40">
                    <span class="flex items-center justify-center gap-2 transition-all duration-300 ease-out group-hover/span:scale-105">
                        <svg class="w-4 h-4 transition-all duration-300 ease-out group-hover/svg:rotate-12 group-hover/svg:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                        </svg>
                        View Details
                    </span>
                </a>
                @else
                <button type="button" class="w-full py-2.5 bg-gray-600/50 text-gray-300 font-semibold rounded-lg cursor-not-allowed backdrop-blur-sm border border-gray-500/30 transition-all duration-300 ease-out" disabled>
                    View Details
                </button>
                @endif
            </div>
        </div>
    </div>
</div>