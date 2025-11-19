<x-guest-layout>
<style>
/* Components */
.glass-card {
    backdrop-filter: blur(16px) saturate(180%);
    -webkit-backdrop-filter: blur(16px) saturate(180%);
    background-color: rgba(255, 255, 255, 0.1);
    border: 1px solid rgba(255, 255, 255, 0.2);
}

/* Animations */
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

/* Header Glow Animation */
@keyframes headerGlow {
    0%, 100% {
        text-shadow: 0 0 10px rgba(249, 115, 22, 0.5), 0 0 20px rgba(249, 115, 22, 0.3), 0 0 30px rgba(249, 115, 22, 0.2);
    }
    50% {
        text-shadow: 0 0 20px rgba(249, 115, 22, 0.8), 0 0 40px rgba(249, 115, 22, 0.6), 0 0 60px rgba(249, 115, 22, 0.4), 0 0 80px rgba(249, 115, 22, 0.2);
    }
}

.animate-pulse-glow {
    animation: headerGlow 3s ease-in-out infinite;
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

/* Layout */
body {
    background: linear-gradient(135deg, #0f0f23 0%, #1a1a2e 25%, #16213e 50%, #0f0f23 75%, #1a1a2e 100%);
    min-height: 100vh;
    padding-bottom: 2rem;
}

/* Modern Card Hover Effects */
.product-card-hover {
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}

.product-card-hover:hover {
    transform: translateY(-4px) scale(1.02);
    box-shadow: 0 20px 40px rgba(255, 165, 0, 0.15);
}

/* Improved Button Styles */
.btn-modern {
    background: linear-gradient(135deg, #ff6b35 0%, #f7931e 100%);
    border: none;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}

.btn-modern::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
    transition: left 0.5s;
}

.btn-modern:hover::before {
    left: 100%;
}

.btn-modern:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(255, 107, 53, 0.4);
}

/* Utilities */
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

/* Category Pills Enhancement */
.category-pill {
    background: rgba(0, 0, 0, 0.4);
    backdrop-filter: blur(10px);
    -webkit-backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.3);
    color: rgba(255, 255, 255, 0.9);
    transition: all 0.3s ease;
}

.category-pill:hover {
    background: rgba(255, 165, 0, 0.3);
    border-color: rgba(255, 165, 0, 0.6);
    color: white;
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(255, 165, 0, 0.4);
}

/* Enhanced Active Effects for Category Navigation */
.category-active {
    background: rgba(0, 123, 255, 0.5) !important;
    border-color: rgba(0, 123, 255, 0.8) !important;
    color: white !important;
    box-shadow: 0 8px 25px rgba(0, 123, 255, 0.5) !important;
}

/* Enhanced Button Interactions */
.category-pill {
    cursor: pointer;
}

.category-pill:active {
    transform: scale(0.98);
    transition: transform 0.1s ease;
}

/* Filter Button Enhancement */
.filter-btn {
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(10px);
    -webkit-backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.2);
    transition: all 0.3s ease;
}

.filter-btn:hover {
    background: rgba(0, 123, 255, 0.2);
    border-color: rgba(0, 123, 255, 0.5);
    box-shadow: 0 8px 25px rgba(0, 123, 255, 0.3);
}

/* Search Bar Enhancement */
.search-input {
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(10px);
    -webkit-backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.2);
}

.search-input:focus {
    border-color: rgba(255, 165, 0, 0.5);
    box-shadow: 0 0 0 3px rgba(255, 165, 0, 0.1);
}

/* Product Slider Styles */
.slider-container {
    display: flex;
    overflow-x: auto;
    scroll-behavior: smooth;
    scrollbar-width: none; /* Firefox */
    -ms-overflow-style: none; /* IE and Edge */
    scroll-snap-type: x mandatory;
}
.slider-container::-webkit-scrollbar {
    display: none; /* Chrome, Safari, and Opera */
}

.slider-container > * {
    flex-shrink: 0;
    scroll-snap-align: start;
}

/* Base Sizing and Layout */
html {
    font-size: 16px;
}

@media (max-width: 1536px) {
    html {
        font-size: 15px;
    }
}

@media (max-width: 1280px) {
    html {
        font-size: 14px;
    }
}

@media (max-width: 1024px) {
    html {
        font-size: 13px;
    }
    .search-input {
        max-width: 100%;
    }
}

@media (max-width: 768px) {
    /* Mobile Search Bar */
    .flex-1.max-w-sm.lg\\:max-w-md.xl\\:max-w-lg {
        max-width: 100%;
    }

    /* Mobile Category Navigation */
    .flex.flex-wrap.sm\\:flex-nowrap {
        justify-content: flex-start;
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
    }

    /* Mobile Filter Dropdown */
    .absolute.top-full.right-0.mt-4.w-80 {
        right: -1rem;
        left: -1rem;
        width: auto;
        max-width: calc(100vw - 2rem);
    }

    /* Mobile Header Layout */
    .flex.flex-col.lg\\:flex-row.gap-3.lg\\:gap-4.lg\\:items-center.lg\\:justify-center {
        gap: 1rem;
    }

    /* Mobile Search Button */
    .px-6.py-3.bg-gradient-to-r.from-orange-500.to-orange-600 {
        padding: 0.75rem 1rem;
        font-size: 0.875rem;
    }

    /* Mobile Filter Button */
    .px-4.py-3.rounded-2xl {
        padding: 0.75rem;
    }

    .hidden.sm\\:inline {
        display: none !important;
    }

    /* Mobile Product Cards */
    .group\\/product.relative.flex-shrink-0.w-72 {
        width: 280px;
    }

    .h-\\[420px\\] {
        height: 380px;
    }

    /* Mobile Section Spacing */
    .mb-10 {
        margin-bottom: 2rem;
    }

    .px-12.py-3 {
        padding-left: 1rem;
        padding-right: 1rem;
    }
}

@media (max-width: 640px) {
    .glass-card {
        margin: 0 0.5rem;
    }

    /* Extra Small Screens */
    .px-4.sm\\:px-6 {
        padding-left: 1rem;
        padding-right: 1rem;
    }

    /* Mobile Category Pills */
    .px-3.sm\\:px-4.py-2.sm\\:py-3.text-xs.sm\\:text-sm {
        padding: 0.375rem 0.5rem;
        font-size: 0.75rem;
    }

    /* Mobile Dropdowns */
    .w-64, .w-72, .w-80 {
        width: calc(100vw - 2rem);
        max-width: none;
    }

    /* Mobile Form Elements */
    .grid.grid-cols-2.gap-3 {
        gap: 0.5rem;
    }

    .w-full.pl-8.pr-3.py-3 {
        padding: 0.75rem 0.5rem 0.75rem 2rem;
    }

    /* Mobile Action Buttons */
    .flex.gap-3.pt-6 {
        flex-direction: column;
        gap: 0.75rem;
    }

    .flex-1.px-6.py-3, .px-6.py-3 {
        padding: 0.75rem 1rem;
    }
}

