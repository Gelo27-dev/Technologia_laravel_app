<x-guest-layout>
    <div class="pb-12 pt-8 min-h-screen flex items-center justify-center px-4">
        <div class="w-full max-w-md card-tech border border-gray-700 p-8 shadow-2xl">
            
            <h1 class="text-3xl font-extrabold text-[var(--color-store-text)] mb-2 text-center tracking-tight">
                Reset Password
            </h1>
            <p class="text-gray-400 text-center mb-8">
                {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link.') }}
            </p>

            <x-auth-session-status class="mb-6 p-3 bg-green-900/30 border border-green-700 text-green-300 rounded-lg text-sm" :status="session('status')" />

            <form method="POST" action="{{ route('password.email') }}" class="space-y-6">
                @csrf

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-300 mb-2">{{ __('Email Address') }}</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}"
                        class="w-full px-4 py-2 bg-gray-800 border border-gray-700 rounded-lg text-white placeholder-gray-500 focus:border-primary-accent focus:ring focus:ring-primary-accent/50 transition"
                        placeholder="your@email.com" required autofocus />
                    @error('email')<p class="text-red-400 text-sm mt-1">{{ $message }}</p>@enderror
                </div>

                <div class="flex flex-col gap-4 pt-4">
                    <button type="submit" class="btn-primary w-full py-3">
                        {{ __('Send Reset Link') }}
                    </button>

                    <a class="text-sm text-primary-accent hover:text-white text-center transition font-semibold" href="{{ route('login') }}">
                        {{ __('Back to Sign In') }}
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
