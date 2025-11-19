@props(['position' => 'bottom-right'])

@php
$position = $position ?? 'bottom-right';
$positionClasses = [
    'bottom-right' => 'bottom-6 right-6',
    'bottom-left' => 'bottom-6 left-6',
    'top-right' => 'top-6 right-6',
    'top-left' => 'top-6 left-6',
];
@endphp

<div x-data="{
    isOpen: false,
    message: '',
    email: '',
    name: '',
    submitted: false,
    loading: false
}"
x-cloak
class="fixed {{ $positionClasses[$position] }} z-50">

    <!-- Chat Button -->
    <button @click="isOpen = !isOpen"
            :class="{ 'scale-110': isOpen }"
            class="bg-[var(--color-store-primary)] hover:bg-[#ff5a1a] text-white rounded-full w-14 h-14 flex items-center justify-center shadow-lg transition-all duration-300 hover:shadow-xl group relative">

        <!-- Chat Icon -->
        <svg x-show="!isOpen" class="w-6 h-6 transition-transform duration-300 group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
        </svg>

        <!-- Close Icon -->
        <svg x-show="isOpen" x-cloak class="w-6 h-6 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
        </svg>

        <!-- Notification Dot -->
        <div class="absolute -top-1 -right-1 w-3 h-3 bg-red-500 rounded-full animate-pulse"></div>
    </button>

    <!-- Chat Window -->
    <div x-show="isOpen"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 transform scale-95 translate-y-4"
         x-transition:enter-end="opacity-100 transform scale-100 translate-y-0"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100 transform scale-100 translate-y-0"
         x-transition:leave-end="opacity-0 transform scale-95 translate-y-4"
         @click.away="isOpen = false"
         class="absolute bottom-16 right-0 w-80 max-w-sm bg-gray-800 border border-gray-700 rounded-lg shadow-2xl overflow-hidden"
         style="display: none;">

        <!-- Header -->
        <div class="bg-[var(--color-store-primary)] px-4 py-3 flex items-center justify-between">
            <div class="flex items-center space-x-3">
                <div class="w-8 h-8 bg-white/20 rounded-full flex items-center justify-center">
                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                    </svg>
                </div>
                <div>
                    <h3 class="text-white font-semibold text-sm">Message Us</h3>
                    <p class="text-white/80 text-xs">We typically reply instantly</p>
                </div>
            </div>
            <button @click="isOpen = false" class="text-white/70 hover:text-white transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>

        <!-- Success Message -->
        <div x-show="submitted" x-cloak class="p-4 bg-green-900/20 border-b border-green-700">
            <div class="flex items-center space-x-2">
                <svg class="w-5 h-5 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <p class="text-green-400 text-sm font-medium">Message sent successfully!</p>
            </div>
            <p class="text-green-300 text-xs mt-1">We'll get back to you soon.</p>
        </div>

        <!-- Form -->
        <div x-show="!submitted" class="p-4 space-y-4">
            <form @submit.prevent="sendMessage()" class="space-y-4">
                <!-- Name -->
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-1">Name</label>
                    <input type="text" x-model="name" required
                           class="w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded-lg text-white placeholder-gray-400 focus:border-[var(--color-store-primary)] focus:ring focus:ring-[var(--color-store-primary)]/50 transition text-sm"
                           placeholder="Your name">
                </div>

                <!-- Email -->
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-1">Email</label>
                    <input type="email" x-model="email" required
                           class="w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded-lg text-white placeholder-gray-400 focus:border-[var(--color-store-primary)] focus:ring focus:ring-[var(--color-store-primary)]/50 transition text-sm"
                           placeholder="your@email.com">
                </div>

                <!-- Message -->
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-1">Message</label>
                    <textarea x-model="message" required rows="3"
                              class="w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded-lg text-white placeholder-gray-400 focus:border-[var(--color-store-primary)] focus:ring focus:ring-[var(--color-store-primary)]/50 transition text-sm resize-none"
                              placeholder="How can we help you?"></textarea>
                </div>

                <!-- Submit Button -->
                <button type="submit"
                        :disabled="loading || !name || !email || !message"
                        :class="{ 'opacity-50 cursor-not-allowed': loading || !name || !email || !message }"
                        class="w-full bg-[var(--color-store-primary)] hover:bg-[#ff5a1a] disabled:bg-gray-600 text-white font-semibold py-2 px-4 rounded-lg transition duration-300 flex items-center justify-center space-x-2">
                    <svg x-show="loading" class="animate-spin w-4 h-4" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    <span x-show="!loading">Send Message</span>
                    <span x-show="loading" x-cloak>Sending...</span>
                </button>
            </form>
        </div>

        <!-- Footer -->
        <div class="px-4 py-3 bg-gray-900 border-t border-gray-700">
            <div class="flex items-center justify-between text-xs text-gray-400">
                <span>💬 Live chat available</span>
                <span>📧 support@technologia.com</span>
            </div>
        </div>
    </div>
</div>

<script>
function sendMessage() {
    this.loading = true;

    // Create form data
    const formData = new FormData();
    formData.append('name', this.name);
    formData.append('email', this.email);
    formData.append('message', this.message);
    formData.append('_token', document.querySelector('meta[name="csrf-token"]').getAttribute('content'));

    // Send to backend
    fetch('/contact/message', {
        method: 'POST',
        body: formData,
        headers: {
            'X-Requested-With': 'XMLHttpRequest'
        }
    })
    .then(response => response.json())
    .then(data => {
        this.loading = false;
        if (data.success) {
            this.submitted = true;
            // Reset form after 3 seconds
            setTimeout(() => {
                this.submitted = false;
                this.name = '';
                this.email = '';
                this.message = '';
            }, 3000);
        } else {
            alert('Error sending message. Please try again.');
        }
    })
    .catch(error => {
        this.loading = false;
        console.error('Error:', error);
        alert('Error sending message. Please try again.');
    });
}
</script>