@media (max-width: 480px) {
    /* Very Small Screens */
    .text-lg.font-semibold.text-white.mb-3 {
        font-size: 1rem;
    }

    .text-base.font-semibold.text-white.truncate {
        font-size: 0.875rem;
    }

    .text-lg.font-bold.text-orange-400 {
        font-size: 1rem;
    }
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
<div class="w-full px-6 py-8 text-white min-h-screen max-w-7xl mx-auto pb-16"
     x-data='{
         showFilterOptions: false,
         products: @json($products->items()),
         pagination: {
             current_page: {{ $products->currentPage() }},
             last_page: {{ $products->lastPage() }},
             per_page: {{ $products->perPage() }},
             total: {{ $products->total() }}
         },
         loading: false,
         categoryPopups: {},
         loadProducts(page = 1) {
             this.loading = true;
             let url = "/api/products?page=" + page;
             fetch(url, {
                 headers: {
                     "X-Requested-With": "XMLHttpRequest",
                     "Accept": "application/json"
                 }
             })
             .then(response => response.json())
             .then(data => {
                 this.products = data.products;
                 this.pagination = data.pagination;
                 this.loading = false;
             })
             .catch(error => {
                 console.error("Load error:", error);
                 this.loading = false;
             });
         },
         loadPage(page) {
             if (page >= 1 && page <= this.pagination.last_page) {
                 this.loadProducts(page);
             }
         }
     }'>
