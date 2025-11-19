@extends('layouts.app')

@section('title', 'Design System | teachnologia')

@section('content')
<div class="pb-12 pt-0 min-h-screen">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        
        <!-- Section: Color Palette -->
        <section class="mb-16 mt-12">
            <h2 class="text-4xl font-extrabold text-center mb-16 text-[var(--color-store-text)] tracking-tight">
                <span class="border-b-4 border-primary-accent/50 pb-1">Color Palette</span>
            </h2>
            
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <!-- Primary Color -->
                <div class="card-tech p-8 border border-gray-700">
                    <div class="w-full h-24 bg-[#ff4500] rounded-lg mb-4"></div>
                    <h3 class="text-lg font-bold text-[var(--color-store-text)] mb-2">Primary Accent</h3>
                    <p class="text-gray-400 text-sm mb-2">#ff4500</p>
                    <p class="text-gray-500 text-xs">Used for CTAs, hovers, and highlights</p>
                </div>

                <!-- Secondary Color -->
                <div class="card-tech p-8 border border-gray-700">
                    <div class="w-full h-24 bg-[#1a1a1a] border border-gray-600 rounded-lg mb-4"></div>
                    <h3 class="text-lg font-bold text-[var(--color-store-text)] mb-2">Secondary</h3>
                    <p class="text-gray-400 text-sm mb-2">#1a1a1a</p>
                    <p class="text-gray-500 text-xs">Navigation, cards, containers</p>
                </div>

                <!-- Background Color -->
                <div class="card-tech p-8 border border-gray-700">
                    <div class="w-full h-24 bg-[#0d0d0d] border border-gray-600 rounded-lg mb-4"></div>
                    <h3 class="text-lg font-bold text-[var(--color-store-text)] mb-2">Background</h3>
                    <p class="text-gray-400 text-sm mb-2">#0d0d0d</p>
                    <p class="text-gray-500 text-xs">Page background</p>
                </div>

                <!-- Text Color -->
                <div class="card-tech p-8 border border-gray-700">
                    <div class="w-full h-24 bg-[#f0f0f0] rounded-lg mb-4"></div>
                    <h3 class="text-lg font-bold text-[var(--color-store-text)] mb-2">Text</h3>
                    <p class="text-gray-400 text-sm mb-2">#f0f0f0</p>
                    <p class="text-gray-500 text-xs">Main text color</p>
                </div>
            </div>
        </section>

        <!-- Section: Typography -->
        <section class="mb-16">
            <h2 class="text-4xl font-extrabold text-center mb-16 text-[var(--color-store-text)] tracking-tight">
                <span class="border-b-4 border-primary-accent/50 pb-1">Typography</span>
            </h2>
            
            <div class="card-tech p-8 border border-gray-700 space-y-8">
                <div>
                    <p class="text-xs text-gray-400 mb-2 uppercase tracking-widest">Display (H1)</p>
                    <h1 class="text-5xl md:text-7xl font-extrabold text-[var(--color-store-text)]">Heading Level 1</h1>
                </div>

                <div>
                    <p class="text-xs text-gray-400 mb-2 uppercase tracking-widest">Heading (H2)</p>
                    <h2 class="text-4xl font-extrabold text-[var(--color-store-text)]">Heading Level 2</h2>
                </div>

                <div>
                    <p class="text-xs text-gray-400 mb-2 uppercase tracking-widest">Subheading (H3)</p>
                    <h3 class="text-2xl font-bold text-[var(--color-store-text)]">Heading Level 3</h3>
                </div>

                <div>
                    <p class="text-xs text-gray-400 mb-2 uppercase tracking-widest">Body Text</p>
                    <p class="text-lg text-gray-300">This is body text. It should be readable and comfortable for extended reading. The color is a light gray to maintain contrast against the dark background.</p>
                </div>

                <div>
                    <p class="text-xs text-gray-400 mb-2 uppercase tracking-widest">Small Text</p>
                    <p class="text-sm text-gray-400">This is small text, often used for labels, secondary information, or captions.</p>
                </div>

                <div>
                    <p class="text-xs text-gray-400 mb-2 uppercase tracking-widest">Tiny Text</p>
                    <p class="text-xs text-gray-500">This is tiny text for fine print and minimal information.</p>
                </div>
            </div>
        </section>

        <!-- Section: Buttons -->
        <section class="mb-16">
            <h2 class="text-4xl font-extrabold text-center mb-16 text-[var(--color-store-text)] tracking-tight">
                <span class="border-b-4 border-primary-accent/50 pb-1">Buttons</span>
            </h2>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Primary Button -->
                <div class="card-tech p-8 border border-gray-700 flex flex-col items-center justify-center">
                    <button class="btn-primary text-lg px-8 py-3 mb-4">Primary Button</button>
                    <p class="text-xs text-gray-400 text-center">Use for main CTAs and important actions</p>
                </div>

                <!-- Primary Large -->
                <div class="card-tech p-8 border border-gray-700 flex flex-col items-center justify-center">
                    <button class="btn-primary text-lg px-10 py-4 mb-4 transform hover:scale-105 transition duration-300">Large Primary</button>
                    <p class="text-xs text-gray-400 text-center">Scale effect on hover</p>
                </div>

                <!-- Secondary Button -->
                <div class="card-tech p-8 border border-gray-700 flex flex-col items-center justify-center">
                    <button class="px-8 py-3 bg-gray-700 text-white font-semibold rounded-lg hover:bg-gray-600 transition duration-300 mb-4">Secondary</button>
                    <p class="text-xs text-gray-400 text-center">For secondary actions</p>
                </div>

                <!-- Danger Button -->
                <div class="card-tech p-8 border border-gray-700 flex flex-col items-center justify-center">
                    <button class="px-8 py-3 bg-red-600 text-white font-semibold rounded-lg hover:bg-red-700 transition duration-300 mb-4">Danger</button>
                    <p class="text-xs text-gray-400 text-center">For destructive actions</p>
                </div>

                <!-- Disabled Button -->
                <div class="card-tech p-8 border border-gray-700 flex flex-col items-center justify-center">
                    <button class="px-8 py-3 bg-gray-700 text-gray-500 font-semibold rounded-lg cursor-not-allowed opacity-50 mb-4">Disabled</button>
                    <p class="text-xs text-gray-400 text-center">Inactive state</p>
                </div>

                <!-- Icon Button -->
                <div class="card-tech p-8 border border-gray-700 flex flex-col items-center justify-center">
                    <button class="btn-primary px-4 py-3 flex items-center mb-4">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                        Add New
                    </button>
                    <p class="text-xs text-gray-400 text-center">With icon</p>
                </div>
            </div>
        </section>

        <!-- Section: Cards -->
        <section class="mb-16">
            <h2 class="text-4xl font-extrabold text-center mb-16 text-[var(--color-store-text)] tracking-tight">
                <span class="border-b-4 border-primary-accent/50 pb-1">Cards</span>
            </h2>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="card-tech text-center p-8 border border-gray-700 hover:border-primary-accent/70 flex flex-col items-center justify-center">
                    <svg class="w-16 h-16 text-primary-accent mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                    <h3 class="text-xl font-bold text-[var(--color-store-text)] mb-2">Feature Card</h3>
                    <p class="text-gray-400 text-sm">Beautiful card with icon, hover effect, and border animation</p>
                </div>

                <div class="card-tech p-8 border border-gray-700 hover:border-primary-accent/70">
                    <div class="h-32 bg-gradient-to-br from-primary-accent to-orange-600 rounded-lg mb-4"></div>
                    <h3 class="text-xl font-bold text-[var(--color-store-text)] mb-2">Image Card</h3>
                    <p class="text-gray-400 text-sm mb-4">Perfect for products, courses, or showcasing content</p>
                    <a href="#" class="text-primary-accent hover:text-white font-semibold text-sm transition">Learn More →</a>
                </div>

                <div class="card-tech p-8 border border-gray-700 hover:border-primary-accent/70">
                    <div class="flex items-center justify-between mb-4">
                        <h4 class="text-lg font-bold text-[var(--color-store-text)]">Stats</h4>
                        <span class="text-primary-accent font-bold">+42%</span>
                    </div>
                    <p class="text-3xl font-extrabold text-[var(--color-store-text)] mb-2">2,547</p>
                    <p class="text-gray-400 text-sm">Active students this month</p>
                </div>
            </div>
        </section>

        <!-- Section: Forms -->
        <section class="mb-16">
            <h2 class="text-4xl font-extrabold text-center mb-16 text-[var(--color-store-text)] tracking-tight">
                <span class="border-b-4 border-primary-accent/50 pb-1">Form Elements</span>
            </h2>
            
            <div class="card-tech p-8 border border-gray-700">
                <div class="space-y-6">
                    <!-- Text Input -->
                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-2">Text Input</label>
                        <input type="text" placeholder="Enter text here" 
                            class="w-full px-4 py-2 bg-gray-800 border border-gray-700 rounded-lg text-white placeholder-gray-500 focus:border-primary-accent focus:ring focus:ring-primary-accent/50 transition">
                    </div>

                    <!-- Email Input -->
                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-2">Email Address</label>
                        <input type="email" placeholder="your@email.com" 
                            class="w-full px-4 py-2 bg-gray-800 border border-gray-700 rounded-lg text-white placeholder-gray-500 focus:border-primary-accent focus:ring focus:ring-primary-accent/50 transition">
                    </div>

                    <!-- Select -->
                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-2">Select Option</label>
                        <select class="w-full px-4 py-2 bg-gray-800 border border-gray-700 rounded-lg text-white focus:border-primary-accent focus:ring focus:ring-primary-accent/50 transition">
                            <option>Choose an option</option>
                            <option>Option 1</option>
                            <option>Option 2</option>
                        </select>
                    </div>

                    <!-- Textarea -->
                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-2">Message</label>
                        <textarea rows="4" placeholder="Enter your message..." 
                            class="w-full px-4 py-2 bg-gray-800 border border-gray-700 rounded-lg text-white placeholder-gray-500 focus:border-primary-accent focus:ring focus:ring-primary-accent/50 transition"></textarea>
                    </div>

                    <!-- Checkbox -->
                    <div class="flex items-center">
                        <input type="checkbox" class="w-4 h-4 rounded bg-gray-700 border-gray-600 checked:bg-primary-accent checked:border-primary-accent cursor-pointer">
                        <label class="ml-2 text-sm text-gray-300">I agree to the terms and conditions</label>
                    </div>

                    <!-- Radio -->
                    <div class="flex items-center space-x-4">
                        <label class="flex items-center text-sm text-gray-300">
                            <input type="radio" name="choice" class="w-4 h-4 bg-gray-700 border-gray-600 checked:bg-primary-accent">
                            <span class="ml-2">Option A</span>
                        </label>
                        <label class="flex items-center text-sm text-gray-300">
                            <input type="radio" name="choice" class="w-4 h-4 bg-gray-700 border-gray-600 checked:bg-primary-accent">
                            <span class="ml-2">Option B</span>
                        </label>
                    </div>
                </div>
            </div>
        </section>

        <!-- Section: Alerts & Messages -->
        <section class="mb-16">
            <h2 class="text-4xl font-extrabold text-center mb-16 text-[var(--color-store-text)] tracking-tight">
                <span class="border-b-4 border-primary-accent/50 pb-1">Alerts & Messages</span>
            </h2>
            
            <div class="space-y-4">
                <!-- Success Alert -->
                <div class="p-4 bg-green-900/30 border border-green-700 text-green-300 rounded-lg">
                    <div class="flex items-start">
                        <svg class="w-5 h-5 mr-3 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                    <div>
                        <strong>Success!</strong> Your action was completed successfully.
                    </div>
                    </div>
                </div>

                <!-- Error Alert -->
                <div class="p-4 bg-red-900/30 border border-red-700 text-red-300 rounded-lg">
                    <div class="flex items-start">
                        <svg class="w-5 h-5 mr-3 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/></svg>
                    <div>
                        <strong>Error!</strong> Something went wrong. Please try again.
                    </div>
                    </div>
                </div>

                <!-- Warning Alert -->
                <div class="p-4 bg-yellow-900/30 border border-yellow-700 text-yellow-300 rounded-lg">
                    <div class="flex items-start">
                        <svg class="w-5 h-5 mr-3 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                    <div>
                        <strong>Warning!</strong> Please review this information before proceeding.
                    </div>
                    </div>
                </div>

                <!-- Info Alert -->
                <div class="p-4 bg-blue-900/30 border border-blue-700 text-blue-300 rounded-lg">
                    <div class="flex items-start">
                        <svg class="w-5 h-5 mr-3 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/></svg>
                    <div>
                        <strong>Info:</strong> This is an informational message for the user.
                    </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Section: Tables -->
        <section class="mb-16">
            <h2 class="text-4xl font-extrabold text-center mb-16 text-[var(--color-store-text)] tracking-tight">
                <span class="border-b-4 border-primary-accent/50 pb-1">Tables</span>
            </h2>
            
            <div class="card-tech overflow-hidden border border-gray-700">
                <table class="w-full">
                    <thead class="bg-gray-800 text-white">
                        <tr>
                            <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider">Name</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider">Email</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider">Status</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-b border-gray-700 hover:bg-gray-800 transition">
                            <td class="px-6 py-4 text-[var(--color-store-text)]">John Doe</td>
                            <td class="px-6 py-4 text-gray-400">john@example.com</td>
                            <td class="px-6 py-4">
                                <span class="px-3 py-1 text-sm rounded-full bg-green-900/30 text-green-300 border border-green-700">Active</span>
                            </td>
                            <td class="px-6 py-4">
                                <a href="#" class="text-primary-accent hover:text-white text-sm font-medium">Edit</a>
                            </td>
                        </tr>
                        <tr class="border-b border-gray-700 hover:bg-gray-800 transition">
                            <td class="px-6 py-4 text-[var(--color-store-text)]">Jane Smith</td>
                            <td class="px-6 py-4 text-gray-400">jane@example.com</td>
                            <td class="px-6 py-4">
                                <span class="px-3 py-1 text-sm rounded-full bg-yellow-900/30 text-yellow-300 border border-yellow-700">Pending</span>
                            </td>
                            <td class="px-6 py-4">
                                <a href="#" class="text-primary-accent hover:text-white text-sm font-medium">Edit</a>
                            </td>
                        </tr>
                        <tr class="hover:bg-gray-800 transition">
                            <td class="px-6 py-4 text-[var(--color-store-text)]">Bob Johnson</td>
                            <td class="px-6 py-4 text-gray-400">bob@example.com</td>
                            <td class="px-6 py-4">
                                <span class="px-3 py-1 text-sm rounded-full bg-red-900/30 text-red-300 border border-red-700">Inactive</span>
                            </td>
                            <td class="px-6 py-4">
                                <a href="#" class="text-primary-accent hover:text-white text-sm font-medium">Edit</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>

        <!-- Section: Navigation & Links -->
        <section class="mb-16">
            <h2 class="text-4xl font-extrabold text-center mb-16 text-[var(--color-store-text)] tracking-tight">
                <span class="border-b-4 border-primary-accent/50 pb-1">Navigation & Links</span>
            </h2>
            
            <div class="card-tech p-8 border border-gray-700">
                <div class="space-y-6">
                    <div>
                        <p class="text-sm text-gray-400 mb-3">Navigation Links</p>
                        <div class="flex flex-wrap gap-4">
                            <a href="#" class="text-[var(--color-store-text)] hover:text-primary-accent border-transparent hover:border-primary-accent border-b-2 transition duration-150 pb-1">Home</a>
                            <a href="#" class="text-[var(--color-store-text)] hover:text-primary-accent border-transparent hover:border-primary-accent border-b-2 transition duration-150 pb-1">Shop</a>
                            <a href="#" class="text-[var(--color-store-text)] hover:text-primary-accent border-transparent hover:border-primary-accent border-b-2 transition duration-150 pb-1">Categories</a>
                            <a href="#" class="text-[var(--color-store-text)] hover:text-primary-accent border-transparent hover:border-primary-accent border-b-2 transition duration-150 pb-1">About Us</a>
                        </div>
                    </div>

                    <div class="border-t border-gray-700 pt-6">
                        <p class="text-sm text-gray-400 mb-3">Text Links</p>
                        <div class="space-y-2">
                            <p class="text-gray-300">This is a <a href="#" class="text-primary-accent hover:text-white font-semibold transition">primary accent link</a> in body text.</p>
                            <p class="text-gray-400">This is a <a href="#" class="text-primary-accent hover:text-white transition">secondary link</a> in smaller text.</p>
                        </div>
                    </div>

                    <div class="border-t border-gray-700 pt-6">
                        <p class="text-sm text-gray-400 mb-3">CTA Links with Arrows</p>
                        <div class="space-y-2">
                            <a href="#" class="text-primary-accent hover:text-white font-semibold transition flex items-center group">
                                Get Started <svg class="w-4 h-4 ml-2 group-hover:translate-x-1 transition">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                                </svg>
                            </a>
                            <a href="#" class="text-primary-accent hover:text-white font-semibold transition flex items-center group">
                                Learn More <svg class="w-4 h-4 ml-2 group-hover:translate-x-1 transition">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Section: Badges & Tags -->
        <section class="mb-16">
            <h2 class="text-4xl font-extrabold text-center mb-16 text-[var(--color-store-text)] tracking-tight">
                <span class="border-b-4 border-primary-accent/50 pb-1">Badges & Tags</span>
            </h2>
            
            <div class="card-tech p-8 border border-gray-700">
                <div class="space-y-6">
                    <div>
                        <p class="text-sm text-gray-400 mb-3">Status Badges</p>
                        <div class="flex flex-wrap gap-3">
                            <span class="px-3 py-1 text-xs font-semibold rounded-full bg-green-900/30 text-green-300 border border-green-700">Active</span>
                            <span class="px-3 py-1 text-xs font-semibold rounded-full bg-yellow-900/30 text-yellow-300 border border-yellow-700">Pending</span>
                            <span class="px-3 py-1 text-xs font-semibold rounded-full bg-red-900/30 text-red-300 border border-red-700">Inactive</span>
                            <span class="px-3 py-1 text-xs font-semibold rounded-full bg-blue-900/30 text-blue-300 border border-blue-700">Review</span>
                        </div>
                    </div>

                    <div class="border-t border-gray-700 pt-6">
                        <p class="text-sm text-gray-400 mb-3">Category Tags</p>
                        <div class="flex flex-wrap gap-2">
                            <span class="px-3 py-1 text-xs font-medium rounded-lg bg-gray-700 text-gray-200">Web Development</span>
                            <span class="px-3 py-1 text-xs font-medium rounded-lg bg-gray-700 text-gray-200">Data Science</span>
                            <span class="px-3 py-1 text-xs font-medium rounded-lg bg-gray-700 text-gray-200">Cloud Computing</span>
                            <span class="px-3 py-1 text-xs font-medium rounded-lg bg-gray-700 text-gray-200">Cyber Security</span>
                        </div>
                    </div>

                    <div class="border-t border-gray-700 pt-6">
                        <p class="text-sm text-gray-400 mb-3">Accent Badges</p>
                        <div class="flex flex-wrap gap-2">
                            <span class="px-3 py-1 text-xs font-semibold rounded-full bg-primary-accent text-white">New</span>
                            <span class="px-3 py-1 text-xs font-semibold rounded-full bg-primary-accent text-white">Featured</span>
                            <span class="px-3 py-1 text-xs font-semibold rounded-full bg-primary-accent text-white">Limited</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>
</div>
@endsection
