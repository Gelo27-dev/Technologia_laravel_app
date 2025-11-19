@extends('layouts.app')

@section('title', 'Technologia | Premium Laptop & PC Components Store')

@section('content')
    <div class="pb-12 pt-0 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="relative overflow-hidden glass-card hero-pulse !p-0 mt-12 transform transition duration-500 ease-in-out">
                
                <div class="relative p-8 md:p-16 text-center z-10">
                    
                    <div class="mb-4 flex flex-col items-center justify-center">
                        <svg class="w-16 h-16 text-white animate-float" 
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 3v2m6-2v2m6 0a2 2 0 012 2v14a2 2 0 01-2 2H3a2 2 0 01-2-2V5a2 2 0 012-2h18zm-9 5a4 4 0 100 8 4 4 0 000-8z" />
                        </svg>
                        <h2 class="text-xl font-bold tracking-widest text-white mt-2 uppercase">
                            Technologia
                        </h2>
                    </div>

                    <h1 class="text-5xl md:text-7xl font-extrabold text-white tracking-tight leading-tight mb-4 animate-in fade-in zoom-in duration-700">
                        Premium Laptop &amp; 
                        <span class="text-white">
                            PC Components
                        </span>
                    </h1>
                    <p class="text-lg md:text-xl text-white max-w-3xl mx-auto mb-10 leading-relaxed animate-in fade-in slide-in-from-bottom-8 duration-900">
                        Discover <strong class="text-white">top-tier processors</strong>, graphics cards, and components from leading manufacturers. Build your perfect machine with <strong class="text-white">quality hardware</strong> and expert support.
                    </p>
                    
                    <a href="{{ route('shop.index') }}" 
                        class="btn-primary btn-animated text-lg px-10 py-4 transform hover:scale-105 transition duration-300 ease-in-out shadow-2xl hover:shadow-[0_0_20px_0_rgba(255,69,0,0.5)] focus:ring-[var(--color-store-primary)]/70">
                        Shop Components &rarr;
                    </a>
                </div>
            </div>

            <section class="mb-12 mt-20">
                <h2 class="text-4xl font-extrabold text-center mb-16 text-white tracking-tight">
                    <span class="border-b-4 border-primary-accent/50 pb-1">Popular Categories</span> ✨
                </h2>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    
                    <div class="card-tech text-center !p-8 flex flex-col items-center justify-center border border-gray-700 hover:border-primary-accent/70">
                        <span class="text-6xl mb-4 block text-white">
                            <svg class="w-16 h-16 inline-block" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 3v2m6-2v2m6 0a2 2 0 012 2v14a2 2 0 01-2 2H3a2 2 0 01-2-2V5a2 2 0 012-2h18zm-9 5a4 4 0 100 8 4 4 0 000-8z"></path></svg>
                        </span>
                        <h3 class="text-2xl font-bold text-white mb-2">Processors</h3>
                        <p class="text-white text-base mb-6">Intel &amp; AMD CPUs for gaming, streaming, and professional workloads.</p>
                        <a href="{{ route('shop.index', ['category' => 'processors']) }}" class="text-white hover:text-primary-accent font-semibold transition duration-200 flex items-center">
                            Browse CPUs <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                        </a>
                    </div>
                    
                    <div class="card-tech text-center !p-8 flex flex-col items-center justify-center border border-gray-700 hover:border-primary-accent/70">
                        <span class="text-6xl mb-4 block text-white">
                            <svg class="w-16 h-16 inline-block" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                        </span>
                        <h3 class="text-2xl font-bold text-white mb-2">Graphics Cards</h3>
                        <p class="text-white text-base mb-6">NVIDIA RTX &amp; AMD Radeon GPUs for gaming and creative professionals.</p>
                        <a href="{{ route('shop.index', ['category' => 'graphics-cards']) }}" class="text-white hover:text-primary-accent font-semibold transition duration-200 flex items-center">
                            Browse GPUs <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                        </a>
                    </div>
                    
                    <div class="card-tech text-center !p-8 flex flex-col items-center justify-center border border-gray-700 hover:border-primary-accent/70">
                        <span class="text-6xl mb-4 block text-white">
                            <svg class="w-16 h-16 inline-block" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.975A5.998 5.998 0 0012 9V7a3 3 0 00-3-3H6a3 3 0 00-3 3v8z"></path></svg>
                        </span>
                        <h3 class="text-2xl font-bold text-white mb-2">Storage &amp; Accessories</h3>
                        <p class="text-white text-base mb-6">SSDs, HDDs, RAM, power supplies, cooling solutions, and more.</p>
                        <a href="{{ route('shop.index', ['category' => 'storage']) }}" class="text-white hover:text-primary-accent font-semibold transition duration-200 flex items-center">
                            Browse Accessories <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                        </a>
                    </div>
                </div>
            </section>

            <section class="mb-12 mt-20" x-data="carousel()">
                <h2 class="text-4xl font-extrabold text-center mb-16 text-white tracking-tight">
                    <span class="border-b-4 border-primary-accent/50 pb-1">Featured Products</span> ✨
                </h2>

                @php
                    $slides = array_chunk($featuredProducts->toArray(), 3);
                @endphp

                <div class="relative overflow-hidden">
                    <div class="flex transition-transform duration-500 ease-in-out" :style="`transform: translateX(-${currentSlide * 100}%)`">
                        @foreach($slides as $index => $slide)
                            <div class="flex-none w-full grid grid-cols-1 md:grid-cols-3 gap-8 px-4">
                                @foreach($slide as $product)
                                    <div class="bg-white/5 backdrop-blur-lg border border-white/20 rounded-2xl overflow-hidden hover:bg-white/10 hover:border-white/30 transition-all duration-500 ease-out hover:scale-[1.02] hover:shadow-2xl hover:shadow-orange-500/20 h-[400px] flex flex-col">
                                        <div class="relative aspect-square overflow-hidden bg-gray-900/50">
                                            <a href="/products/{{ $product['id'] }}" class="block w-full h-full">
                                                <img class="w-full h-full object-contain transition-transform duration-700 ease-out hover:scale-110"
                                                     src="{{ $product['image'] ? asset('storage/' . $product['image']) : 'https://via.placeholder.com/400?text=' . urlencode($product['name']) }}"
                                                     alt="{{ $product['name'] }}">
                                            </a>
                                            <div class="absolute top-3 left-3">
                                                <span class="px-2 py-1 bg-blue-500/80 text-blue-100 text-xs font-medium rounded-lg backdrop-blur-sm">
                                                    {{ $product['category']['name'] ?? 'Uncategorized' }}
                                                </span>
                                            </div>
                                        </div>
                                        <div class="p-4 flex-1 flex flex-col">
                                            <h3 class="text-lg font-bold text-white mb-2 line-clamp-2">{{ $product['name'] }}</h3>
                                            <div class="mb-2">
                                                <span class="text-2xl font-bold text-orange-400">${{ number_format($product['price'], 2) }}</span>
                                            </div>
                                            <div class="mt-auto">
                                                <a href="/products/{{ $product['id'] }}"
                                                   class="w-full py-2 bg-gradient-to-r from-orange-500 to-orange-600 hover:from-orange-600 hover:to-orange-700 text-white font-semibold rounded-lg transition-all duration-300 ease-out hover:scale-105 block text-center">
                                                    View Details
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endforeach
                    </div>

                    <!-- Navigation buttons -->
                    <button @click="prevSlide" class="absolute left-4 top-1/2 transform -translate-y-1/2 bg-white/20 hover:bg-white/30 text-white p-3 rounded-full backdrop-blur-sm transition-all duration-300 hover:scale-110">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                        </svg>
                    </button>
                    <button @click="nextSlide" class="absolute right-4 top-1/2 transform -translate-y-1/2 bg-white/20 hover:bg-white/30 text-white p-3 rounded-full backdrop-blur-sm transition-all duration-300 hover:scale-110">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </button>

                    <!-- Indicators -->
                    <div class="flex justify-center mt-8 space-x-2">
                        @for($i = 0; $i < count($slides); $i++)
                            <button @click="currentSlide = {{ $i }}" class="w-3 h-3 rounded-full transition-all duration-300" :class="currentSlide === {{ $i }} ? 'bg-orange-500' : 'bg-white/30'"></button>
                        @endfor
                    </div>
                </div>

                <script>
                    function carousel() {
                        return {
                            currentSlide: 0,
                            init() {
                                setInterval(() => {
                                    this.nextSlide();
                                }, 5000);
                            },
                            nextSlide() {
                                this.currentSlide = (this.currentSlide + 1) % {{ count($slides) }};
                            },
                            prevSlide() {
                                this.currentSlide = (this.currentSlide - 1 + {{ count($slides) }}) % {{ count($slides) }};
                            }
                        }
                    }
                </script>
            </section>
        </div>
    </div>
@endsection