<div class="glass-header mb-10 sticky top-0 z-50 animate-gradient">
    <div class="w-full px-12 py-12">
        <div class="flex flex-col gap-8">
            <div class="flex flex-col lg:flex-row gap-3 lg:gap-4 lg:items-center lg:justify-center">
                <div class="flex-1 max-w-sm lg:max-w-md xl:max-w-lg relative group"
                     x-data="{
                         showAdvanced: false,
                         showSuggestions: false,
                         showHistory: false,
                         searchQuery: @json(request('search')),
                         suggestions: [],
                         searchHistory: JSON.parse(localStorage.getItem('searchHistory') || '[]'),
                         isLoading: false,
                         selectedIndex: -1,
                         fetchSuggestions() {
                             if (this.searchQuery.length < 2) {
                                 this.suggestions = [];
                                 this.showSuggestions = false;
                                 return;
                             }
                             this.isLoading = true;
                             fetch('/api/search-suggestions?q=' + encodeURIComponent(this.searchQuery))
                                 .then(response => response.json())
                                 .then(data => {
                                     this.suggestions = data;
                                     this.showSuggestions = data.length > 0;
                                     this.isLoading = false;
                                 })
                                 .catch(() => {
                                     this.suggestions = [];
                                     this.showSuggestions = false;
                                     this.isLoading = false;
                                 });
                         },
                         addToHistory(query) {
                             if (!query.trim()) return;
                             this.searchHistory = this.searchHistory.filter(item => item !== query);
                             this.searchHistory.unshift(query);
                             this.searchHistory = this.searchHistory.slice(0, 5);
                             localStorage.setItem('searchHistory', JSON.stringify(this.searchHistory));
                         },
                         removeFromHistory(index) {
                             this.searchHistory.splice(index, 1);
                             localStorage.setItem('searchHistory', JSON.stringify(this.searchHistory));
                         },
                         clearHistory() {
                             this.searchHistory = [];
                             localStorage.removeItem('searchHistory');
                             this.showHistory = false;
                         },
                         selectSuggestion(index) {
                             if (this.suggestions[index]) {
                                 window.location.href = this.suggestions[index].url;
                             }
                         }
                     }"
                     x-init="$watch('searchQuery', (value) => fetchSuggestions())">

                    <form action="{{ route('shop.index') }}" method="GET" class="flex relative group/search" @submit="addToHistory(searchQuery)">
                        <div class="absolute left-4 top-1/2 transform -translate-y-1/2 z-10">
                            <svg class="w-5 h-5 text-gray-400 group-focus-within/search:text-orange-400 transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>

                        <input type="text"
                               x-model="searchQuery"
                               name="search"
                               placeholder="Search for amazing products..."
                               @focus="showHistory = searchQuery.length === 0 && searchHistory.length > 0; showAdvanced = false"
                               @blur="setTimeout(() => { showSuggestions = false; showHistory = false; }, 200)"
                               @keydown.arrow-down.prevent="if (showSuggestions && selectedIndex < suggestions.length - 1) selectedIndex++"
                               @keydown.arrow-up.prevent="if (showSuggestions && selectedIndex > 0) selectedIndex--"
                               @keydown.enter.prevent="if (showSuggestions && selectedIndex >= 0) selectSuggestion(selectedIndex)"
                               class="search-input flex-1 pl-12 pr-12 py-3 text-white placeholder-gray-400 transition-all duration-300 text-base rounded-l-xl border-r-0 focus:ring-2 focus:ring-orange-400/50 focus:border-orange-400/50 backdrop-blur-xl bg-white/10 hover:bg-white/15" />

                        <!-- Loading indicator -->
                        <div x-show="isLoading" class="absolute right-16 top-1/2 transform -translate-y-1/2 z-10">
                            <svg class="animate-spin w-5 h-5 text-orange-400" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                        </div>

                        <!-- Voice Search Button (Optional) -->
                        <button type="button" class="px-3 py-3 bg-white/10 hover:bg-white/20 text-gray-300 hover:text-white transition-all duration-300 border-r border-white/20 group/voice"
                                title="Voice Search">
                            <svg class="w-5 h-5 group-hover/voice:text-orange-400 transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-8a3 3 0 01-3-3V5a3 3 0 116 0v6a3 3 0 01-3 3z"></path>
                            </svg>
                        </button>

                        <button type="submit" class="px-6 py-3 bg-gradient-to-r from-orange-500 to-orange-600 hover:from-orange-600 hover:to-orange-700 text-white rounded-r-xl transition-all duration-300 font-semibold text-base hover:scale-105 hover:shadow-lg hover:shadow-orange-500/30 border border-orange-500/50">
                            <span class="flex items-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                                Search
                            </span>
                        </button>
                    </form>

                    <!-- Enhanced Search History Dropdown -->
                    <div x-show="showHistory"
                         x-transition:enter="transition ease-out duration-300"
                         x-transition:enter-start="opacity-0 transform scale-95 translate-y-2"
                         x-transition:enter-end="opacity-100 transform scale-100 translate-y-0"
                         x-transition:leave="transition ease-in duration-200"
                         x-transition:leave-start="opacity-100 transform scale-100 translate-y-0"
                         x-transition:leave-end="opacity-0 transform scale-95 translate-y-2"
                         class="absolute top-full left-0 right-0 mt-3 glass-card rounded-2xl shadow-2xl z-50 max-h-80 overflow-hidden border border-white/20">

                        <div class="p-4 border-b border-white/20 flex items-center justify-between bg-gradient-to-r from-orange-500/10 to-blue-500/10">
                            <div class="flex items-center gap-2">
                                <svg class="w-5 h-5 text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <h4 class="text-base font-semibold text-white">Recent Searches</h4>
                            </div>
                            <button @click="clearHistory" class="text-sm text-gray-300 hover:text-red-400 transition-colors duration-300 hover:scale-105 px-2 py-1 rounded-lg hover:bg-red-500/20">
                                Clear All
                            </button>
                        </div>

                        <div class="max-h-64 overflow-y-auto scrollbar-hide">
                            <template x-for="(query, index) in searchHistory" :key="index">
                                <div class="flex items-center justify-between px-4 py-3 hover:bg-white/10 cursor-pointer group transition-all duration-300 hover:scale-[1.02] border-b border-white/5 last:border-b-0"
                                     @click="searchQuery = query; showHistory = false; $nextTick(() => $el.closest('form').submit())">
                                    <div class="flex items-center space-x-3">
                                        <div class="w-8 h-8 rounded-full bg-orange-500/20 flex items-center justify-center">
                                            <svg class="w-4 h-4 text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                            </svg>
                                        </div>
                                        <span class="text-sm text-gray-200 font-medium" x-text="query"></span>
                                    </div>
                                    <button @click.stop="removeFromHistory(index)" class="opacity-0 group-hover:opacity-100 text-gray-400 hover:text-red-400 transition-all duration-300 hover:scale-110 p-1 rounded-lg hover:bg-red-500/20">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                        </svg>
                                    </button>
                                </div>
                            </template>
                        </div>
                    </div>

                    <!-- Enhanced Autocomplete Suggestions -->
                    <div x-show="showSuggestions"
                         x-transition:enter="transition ease-out duration-300"
                         x-transition:enter-start="opacity-0 transform scale-95 translate-y-2"
                         x-transition:enter-end="opacity-100 transform scale-100 translate-y-0"
                         x-transition:leave="transition ease-in duration-200"
                         x-transition:leave-start="opacity-100 transform scale-100 translate-y-0"
                         x-transition:leave-end="opacity-0 transform scale-95 translate-y-2"
                         class="absolute top-full left-0 right-0 mt-3 glass-card rounded-2xl shadow-2xl z-50 max-h-96 overflow-hidden border border-white/20">

                        <div class="p-3 bg-gradient-to-r from-blue-500/10 to-purple-500/10 border-b border-white/20">
                            <div class="flex items-center gap-2">
                                <svg class="w-5 h-5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                                </svg>
                                <h4 class="text-base font-semibold text-white">Search Suggestions</h4>
                            </div>
                        </div>

                        <div class="max-h-80 overflow-y-auto scrollbar-hide">
                            <template x-for="(suggestion, index) in suggestions" :key="suggestion.id">
                                <a :href="suggestion.url"
                                   :class="{ 'bg-orange-500/20 border-l-4 border-orange-400': selectedIndex === index }"
                                   class="flex items-center space-x-4 p-4 hover:bg-white/10 rounded-lg transition-all duration-300 cursor-pointer group hover:scale-[1.02] border-b border-white/5 last:border-b-0">
                                    <div class="relative">
                                        <img :src="suggestion.image" :alt="suggestion.name" class="w-12 h-12 object-cover rounded-xl shadow-lg group-hover:shadow-orange-500/30 transition-shadow duration-300" />
                                        <div class="absolute -top-1 -right-1 w-4 h-4 bg-green-500 rounded-full border-2 border-white"></div>
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <div class="text-base font-semibold text-white truncate group-hover:text-orange-400 transition-colors duration-300" x-text="suggestion.name"></div>
                                        <div class="text-sm text-gray-400 flex items-center gap-1">
                                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                                            </svg>
                                            <span x-text="suggestion.category"></span>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <div class="text-lg font-bold text-orange-400 animate-price-glow" x-text="'$' + suggestion.price"></div>
                                        <div class="text-xs text-green-400 font-medium">In Stock</div>
                                    </div>
                                </a>
                            </template>
                        </div>
                    </div>


            </div>

            <!-- Enhanced Categories Navigation -->
            <div class="border-t border-white/20 pt-4 sm:pt-6 relative">
                <div class="flex justify-center">
                    <!-- Category Pills Container -->
                    <div class="flex flex-wrap items-center justify-center gap-2 sm:gap-3 max-w-full px-2 sm:px-4 pb-2">
                        <a href="{{ route('shop.index', request()->only('search')) }}"
                           class="category-pill px-3 sm:px-4 py-2 sm:py-3 text-xs sm:text-sm font-semibold rounded-xl {{ !request('category') ? 'bg-gradient-to-r from-orange-500 to-orange-600 text-white border-orange-400/50 shadow-lg shadow-orange-500/30 animate-pulse' : '' }} transition-all duration-300 whitespace-nowrap flex-shrink-0 hover:scale-105 flex items-center gap-1 sm:gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                            </svg>
                            All Products
                        </a>
                        @php
                            $parentCategories = \App\Models\Category::active()->parents()->with('children')->get();
                            $visibleCategories = $parentCategories->take(6); // Show max 6 categories initially to prevent overload
                            $hiddenCategories = $parentCategories->skip(6);
                        @endphp
                        @foreach($visibleCategories as $parentCategory)
                            <!-- Enhanced Parent Category -->
                            <div class="relative flex-shrink-0 group">
                                @if($parentCategory->children->count() > 0)
                                    <!-- Category with Children - Button to show dropdown -->
                                    <button @click="if (categoryPopups['{{ $parentCategory->id }}']) { categoryPopups['{{ $parentCategory->id }}'] = false; } else { Object.keys(categoryPopups).forEach(key => categoryPopups[key] = false); categoryPopups['{{ $parentCategory->id }}'] = true; }"
                                            @click.away="categoryPopups['{{ $parentCategory->id }}'] = false"
                                            :class="{ 'category-active': categoryPopups['{{ $parentCategory->id }}'], 'bg-gradient-to-r from-blue-500 to-blue-600 text-white border-blue-400/50 shadow-lg shadow-blue-500/30': !categoryPopups['{{ $parentCategory->id }}'] && ({{ request('category') == $parentCategory->id || $parentCategory->children->contains('id', request('category')) ? 'true' : 'false' }}) }"
                                            class="category-pill px-3 sm:px-4 py-2 sm:py-3 text-xs sm:text-sm font-semibold rounded-xl transition-all duration-300 whitespace-nowrap flex items-center gap-1 sm:gap-2 hover:scale-105 group">
                                        @if($parentCategory->icon)
                                            <span class="text-lg">{{ $parentCategory->icon }}</span>
                                        @endif
                                        <span>{{ $parentCategory->name }}</span>
                                        <svg class="w-4 h-4 transition-transform duration-300 group-hover:scale-110" :class="{ 'rotate-180': categoryPopups['{{ $parentCategory->id }}'] }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                        </svg>
                                    </button>
                                @else
                                    <!-- Enhanced Category without Children - Direct Link -->
                                    <a href="{{ route('shop.index', array_merge(request()->only('search'), ['category' => $parentCategory->id])) }}"
                                       class="category-pill px-3 sm:px-4 py-2 sm:py-3 text-xs sm:text-sm font-semibold rounded-xl {{ request('category') == $parentCategory->id ? 'bg-gradient-to-r from-green-500 to-green-600 text-white border-green-400/50 shadow-lg shadow-green-500/30' : '' }} transition-all duration-300 whitespace-nowrap flex items-center gap-1 sm:gap-2 hover:scale-105">
                                        @if($parentCategory->icon)
                                            <span class="text-lg">{{ $parentCategory->icon }}</span>
                                        @endif
                                        <span>{{ $parentCategory->name }}</span>
                                    </a>
                                @endif
                            </div>
                        @endforeach

                        <!-- Enhanced More Categories Dropdown -->
                        @if($hiddenCategories->count() > 0)
                            <div class="relative flex-shrink-0 group" x-data="{ showMore: false }">
                                <button @click="showMore = !showMore"
                                        @click.away="showMore = false"
                                        class="category-pill px-3 sm:px-4 py-2 sm:py-3 text-xs sm:text-sm font-semibold rounded-xl transition-all duration-300 whitespace-nowrap flex items-center gap-1 sm:gap-2 hover:scale-105">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h.01M5 12h.01M5 12h.01"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 5v.01M12 5v.01"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 12h.01M19 12h.01M19 12h.01"></path>
                                    </svg>
                                    <span>More</span>
                                    <svg class="w-4 h-4 transition-transform duration-300 group-hover:scale-110" :class="{ 'rotate-180': showMore }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </button>

                                <div x-show="showMore"
                                     x-transition:enter="transition ease-out duration-300"
                                     x-transition:enter-start="opacity-0 transform scale-95 translate-y-3"
                                     x-transition:enter-end="opacity-100 transform scale-100 translate-y-0"
                                     x-transition:leave="transition ease-in duration-200"
                                     x-transition:leave-start="opacity-100 transform scale-100 translate-y-0"
                                     x-transition:leave-end="opacity-0 transform scale-95 translate-y-3"
                                     class="absolute top-full right-0 mt-4 w-72 glass-card rounded-2xl shadow-2xl z-50 overflow-hidden border border-white/20"
                                     style="display: none;"
                                     x-cloak>
                                    <div class="p-4 bg-gradient-to-r from-purple-500/10 to-pink-500/10 border-b border-white/20">
                                        <div class="flex items-center gap-2">
                                            <svg class="w-5 h-5 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                                            </svg>
                                            <h4 class="text-base font-semibold text-white">More Categories</h4>
                                            <span class="text-sm text-gray-400">({{ $hiddenCategories->count() }} categories)</span>
                                        </div>
                                    </div>
                                    <div class="max-h-80 overflow-y-auto scrollbar-hide">
                                        @foreach($hiddenCategories as $parentCategory)
                                            <!-- Enhanced Parent Category Link -->
                                            <a href="{{ route('shop.index', array_merge(request()->only('search'), ['category' => $parentCategory->id])) }}"
                                               @click="showMore = false"
                                               class="block px-4 py-3 text-sm text-gray-300 hover:bg-white/10 hover:text-white transition-all duration-300 {{ request('category') == $parentCategory->id || $parentCategory->children->contains('id', request('category')) ? 'bg-gradient-to-r from-purple-500/20 to-purple-600/20 text-purple-300 border-l-4 border-purple-400' : '' }} flex items-center gap-3 group hover:scale-[1.02]">
                                                @if($parentCategory->icon)
                                                    <span class="text-lg">{{ $parentCategory->icon }}</span>
                                                @else
                                                    <div class="w-6 h-6 rounded-full bg-gradient-to-r from-purple-500/20 to-pink-500/20 flex items-center justify-center">
                                                        <svg class="w-3 h-3 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                                                        </svg>
                                                    </div>
                                                @endif
                                                <span class="font-medium">{{ $parentCategory->name }}</span>
                                                @if($parentCategory->children->count() > 0)
                                                    <span class="text-xs text-gray-400 ml-auto">+{{ $parentCategory->children->count() }}</span>
                                                @endif
                                                <svg class="w-4 h-4 ml-auto opacity-0 group-hover:opacity-100 transition-opacity duration-300 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                                </svg>
                                            </a>

                                            <!-- Enhanced Child Categories for Hidden Parents -->
                                            @if($parentCategory->children->count() > 0)
                                                @foreach($parentCategory->children as $childCategory)
                                                    <a href="{{ route('shop.index', array_merge(request()->only('search'), ['category' => $childCategory->id])) }}"
                                                       @click="showMore = false"
                                                       class="block ml-8 pl-4 py-2 text-xs text-gray-400 hover:bg-white/5 hover:text-gray-200 transition-all duration-300 border-l-2 border-white/10 {{ request('category') == $childCategory->id ? 'bg-gradient-to-r from-orange-500/10 to-orange-600/10 text-orange-300 border-orange-400' : '' }} flex items-center gap-2 group hover:scale-[1.01]">
                                                        @if($childCategory->icon)
                                                            <span class="text-sm">{{ $childCategory->icon }}</span>
                                                        @else
                                                            <div class="w-4 h-4 rounded-full bg-gradient-to-r from-orange-500/10 to-orange-600/10 flex items-center justify-center">
                                                                <div class="w-1.5 h-1.5 rounded-full bg-orange-400"></div>
                                                            </div>
                                                        @endif
                                                        <span>{{ $childCategory->name }}</span>
                                                    </a>
                                                @endforeach
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Child Categories Popups Container -->
                <div class="absolute top-full left-0 right-0 z-[10000] pointer-events-none">
                    @foreach($visibleCategories as $parentCategory)
                        @if($parentCategory->children->count() > 0)
                            <!-- Small Child Categories Popup Box -->
                            <div x-show="categoryPopups?.['{{ $parentCategory->id }}'] || false"
                                 x-transition:enter="transition ease-out duration-250"
                                 x-transition:enter-start="opacity-0 transform scale-95 translate-y-1"
                                 x-transition:enter-end="opacity-100 transform scale-100 translate-y-0"
                                 x-transition:leave="transition ease-in duration-200"
                                 x-transition:leave-start="opacity-100 transform scale-100 translate-y-0"
                                 x-transition:leave-end="opacity-0 transform scale-95 translate-y-1"

                                 class="absolute top-3 left-1/2 transform -translate-x-1/2 w-auto min-w-40 glass-card rounded-xl shadow-2xl border border-white/20 p-2 max-h-48 overflow-y-auto scrollbar-hide pointer-events-auto"
                                 style="display: none;"
                                 x-cloak>
                                <div class="text-xs font-medium text-gray-400 mb-2 text-center">{{ $parentCategory->name }}</div>
                                <div class="grid grid-cols-1 gap-1">
                                    @foreach($parentCategory->children as $childCategory)
                                        <a href="{{ route('shop.index', array_merge(request()->only('search'), ['category' => $childCategory->id])) }}"
                                           @click="categoryPopups = {}"
                                           class="block px-2 py-1.5 text-xs text-gray-300 hover:bg-white/10 hover:text-white transition-all duration-200 rounded-lg {{ request('category') == $childCategory->id ? 'bg-gradient-to-r from-orange-500/20 to-orange-600/20 text-orange-300' : '' }} flex items-center gap-1.5 whitespace-nowrap">
                                            @if($childCategory->icon)
                                                <span class="text-sm">{{ $childCategory->icon }}</span>
                                            @else
                                                <div class="w-4 h-4 rounded-full bg-gradient-to-r from-blue-500/20 to-purple-500/20 flex items-center justify-center">
                                                    <svg class="w-2.5 h-2.5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                                                    </svg>
                                                </div>
                                            @endif
                                            <span>{{ $childCategory->name }}</span>
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>




