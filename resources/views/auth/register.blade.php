<x-guest-layout>
<div class="pb-12 pt-8 min-h-screen flex items-center justify-center px-4">
    <div class="w-full max-w-md glass-card border border-gray-700/50 p-8 shadow-2xl">
        
        <h1 class="text-3xl font-extrabold text-[var(--color-store-text)] mb-2 text-center tracking-tight">
            Create Account
        </h1>
        <p class="text-gray-400 text-center mb-8">Join TechVault - Your PC Components Source</p>
        
        <form method="POST" action="{{ route('register') }}" class="space-y-6">
            @csrf

            <!-- Name -->
            <div>
                <label for="name" class="block text-sm font-medium text-gray-300 mb-2">{{ __('Full Name') }}</label>
                <input id="name" type="text" name="name" value="{{ old('name') }}"
                    class="w-full px-4 py-2 bg-gray-800 border border-gray-700 rounded-lg text-white placeholder-gray-500 focus:border-primary-accent focus:ring focus:ring-primary-accent/50 transition"
                    placeholder="John Doe" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2 text-red-400 text-sm" />
            </div>

            <!-- Email Address -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-300 mb-2">{{ __('Email Address') }}</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}"
                    class="w-full px-4 py-2 bg-gray-800 border border-gray-700 rounded-lg text-white placeholder-gray-500 focus:border-primary-accent focus:ring focus:ring-primary-accent/50 transition"
                    placeholder="your@email.com" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-400 text-sm" />
            </div>

            <!-- Password -->
            <div>
                <label for="password" class="block text-sm font-medium text-gray-300 mb-2">{{ __('Password') }}</label>
                <input id="password" type="password" name="password"
                    class="w-full px-4 py-2 bg-gray-800 border border-gray-700 rounded-lg text-white placeholder-gray-500 focus:border-primary-accent focus:ring focus:ring-primary-accent/50 transition"
                    placeholder="••••••••" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-400 text-sm" />
            </div>

            <!-- Confirm Password -->
            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-gray-300 mb-2">{{ __('Confirm Password') }}</label>
                <input id="password_confirmation" type="password" name="password_confirmation"
                    class="w-full px-4 py-2 bg-gray-800 border border-gray-700 rounded-lg text-white placeholder-gray-500 focus:border-primary-accent focus:ring focus:ring-primary-accent/50 transition"
                    placeholder="••••••••" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-red-400 text-sm" />
            </div>

            <!-- CAPTCHA -->
            <div class="glass-card border border-gray-700/50 p-3 rounded-lg">
                {!! NoCaptcha::display() !!}
            </div>

            <x-input-error :messages="$errors->get('captcha')" class="mt-2 text-red-400 text-sm" />

            <div class="flex flex-col gap-4 pt-4">
                <button type="submit" class="btn-primary w-full py-3">
                    {{ __('Create Account') }}
                </button>

                <a class="text-sm text-primary-accent hover:text-white text-center transition font-semibold" href="{{ route('login') }}">
                    {{ __('Already have an account? Sign in') }}
                </a>
            </div>

            <div class="text-center text-gray-500 text-xs mt-6 pt-6 border-t border-gray-700">
                By registering, you agree to our Terms of Service
            </div>
        </form>
    </div>
</div>
</x-guest-layout>