<x-guest-layout>
<style>
.product-detail-container {
    background: linear-gradient(135deg, #1a1a1a 0%, #2d2d2d 100%);
    min-height: 100vh;
}

.product-image {
    border-radius: 12px;
    box-shadow: 0 10px 30px rgba(255, 69, 0, 0.2);
    transition: transform 0.3s ease;
}

.product-image:hover {
    transform: scale(1.05);
}

.specs-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 1rem;
    margin-top: 2rem;
}

.spec-item {
    background: rgba(255, 255, 255, 0.05);
    border: 1px solid rgba(255, 69, 0, 0.2);
    border-radius: 8px;
    padding: 1rem;
    text-align: center;
    transition: all 0.3s ease;
}

.spec-item:hover {
    background: rgba(255, 69, 0, 0.1);
    border-color: #ff4500;
    transform: translateY(-2px);
}

.quantity-selector {
    display: flex;
    align-items: center;
    border: 1px solid #374151;
    border-radius: 8px;
    background: #1f2937;
    width: fit-content;
}

.quantity-btn {
    padding: 0.5rem 1rem;
    background: transparent;
    border: none;
    color: white;
    cursor: pointer;
    transition: background 0.2s;
}

.quantity-btn:hover {
    background: #374151;
}

.quantity-input {
    width: 4rem;
    text-align: center;
    background: transparent;
    border: none;
    color: white;
    font-weight: bold;
}

.back-btn {
    background: linear-gradient(45deg, #ff4500, #ff6347);
    border: none;
    color: white;
    padding: 0.75rem 1.5rem;
    border-radius: 8px;
    font-weight: bold;
    transition: all 0.3s ease;
    margin-bottom: 2rem;
}

.back-btn:hover {
    background: linear-gradient(45deg, #ff6347, #ff7f50);
    transform: translateY(-2px);
    box-shadow: 0 4px 15px rgba(255, 69, 0, 0.3);
}
</style>

<div class="product-detail-container py-8 px-4">
    <div class="max-w-6xl mx-auto">
        <!-- Back Button -->
        <a href="{{ route('shop.index') }}" class="back-btn inline-flex items-center">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
            Back to Shop
        </a>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- Product Image -->
            <div class="flex justify-center">
                <img src="{{ $product->image ? asset('storage/' . $product->image) : 'https://via.placeholder.com/500' . urlencode($product->name) }}"
                     alt="{{ $product->name }}"
                     class="product-image w-full max-w-md h-auto object-cover">
            </div>

            <!-- Product Details -->
            <div class="text-white">
                <!-- Category -->
                <p class="text-gray-400 text-sm mb-2">{{ $product->category->name ?? 'Uncategorized' }}</p>

                <!-- Product Name -->
                <h1 class="text-4xl font-bold mb-4 text-white">{{ $product->name }}</h1>

                <!-- Price -->
                <p class="text-5xl font-bold text-[#ff4500] mb-6">${{ number_format($product->price, 2) }}</p>

                <!-- Stock Status -->
                <div class="mb-6">
                    @if ($product->stock > 10)
                        <span class="inline-block px-4 py-2 bg-green-900/30 text-green-300 rounded-full text-sm border border-green-700 font-semibold">
                            ✓ In Stock ({{ $product->stock }} available)
                        </span>
                    @elseif ($product->stock > 0)
                        <span class="inline-block px-4 py-2 bg-yellow-900/30 text-yellow-300 rounded-full text-sm border border-yellow-700 font-semibold">
                            ⚠ Low Stock ({{ $product->stock }} left)
                        </span>
                    @else
                        <span class="inline-block px-4 py-2 bg-red-900/30 text-red-300 rounded-full text-sm border border-red-700 font-semibold">
                            ✗ Out of Stock
                        </span>
                    @endif
                </div>

                <!-- Description -->
                <div class="mb-8">
                    <h3 class="text-xl font-semibold mb-3 text-white">Description</h3>
                    <p class="text-gray-300 leading-relaxed">{{ $product->description ?? 'No description available.' }}</p>
                </div>

                <!-- Add to Cart Form -->
                @if($product->stock > 0)
                <form action="{{ route('cart.store') }}" method="POST" class="space-y-4">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">

                    <!-- Quantity Selector -->
                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-2">Quantity</label>
                        <div class="quantity-selector">
                            <button type="button" class="quantity-btn" onclick="decrementQuantity()">−</button>
                            <input type="number" name="quantity" id="quantity" value="1" min="1" max="{{ $product->stock }}"
                                   class="quantity-input" readonly>
                            <button type="button" class="quantity-btn" onclick="incrementQuantity()">+</button>
                        </div>
                    </div>

                    <!-- Add to Cart Button -->
                    <button type="submit" class="w-full py-4 bg-[#ff4500] text-white font-bold text-lg rounded-lg hover:bg-[#ff5a1a] transition duration-300 transform hover:scale-105">
                        🛒 Add to Cart - ${{ number_format($product->price, 2) }}
                    </button>
                </form>
                @else
                <div class="bg-red-900/20 border border-red-700 rounded-lg p-4">
                    <p class="text-red-300 font-semibold">This product is currently out of stock.</p>
                </div>
                @endif
            </div>
        </div>

        <!-- Product Specifications -->
        <div class="mt-12">
            <h2 class="text-2xl font-bold text-white mb-6">📋 Product Specifications</h2>
            <div class="specs-grid">
                <div class="spec-item">
                    <div class="text-[#ff4500] text-2xl mb-2">🏷️</div>
                    <h4 class="font-semibold text-white mb-1">Product ID</h4>
                    <p class="text-gray-400">#{{ $product->id }}</p>
                </div>

                <div class="spec-item">
                    <div class="text-[#ff4500] text-2xl mb-2">📦</div>
                    <h4 class="font-semibold text-white mb-1">Category</h4>
                    <p class="text-gray-400">{{ $product->category->name ?? 'Uncategorized' }}</p>
                </div>

                <div class="spec-item">
                    <div class="text-[#ff4500] text-2xl mb-2">💰</div>
                    <h4 class="font-semibold text-white mb-1">Price</h4>
                    <p class="text-gray-400">${{ number_format($product->price, 2) }}</p>
                </div>

                <div class="spec-item">
                    <div class="text-[#ff4500] text-2xl mb-2">📊</div>
                    <h4 class="font-semibold text-white mb-1">Stock Level</h4>
                    <p class="text-gray-400">{{ $product->stock }} units</p>
                </div>

                <div class="spec-item">
                    <div class="text-[#ff4500] text-2xl mb-2">⭐</div>
                    <h4 class="font-semibold text-white mb-1">Quality</h4>
                    <p class="text-gray-400">Premium Grade</p>
                </div>

                <div class="spec-item">
                    <div class="text-[#ff4500] text-2xl mb-2">🔧</div>
                    <h4 class="font-semibold text-white mb-1">Warranty</h4>
                    <p class="text-gray-400">1 Year Included</p>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function incrementQuantity() {
    const input = document.getElementById('quantity');
    const max = parseInt(input.getAttribute('max'));
    const current = parseInt(input.value);
    if (current < max) {
        input.value = current + 1;
    }
}

function decrementQuantity() {
    const input = document.getElementById('quantity');
    const current = parseInt(input.value);
    if (current > 1) {
        input.value = current - 1;
    }
}
</script>
</x-guest-layout>