<!-- Featured Product Hero Section -->
@if($products->count() > 0)
@php
    $featuredProduct = $products->first(); // Get the first product as featured, or you can customize this logic
@endphp
<div class="relative mb-20 overflow-hidden">
    <!-- Background Effects -->
    <div class="absolute inset-0 bg-gradient-to-br from-orange-500/10 via-pink-500/5 to-purple-500/10 rounded-3xl blur-3xl transform scale-110"></div>
    <div class="absolute inset-0 bg-gradient-to-r from-blue-500/5 via-transparent to-green-500/5 rounded-3xl"></div>

    <!-- Main Featured Container -->
    <div class="relative bg-gradient-to-r from-white/8 via-white/12 to-white/8 backdrop-blur-xl border border-white/20 rounded-3xl p-8 md:p-12 shadow-2xl shadow-orange-500/20 overflow-hidden">
        <!-- Animated Border -->
        <div class="absolute inset-0 rounded-3xl bg-gradient-to-r from-orange-400 via-pink-500 to-purple-500 opacity-30 animate-pulse"></div>

        <!-- Floating Particles Effect -->
        <div class="absolute top-4 right-4 w-2 h-2 bg-orange-400 rounded-full animate-bounce opacity-60"></div>
        <div class="absolute top-8 right-12 w-1 h-1 bg-pink-400 rounded-full animate-bounce opacity-40" style="animation-delay: 0.5s"></div>
        <div class="absolute bottom-6 left-8 w-1.5 h-1.5 bg-purple-400 rounded-full animate-bounce opacity-50" style="animation-delay: 1s"></div>

        <div class="relative grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12 items-center">
            <!-- Featured Product Image -->
            <div class="relative group">
                <div class="relative aspect-square max-w-md mx-auto lg:mx-0 overflow-hidden rounded-2xl bg-gradient-to-br from-gray-900/50 to-black/50 shadow-2xl transform group-hover:scale-105 transition-all duration-700 ease-out">
                    <!-- Image Container -->
                    <div class="relative w-full h-full flex items-center justify-center p-8">
                        <img src="{{ $featuredProduct->image ? asset('storage/' . $featuredProduct->image) : 'https://via.placeholder.com/400?text=' . urlencode($featuredProduct->name) }}"
                             alt="{{ $featuredProduct->name }}"
                             class="w-full h-full object-contain transform group-hover:scale-110 transition-transform duration-700 ease-out filter drop-shadow-2xl">

                        <!-- Overlay Effects -->
                        <div class="absolute inset-0 bg-gradient-to-t from-black/20 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                        <div class="absolute inset-0 bg-gradient-to-r from-orange-500/0 via-transparent to-pink-500/0 group-hover:from-orange-500/10 group-hover:to-pink-500/10 transition-all duration-500"></div>
                    </div>

                    <!-- Floating Badge -->
                    <div class="absolute top-4 left-4 bg-gradient-to-r from-orange-500 to-pink-500 text-white px-4 py-2 rounded-full text-sm font-bold shadow-lg animate-float">
                        ⭐ FEATURED
                    </div>

                    <!-- Stock Status Badge -->
                    <div class="absolute top-4 right-4">
                        @if($featuredProduct->stock > 10)
                            <div class="bg-green-500/90 text-white px-3 py-1 rounded-full text-xs font-bold backdrop-blur-sm border border-green-400/50 animate-pulse">
                                ✓ IN STOCK
                            </div>
                        @elseif($featuredProduct->stock > 0)
                            <div class="bg-yellow-500/90 text-white px-3 py-1 rounded-full text-xs font-bold backdrop-blur-sm border border-yellow-400/50">
                                ⚠ LOW STOCK
                            </div>
                        @else
                            <div class="bg-red-500/90 text-white px-3 py-1 rounded-full text-xs font-bold backdrop-blur-sm border border-red-400/50">
                                ✕ OUT OF STOCK
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Image Glow Effect -->
                <div class="absolute -inset-4 bg-gradient-to-r from-orange-500/20 via-pink-500/20 to-purple-500/20 rounded-3xl blur-xl opacity-0 group-hover:opacity-100 transition-opacity duration-500 -z-10"></div>
            </div>

            <!-- Featured Product Details -->
            <div class="text-center lg:text-left space-y-6">
                <!-- Category Badge -->
                <div class="inline-flex items-center gap-2 bg-gradient-to-r from-blue-500/20 to-purple-500/20 backdrop-blur-sm border border-blue-400/30 rounded-full px-4 py-2">
                    <span class="text-blue-300 text-sm font-medium">{{ $featuredProduct->category->name ?? 'Featured' }}</span>
                </div>

                <!-- Product Title -->
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-black text-transparent bg-clip-text bg-gradient-to-r from-white via-orange-200 to-pink-200 leading-tight animate-pulse-glow">
                    {{ $featuredProduct->name }}
                </h1>

                <!-- Product Description -->
                @if($featuredProduct->description)
                <p class="text-gray-300 text-lg md:text-xl leading-relaxed max-w-2xl">
                    {{ Str::limit($featuredProduct->description, 200) }}
                </p>
                @endif

                <!-- Price Section -->
                <div class="bg-gradient-to-r from-orange-500/20 to-pink-500/20 rounded-2xl p-6 border border-orange-400/30 backdrop-blur-sm shadow-lg shadow-orange-500/20">
                    <div class="text-center">
                        <div class="text-sm text-orange-200 font-medium mb-2">Starting Price</div>
                        <div class="text-5xl md:text-6xl font-black text-orange-400 animate-pulse-glow">
                            ${{ number_format($featuredProduct->price, 2) }}
                        </div>
                        @if($featuredProduct->original_price && $featuredProduct->original_price > $featuredProduct->price)
                        <div class="text-xl text-gray-400 line-through mt-2">
                            ${{ number_format($featuredProduct->original_price, 2) }}
                        </div>
                        @endif
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
                    @if($featuredProduct->stock > 0)
                    <form action="{{ route('cart.store') }}" method="POST" class="flex-1 max-w-xs">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $featuredProduct->id }}">
                        <input type="hidden" name="quantity" value="1">
                        <button type="submit" class="w-full bg-gradient-to-r from-orange-500 to-pink-500 hover:from-orange-600 hover:to-pink-600 text-white font-bold py-4 px-8 rounded-2xl transition-all duration-300 hover:scale-105 hover:shadow-2xl hover:shadow-orange-500/40 transform-gpu flex items-center justify-center gap-3 group">
                            <svg class="w-6 h-6 group-hover:rotate-12 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4m0 0L7 13m0 0l-1.1 5H19M7 13l-1.1 5M7 13l1.1-5"></path>
                            </svg>
                            <span class="text-lg">Add to Cart</span>
                        </button>
                    </form>
                    @endif

                    <a href="{{ route('products.show', $featuredProduct) }}" class="flex-1 max-w-xs bg-white/10 hover:bg-white/20 text-white font-bold py-4 px-8 rounded-2xl transition-all duration-300 hover:scale-105 backdrop-blur-sm border border-white/20 flex items-center justify-center gap-3 group">
                        <svg class="w-6 h-6 group-hover:rotate-12 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                        </svg>
                        <span class="text-lg">View Details</span>
                    </a>
                </div>

                <!-- Additional Info -->
                <div class="flex items-center justify-center lg:justify-start gap-6 text-sm text-gray-400">
                    <div class="flex items-center gap-2">
                        <div class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></div>
                        <span>Premium Quality</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <div class="w-2 h-2 bg-blue-400 rounded-full animate-pulse" style="animation-delay: 0.5s"></div>
                        <span>Fast Shipping</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <div class="w-2 h-2 bg-purple-400 rounded-full animate-pulse" style="animation-delay: 1s"></div>
                        <span>30-Day Returns</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif

