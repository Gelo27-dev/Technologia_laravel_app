<x-guest-layout>
<style>
/* Glassmorphism Theme */
.glass-card {
    backdrop-filter: blur(16px) saturate(180%);
    -webkit-backdrop-filter: blur(16px) saturate(180%);
    background-color: rgba(255, 255, 255, 0.1);
    border: 1px solid rgba(255, 255, 255, 0.2);
}

/* Floating Animation */
@keyframes float {
    0%, 100% {
        transform: translateY(0px);
    }
    50% {
        transform: translateY(-10px);
    }
}

.animate-float {
    animation: float 6s ease-in-out infinite;
}

/* Price Glow Animation */
@keyframes priceGlow {
    0%, 100% {
        text-shadow: 0 0 5px rgba(255, 165, 0, 0.5), 0 0 10px rgba(255, 165, 0, 0.3);
    }
    50% {
        text-shadow: 0 0 10px rgba(255, 165, 0, 0.8), 0 0 20px rgba(255, 165, 0, 0.5), 0 0 30px rgba(255, 165, 0, 0.3);
    }
}

.animate-price-glow {
    animation: priceGlow 2s ease-in-out infinite;
}

/* Button Glow Animation */
@keyframes buttonGlow {
    0%, 100% {
        box-shadow: 0 0 5px rgba(255, 165, 0, 0.3), 0 0 10px rgba(255, 165, 0, 0.2);
    }
    50% {
        box-shadow: 0 0 10px rgba(255, 165, 0, 0.6), 0 0 20px rgba(255, 165, 0, 0.4), 0 0 30px rgba(255, 165, 0, 0.2);
    }
}

.animate-button-glow:hover {
    animation: buttonGlow 1.5s ease-in-out infinite;
}

/* Stock Pulse Animation */
@keyframes stockPulse {
    0%, 100% {
        box-shadow: 0 0 0 0 rgba(34, 197, 94, 0.4);
    }
    50% {
        box-shadow: 0 0 0 4px rgba(34, 197, 94, 0);
    }
}

.animate-stock-pulse {
    animation: stockPulse 2s infinite;
}

/* Pulse Border Animation */
@keyframes pulseBorder {
    0%, 100% {
        border-color: transparent;
        box-shadow: 0 0 0 0 rgba(255, 165, 0, 0);
    }
    50% {
        border-color: rgba(255, 165, 0, 0.5);
        box-shadow: 0 0 0 2px rgba(255, 165, 0, 0.3), 0 0 0 4px rgba(255, 165, 0, 0.1);
    }
}

.animate-pulse-border {
    animation: pulseBorder 2s ease-in-out infinite;
}

/* Orange-Blue Gradient Animation */
@keyframes gradientShift {
    0%, 100% {
        background-position: 0% 50%;
    }
    50% {
        background-position: 100% 50%;
    }
}

.animate-gradient {
    background: linear-gradient(-45deg, #ff6b35, #007bff, #ff6b35, #007bff);
    background-size: 400% 400%;
    animation: gradientShift 4s ease infinite;
}

/* Background with Glassmorphism */
body {
    background: linear-gradient(135deg, #0f0f23 0%, #1a1a2e 25%, #16213e 50%, #0f0f23 75%, #1a1a2e 100%);
    background-size: 400% 400%;
    animation: gradientShift 8s ease infinite;
    min-height: 100vh;
}

/* Enhanced Scrollbar */
.scrollbar-hide {
    -ms-overflow-style: none;
    scrollbar-width: none;
}
.scrollbar-hide::-webkit-scrollbar {
    display: none;
}

/* Header Glassmorphism */
.glass-header {
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(20px);
    -webkit-backdrop-filter: blur(20px);
    border-bottom: 1px solid rgba(255, 255, 255, 0.2);
}

/* Loading Animation */
@keyframes shimmer {
    0% {
        background-position: -200px 0;
    }
    100% {
        background-position: calc(200px + 100%) 0;
    }
}

.loading-shimmer {
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.1), transparent);
    background-size: 200px 100%;
    animation: shimmer 1.5s infinite;
}
</style>

<div class="w-full px-4 py-6 text-white min-h-screen">
    <!-- Header Section -->
    <div class="glass-header mb-8 sticky top-0 z-50 animate-gradient">
        <div class="w-full px-4 sm:px-6 py-4">
            <div class="flex flex-col gap-4">
                <!-- Top Row: Back to Shop and Title -->
                <div class="flex flex-col sm:flex-row gap-3 sm:gap-4 sm:items-center">
                    <!-- Back to Shop -->
                    <a href="{{ route('shop.index') }}" class="flex items-center space-x-2 text-gray-300 hover:text-white transition duration-300">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                        </svg>
                        <span>Back to Shop</span>
                    </a>

                    <!-- Title -->
                    <div class="flex-1">
                        <h1 class="text-2xl font-bold text-white flex items-center gap-3">
                            <span class="text-[#ff4500]">❤️ My Favorites</span>
                            <div class="w-2 h-8 bg-gradient-to-b from-orange-400 to-blue-500 rounded-full animate-pulse"></div>
                        </h1>
                        <p class="text-gray-400 text-sm mt-1">{{ $favorites->total() }} favorite products</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Favorites Grid -->
    @if($favorites->count() > 0)
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 px-4">
            @foreach($favorites as $product)
                <x-product-card :product="$product" context="favorites" />
            @endforeach
        </div>

        <!-- Pagination -->
        @if($favorites->hasPages())
            <div class="mt-8 flex justify-center">
                <div class="glass-card p-4 rounded-xl">
                    {{ $favorites->appends(request()->query())->links() }}
                </div>
            </div>
        @endif
    @else
        <!-- Empty State -->
        <div class="text-center py-12">
            <div class="glass-card inline-block p-8 rounded-2xl">
                <svg class="w-16 h-16 text-gray-400 mx-auto mb-4 animate-float" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                </svg>
                <h3 class="text-xl font-bold text-white mb-2">No favorites yet</h3>
                <p class="text-gray-300 mb-6">Start adding products to your favorites to see them here!</p>
                <a href="{{ route('shop.index') }}" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-orange-500 to-orange-600 hover:from-orange-600 hover:to-orange-700 text-white font-bold rounded-lg transition-all duration-300 hover:scale-105 hover:shadow-lg hover:shadow-orange-500/40">
                    <span class="flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                        </svg>
                        Browse Products
                    </span>
                </a>
            </div>
        </div>
    @endif
</div>
</x-guest-layout>