<div id="status-message" class="mb-6" x-data="{ show: false, message: '', type: '' }"
     x-show="show"
     x-transition:enter="transition ease-out duration-300"
     x-transition:enter-start="opacity-0 transform translate-y-3"
     x-transition:enter-end="opacity-100 transform translate-y-0"
     x-transition:leave="transition ease-in duration-200"
     x-transition:leave-start="opacity-100 transform translate-y-0"
     x-transition:leave-end="opacity-0 transform translate-y-3"
     :class="{ 'glass-card border-green-400/50 text-green-300': type === 'success', 'glass-card border-red-400/50 text-red-300': type === 'error' }"
     role="alert" style="display: none;">
    <div class="p-4 rounded-xl backdrop-blur-lg" x-text="message"></div>
</div>

<!-- All Categories Display -->
@if($productsByCategory)
    @foreach($productsByCategory as $categoryData)
        <div class="mb-10">
            <h2 class="text-2xl font-bold text-white mb-5 flex items-center ml-6">
                <span class="text-[#ff4500] mr-3">{{ $categoryData['category']->name }}</span>
                <span class="text-sm text-gray-400 bg-gray-800/50 px-2 py-1 rounded-full">({{ $categoryData['products']->count() }} products)</span>
                <div class="w-2 h-8 bg-gradient-to-b from-blue-400 to-purple-500 rounded-full animate-pulse ml-2"></div>
            </h2>

            <div class="relative px-12 py-3">
                <div class="relative overflow-hidden rounded-2xl">
                    <button class="slider-prev-{{ $categoryData['category']->id }} absolute left-2 top-1/2 transform -translate-y-1/2 z-20 bg-black/80 hover:bg-black/90 text-white p-3 rounded-full backdrop-blur-xl border border-white/30 transition-all duration-300 hover:scale-110 shadow-xl">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                        </svg>
                    </button>
                    <button class="slider-next-{{ $categoryData['category']->id }} absolute right-2 top-1/2 transform -translate-y-1/2 z-20 bg-black/80 hover:bg-black/90 text-white p-3 rounded-full backdrop-blur-xl border border-white/30 transition-all duration-300 hover:scale-110 shadow-xl">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </button>

                    <!-- Product Slider -->
                    <div class="slider-container-{{ $categoryData['category']->id }} slider-container flex gap-5 px-6 py-5 overflow-x-auto scroll-smooth">
                        @foreach($categoryData['products'] as $product)
                            <div class="group/product relative flex-shrink-0 w-72">
                                <!-- Modern Product Card -->
                                <div class="bg-white/5 backdrop-blur-lg border border-white/20 rounded-2xl overflow-hidden hover:bg-white/10 hover:border-white/30 transition-all duration-300 hover:scale-[1.02] hover:shadow-2xl hover:shadow-purple-500/20 h-[420px] flex flex-col shadow-lg">
                                    <!-- Product Image -->
                                    <div class="relative aspect-square overflow-hidden bg-gray-900/50">
                                        <img class="w-full h-full object-contain transition-transform duration-500 group-hover/product:scale-105"
                                             src="{{ $product->image ? asset('storage/' . $product->image) : 'https://via.placeholder.com/400?text=' . urlencode($product->name) }}"
                                             alt="{{ $product->name }}">
                                        <div class="absolute top-3 right-3">
                                            @auth
                                                <form action="{{ route('favorites.toggle', $product) }}" method="POST" class="inline">
                                                    @csrf
                                                    <button type="submit" class="p-2 rounded-full bg-black/50 hover:bg-black/70 text-white backdrop-blur-sm border border-white/20 transition-all duration-300 hover:scale-110" title="{{ auth()->user()->favoriteProducts()->where('product_id', $product->id)->exists() ? 'Remove from favorites' : 'Add to favorites' }}">
                                                        <svg class="w-4 h-4 {{ auth()->user()->favoriteProducts()->where('product_id', $product->id)->exists() ? 'text-red-400 fill-current' : 'text-white' }} transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                                        </svg>
                                                    </button>
                                                </form>
                                            @else
                                                <a href="{{ route('login') }}" class="inline-block p-2 rounded-full bg-black/50 hover:bg-black/70 text-white backdrop-blur-sm border border-white/20 transition-all duration-300 hover:scale-110" title="Login to add to favorites">
                                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                                    </svg>
                                                </a>
                                            @endauth
                                        </div>
                                        <!-- Category Badge -->
                                        <div class="absolute top-3 left-3">
                                            <span class="px-2 py-1 bg-purple-500/80 text-purple-100 text-xs font-medium rounded-lg backdrop-blur-sm">
                                                {{ $product->category->name ?? 'Uncategorized' }}
                                            </span>
                                        </div>
                                    </div>

                                    <!-- Product Details -->
                                    <div class="p-5 flex-1 flex flex-col">
                                        <!-- Category Badge -->
                                        <div class="mb-4">
                                            <span class="px-3 py-1 bg-blue-500/30 text-blue-200 text-xs font-medium rounded-full border border-blue-400/40 backdrop-blur-sm">
                                                {{ $product->category->name ?? 'Uncategorized' }}
                                            </span>
                                        </div>

                                        <!-- Product Name -->
                                        <h3 class="text-lg font-bold text-white mb-4 group-hover/product:text-orange-400 transition-colors duration-300 leading-tight line-clamp-2 min-h-[3.5rem] flex items-start">
                                            {{ $product->name }}
                                        </h3>

                                        <!-- Price -->
                                        <div class="flex items-center justify-between mb-5">
                                            <div class="flex flex-col">
                                                <span class="text-2xl font-bold text-orange-400 animate-price-glow">${{ number_format($product->price, 2) }}</span>
                                                @if($product->original_price && $product->original_price > $product->price)
                                                    <span class="text-sm text-gray-300 line-through">${{ number_format($product->original_price, 2) }}</span>
                                                @endif
                                            </div>
                                            <!-- Stock Status -->
                                            <div class="text-right">
                                                @if ($product->stock > 10)
                                                    <span class="px-3 py-1 bg-green-500/30 text-green-200 text-xs font-medium rounded-full border border-green-400/40 animate-stock-pulse">IN STOCK</span>
                                                @elseif ($product->stock > 0)
                                                    <span class="px-3 py-1 bg-yellow-500/30 text-yellow-200 text-xs font-medium rounded-full border border-yellow-400/40">LOW ({{ $product->stock }})</span>
                                                @else
                                                    <span class="px-3 py-1 bg-red-500/30 text-red-200 text-xs font-medium rounded-full border border-red-400/40">OUT OF STOCK</span>
                                                @endif
                                            </div>
                                        </div>

                                        <!-- Action Buttons -->
                                        <div class="space-y-3 mt-auto">
                                            @if($product->stock > 0)
                                                <form action="{{ route('cart.store') }}" method="POST" class="w-full">
                                                    @csrf
                                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                    <input type="hidden" name="quantity" value="1">
                                                    <button type="submit" class="w-full py-3 bg-gradient-to-r from-orange-500 to-orange-600 hover:from-orange-600 hover:to-orange-700 text-white font-bold rounded-xl transition-all duration-300 hover:scale-105 hover:shadow-lg hover:shadow-orange-500/40 animate-button-glow">
                                                        <span class="flex items-center justify-center gap-2">
                                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4m0 0L7 13m0 0l-1.1 5H19M7 13l-1.1 5M7 13l1.1-5"></path>
                                                            </svg>
                                                            ADD TO CART
                                                        </span>
                                                    </button>
                                                </form>
                                            @else
                                                <button type="button" class="w-full py-3 bg-gray-700/60 text-gray-300 font-bold rounded-xl cursor-not-allowed backdrop-blur-sm border border-gray-600/40" disabled>
                                                    OUT OF STOCK
                                                </button>
                                            @endif

                                            <a href="{{ route('products.show', $product) }}" class="w-full py-3 bg-white/15 hover:bg-white/25 text-white font-bold rounded-xl transition-all duration-300 hover:scale-105 backdrop-blur-sm border border-white/20 block text-center hover:shadow-lg hover:shadow-blue-500/30">
                                                <span class="flex items-center justify-center gap-2">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                                    </svg>
                                                    VIEW DETAILS
                                                </span>
                                            </a>
                                        </div>
                                </div>

                                    <!-- Hover Glow Effect -->
                                    <div class="absolute inset-0 rounded-3xl bg-gradient-to-r from-orange-500/0 via-blue-500/0 to-orange-500/0 group-hover/product:from-orange-500/15 group-hover/product:via-blue-500/8 group-hover/product:to-orange-500/15 transition-all duration-500 pointer-events-none"></div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@else
    <div class="text-center py-16">
        <div class="bg-white/5 backdrop-blur-lg border border-white/20 inline-block p-10 rounded-3xl shadow-2xl">
            <svg class="w-20 h-20 text-gray-400 mx-auto mb-6 animate-float" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
            </svg>
            <h3 class="text-2xl font-bold text-white mb-4">No products found</h3>
            @if(request('search'))
                <p class="text-gray-300 text-lg">Try adjusting your search terms or browse all categories.</p>
            @else
                <p class="text-gray-300 text-lg">No products available at the moment.</p>
            @endif
        </div>
    </div>
@endif



<!-- All Products Grid -->
@if($products->count() > 0)
<div class="mt-16">
    <!-- Enhanced Noticeable Products Header -->
    <div class="relative mb-16">
        <!-- Background Glow Effect -->
        <div class="absolute inset-0 bg-gradient-to-r from-orange-500/10 via-pink-500/10 to-purple-500/10 rounded-3xl blur-3xl transform scale-110"></div>

        <!-- Main Header Container -->
        <div class="relative bg-gradient-to-r from-white/5 via-white/10 to-white/5 backdrop-blur-xl border border-white/20 rounded-3xl p-8 md:p-12 shadow-2xl shadow-orange-500/20">
            <!-- Animated Border -->
            <div class="absolute inset-0 rounded-3xl bg-gradient-to-r from-orange-400 via-pink-500 to-purple-500 opacity-20 animate-pulse"></div>

            <!-- Content -->
            <div class="relative text-center">
                <!-- Main Heading with Enhanced Animation -->
                <h2 class="text-4xl md:text-6xl font-black text-transparent bg-clip-text bg-gradient-to-r from-orange-400 via-pink-500 to-purple-500 mb-6 animate-pulse-glow flex items-center justify-center gap-6">
                    <span>✨</span>
                    <span>All Products</span>
                    <span>✨</span>
                </h2>

                <!-- Animated Underline -->
                <div class="flex items-center justify-center mb-6">
                    <div class="w-24 h-1 bg-gradient-to-r from-orange-400 to-pink-500 rounded-full animate-pulse"></div>
                    <div class="w-3 h-3 bg-orange-400 rounded-full mx-2 animate-bounce" style="animation-delay: 0.1s"></div>
                    <div class="w-16 h-1 bg-gradient-to-r from-pink-500 to-purple-500 rounded-full animate-pulse" style="animation-delay: 0.2s"></div>
                    <div class="w-3 h-3 bg-pink-500 rounded-full mx-2 animate-bounce" style="animation-delay: 0.3s"></div>
                    <div class="w-24 h-1 bg-gradient-to-r from-purple-500 to-orange-400 rounded-full animate-pulse" style="animation-delay: 0.4s"></div>
                </div>

                <!-- Description with Enhanced Styling -->
                <p class="text-gray-200 text-xl md:text-2xl max-w-4xl mx-auto leading-relaxed font-medium">
                    Discover our <span class="text-orange-400 font-bold animate-pulse">premium collection</span> of handpicked products designed to elevate your lifestyle
                </p>

                <!-- Product Count Badge -->
                <div class="mt-6 inline-flex items-center gap-2 bg-gradient-to-r from-orange-500/20 to-pink-500/20 backdrop-blur-sm border border-orange-400/30 rounded-full px-6 py-3">
                    <span class="text-orange-300 font-semibold">{{ $products->total() }}</span>
                    <span class="text-gray-300">Amazing Products Available</span>
                    <div class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Products Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 px-4">
        @foreach($products as $index => $product)
            <x-product-card :product="$product" context="shop" :index="$index" />
        @endforeach
    </div>

    <!-- Pagination -->
    @if($products->hasPages())
        <div class="mt-12 flex justify-center">
            <div class="bg-white/5 backdrop-blur-lg border border-white/20 p-6 rounded-2xl shadow-xl">
                {{ $products->appends(request()->query())->links() }}
            </div>
        </div>
    @endif
</div>
@endif

<!-- No Results Message -->
<div x-show="products.length === 0 && !loading" class="mt-12 text-center py-16">
    <div class="bg-white/5 backdrop-blur-lg border border-white/20 inline-block p-10 rounded-3xl shadow-2xl">
        <svg class="w-20 h-20 text-gray-400 mx-auto mb-6 animate-float" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
        </svg>
        <h3 class="text-2xl font-bold text-white mb-4">No products found</h3>
        <p class="text-gray-300 text-lg" x-text="searchQuery ? 'Try adjusting your search terms or browse categories' : 'No products available at the moment'"></p>
    </div>
</div>


</div>

<div x-data="{
    open: false,
    productId: null,
    name: '',
    price: 0,
    image: '',
    description: '',
    stock: 0,
    category: '',
    quantity: 1
}" 
x-on:open-quick-view.window="productId = $event.detail.id; name = $event.detail.name; price = $event.detail.price; image = $event.detail.image; description = $event.detail.description; stock = $event.detail.stock; category = $event.detail.category; quantity = 1; open = true" 
x-cloak>
    <div x-show="open" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" style="display: none;" class="fixed inset-0 z-50 overflow-y-auto bg-gray-900 bg-opacity-75">
        <div class="flex items-center justify-center min-h-screen p-4">
            <div class="bg-[var(--color-store-secondary)] rounded-xl shadow-2xl border border-gray-700 w-full max-w-4xl overflow-hidden relative">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 p-8">

                    <div class="flex items-center justify-center">
                        <img :src="image" :alt="name" class="w-full h-auto object-cover rounded-lg border border-gray-700" />
                    </div>

                    <!-- RIGHT COLUMN: Product Details & Actions -->
                    <div class="flex flex-col justify-between">
                        <!-- Product Name & Category -->
                        <div>
                            <p class="text-sm text-gray-400 mb-2" x-text="category"></p>
                            <h2 class="text-3xl font-bold text-white mb-4" x-text="name"></h2>

                            <!-- Price (Orange Highlight) -->
                            <p class="text-4xl font-bold text-[var(--color-store-primary)] mb-6" x-text="'$' + price.toFixed(2)"></p>

                            <!-- Stock Status -->
                            <div class="mb-6">
                                <template x-if="stock > 10">
                                    <span class="inline-block px-3 py-1 bg-green-900/30 text-green-300 rounded-full text-sm border border-green-700">In Stock</span>
                                </template>
                                <template x-if="stock > 0 && stock <= 10">
                                    <span class="inline-block px-3 py-1 bg-yellow-900/30 text-yellow-300 rounded-full text-sm border border-yellow-700" x-text="'Low Stock (' + stock + ')'"></span>
                                </template>
                                <template x-if="stock === 0">
                                    <span class="inline-block px-3 py-1 bg-red-900/30 text-red-300 rounded-full text-sm border border-red-700">Out of Stock</span>
                                </template>
                            </div>

                            <!-- Short Description -->
                            <p class="text-gray-300 text-sm leading-6 mb-6" x-text="description ? (description.length > 100 ? description.substring(0, 100) + '...' : description) : 'No description available.'"></p>
                        </div>

                        <!-- Quantity Selector & ADD TO CART Button -->
                        <form action="/cart/store" method="POST" class="space-y-4">
                            @csrf
                            <input type="hidden" name="product_id" :value="productId">

                            <!-- Quantity Selector -->
                            <div class="flex items-center border border-gray-700 rounded-lg bg-gray-800 w-fit">
                                <button type="button" @click="quantity > 1 && quantity--" class="px-4 py-2 text-white hover:bg-gray-700 transition">−</button>
                                <input type="number" name="quantity" x-model.number="quantity" min="1" :max="stock" class="w-16 text-center bg-gray-800 text-white border-0 focus:ring-0" />
                                <button type="button" @click="quantity < stock && quantity++" class="px-4 py-2 text-white hover:bg-gray-700 transition">+</button>
                            </div>

                            <!-- Orange ADD TO CART Button -->
                            <button type="submit" :disabled="stock === 0" class="w-full py-4 bg-[var(--color-store-primary)] text-white font-bold text-lg rounded-lg hover:bg-[#ff5a1a] transition duration-300 btn-animated disabled:opacity-50 disabled:cursor-not-allowed">
                                {{ __('ADD TO CART') }}
                            </button>

                            <!-- View Details Link -->
                            <a :href="'/products/' + productId" class="block text-center text-[var(--color-store-primary)] hover:text-[#ff5a1a] transition text-sm font-semibold">
                                {{ __('View Full Product Details') }}
                            </a>
                        </form>
                    </div>

                </div>

                <!-- Close Button (Top Right) -->
                <button @click="open = false" class="absolute top-4 right-4 text-gray-400 hover:text-white transition">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Main products slider
    const mainSlider = document.querySelector('.main-slider-container');
    const mainPrevBtn = document.querySelector('.main-slider-prev');
    const mainNextBtn = document.querySelector('.main-slider-next');

    if (mainPrevBtn && mainNextBtn && mainSlider) {
        let mainIsScrolling = false;

        function mainSmoothScroll(direction) {
            if (mainIsScrolling) return;
            mainIsScrolling = true;

            const scrollAmount = direction * 308; // Card width (288px) + gap (20px) for smooth sliding
            const duration = 600; // Smooth transition duration
            const start = mainSlider.scrollLeft;
            const end = start + scrollAmount;
            const startTime = performance.now();

            function animate(currentTime) {
                const elapsed = currentTime - startTime;
                const progress = Math.min(elapsed / duration, 1);

                // Easing function for roller-like movement
                const easeOutCubic = 1 - Math.pow(1 - progress, 3);

                mainSlider.scrollLeft = start + (scrollAmount * easeOutCubic);

                if (progress < 1) {
                    requestAnimationFrame(animate);
                } else {
                    mainIsScrolling = false;
                }
            }

            requestAnimationFrame(animate);
        }

        mainPrevBtn.addEventListener('click', function() {
            mainSmoothScroll(-1);
        });

        mainNextBtn.addEventListener('click', function() {
            mainSmoothScroll(1);
        });

        // Auto-scroll functionality
        let mainAutoScrollInterval;
        let mainIsHovered = false;

        function startMainAutoScroll() {
            mainAutoScrollInterval = setInterval(() => {
                if (!mainIsHovered && !mainIsScrolling) {
                    const totalWidth = mainSlider.scrollWidth;
                    const currentScroll = mainSlider.scrollLeft;
                    const maxScroll = totalWidth - mainSlider.clientWidth;

                    // If near the end, reset to beginning; otherwise scroll right
                    if (currentScroll >= maxScroll - 50) {
                        mainSlider.scrollLeft = 0;
                    } else {
                        mainSmoothScroll(1);
                    }
                }
            }, 4000); // Auto-scroll every 4 seconds
        }

        function stopMainAutoScroll() {
            clearInterval(mainAutoScrollInterval);
        }

        // Start auto-scroll
        startMainAutoScroll();

        // Pause on hover
        mainSlider.addEventListener('mouseenter', function() {
            mainIsHovered = true;
        });

        mainSlider.addEventListener('mouseleave', function() {
            mainIsHovered = false;
        });

        mainPrevBtn.addEventListener('mouseenter', function() {
            mainIsHovered = true;
        });

        mainNextBtn.addEventListener('mouseenter', function() {
            mainIsHovered = true;
        });

        mainPrevBtn.addEventListener('mouseleave', function() {
            mainIsHovered = false;
        });

        mainNextBtn.addEventListener('mouseleave', function() {
            mainIsHovered = false;
        });
    }

    // Smooth roller-like slider functionality
    @if($productsByCategory)
        @foreach($productsByCategory as $categoryData)
            const slider{{ $categoryData['category']->id }} = document.querySelector('.slider-container-{{ $categoryData['category']->id }}');
            const prevBtn{{ $categoryData['category']->id }} = document.querySelector('.slider-prev-{{ $categoryData['category']->id }}');
            const nextBtn{{ $categoryData['category']->id }} = document.querySelector('.slider-next-{{ $categoryData['category']->id }}');

            if (prevBtn{{ $categoryData['category']->id }} && nextBtn{{ $categoryData['category']->id }} && slider{{ $categoryData['category']->id }}) {
                let isScrolling{{ $categoryData['category']->id }} = false;

                function smoothScroll{{ $categoryData['category']->id }}(direction) {
                    if (isScrolling{{ $categoryData['category']->id }}) return;
                    isScrolling{{ $categoryData['category']->id }} = true;

                    const scrollAmount = direction * 308; // Card width (288px) + gap (20px) for smooth sliding
                    const duration = 600; // Smooth transition duration
                    const start = slider{{ $categoryData['category']->id }}.scrollLeft;
                    const end = start + scrollAmount;
                    const startTime = performance.now();

                    function animate(currentTime) {
                        const elapsed = currentTime - startTime;
                        const progress = Math.min(elapsed / duration, 1);

                        // Easing function for roller-like movement
                        const easeOutCubic = 1 - Math.pow(1 - progress, 3);

                        slider{{ $categoryData['category']->id }}.scrollLeft = start + (scrollAmount * easeOutCubic);

                        if (progress < 1) {
                            requestAnimationFrame(animate);
                        } else {
                            isScrolling{{ $categoryData['category']->id }} = false;
                        }
                    }

                    requestAnimationFrame(animate);
                }

                prevBtn{{ $categoryData['category']->id }}.addEventListener('click', function() {
                    smoothScroll{{ $categoryData['category']->id }}(-1);
                });

                nextBtn{{ $categoryData['category']->id }}.addEventListener('click', function() {
                    smoothScroll{{ $categoryData['category']->id }}(1);
                });

                // Auto-scroll functionality
                let autoScrollInterval{{ $categoryData['category']->id }};
                let isHovered{{ $categoryData['category']->id }} = false;

                function startAutoScroll{{ $categoryData['category']->id }}() {
                    autoScrollInterval{{ $categoryData['category']->id }} = setInterval(() => {
                        if (!isHovered{{ $categoryData['category']->id }} && !isScrolling{{ $categoryData['category']->id }}) {
                            const totalWidth = slider{{ $categoryData['category']->id }}.scrollWidth;
                            const currentScroll = slider{{ $categoryData['category']->id }}.scrollLeft;
                            const maxScroll = totalWidth - slider{{ $categoryData['category']->id }}.clientWidth;

                            // If near the end, reset to beginning; otherwise scroll right
                            if (currentScroll >= maxScroll - 50) {
                                slider{{ $categoryData['category']->id }}.scrollLeft = 0;
                            } else {
                                smoothScroll{{ $categoryData['category']->id }}(1);
                            }
                        }
                    }, 4000); // Auto-scroll every 4 seconds
                }

                function stopAutoScroll{{ $categoryData['category']->id }}() {
                    clearInterval(autoScrollInterval{{ $categoryData['category']->id }});
                }

                // Start auto-scroll
                startAutoScroll{{ $categoryData['category']->id }}();

                // Pause on hover
                slider{{ $categoryData['category']->id }}.addEventListener('mouseenter', function() {
                    isHovered{{ $categoryData['category']->id }} = true;
                });

                slider{{ $categoryData['category']->id }}.addEventListener('mouseleave', function() {
                    isHovered{{ $categoryData['category']->id }} = false;
                });

                prevBtn{{ $categoryData['category']->id }}.addEventListener('mouseenter', function() {
                    isHovered{{ $categoryData['category']->id }} = true;
                });

                nextBtn{{ $categoryData['category']->id }}.addEventListener('mouseenter', function() {
                    isHovered{{ $categoryData['category']->id }} = true;
                });

                prevBtn{{ $categoryData['category']->id }}.addEventListener('mouseleave', function() {
                    isHovered{{ $categoryData['category']->id }} = false;
                });

                nextBtn{{ $categoryData['category']->id }}.addEventListener('mouseleave', function() {
                    isHovered{{ $categoryData['category']->id }} = false;
                });
            }
        @endforeach
    @endif
});
</script>

</x-guest-layout>