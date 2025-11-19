<x-guest-layout>
<x-auth-session-status class="mb-4" :status="session('status')" />

<div class="pb-12 pt-8 min-h-screen flex items-center justify-center px-4">
    <div class="w-full max-w-md card-tech border border-gray-700 p-8 shadow-2xl">
        
        <h1 class="text-3xl font-extrabold text-[var(--color-store-text)] mb-2 text-center tracking-tight">
            Sign In
        </h1>
        <p class="text-gray-400 text-center mb-8">Welcome back to TechVault</p>
        
        <form method="POST" action="{{ route('login') }}" class="space-y-6">
            @csrf

            <!-- Email Address -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-300 mb-2">{{ __('Email Address') }}</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}"
                    class="w-full px-4 py-2 bg-gray-800 border border-gray-700 rounded-lg text-white placeholder-gray-500 focus:border-primary-accent focus:ring focus:ring-primary-accent/50 transition"
                    placeholder="your@email.com" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-400 text-sm" />
            </div>

            <!-- Password -->
            <div>
                <label for="password" class="block text-sm font-medium text-gray-300 mb-2">{{ __('Password') }}</label>
                <input id="password" type="password" name="password"
                    class="w-full px-4 py-2 bg-gray-800 border border-gray-700 rounded-lg text-white placeholder-gray-500 focus:border-primary-accent focus:ring focus:ring-primary-accent/50 transition"
                    placeholder="••••••••" required autocomplete="current-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-400 text-sm" />
            </div>

            <!-- Remember Me -->
            <div class="flex items-center">
                <input id="remember_me" type="checkbox" name="remember"
                    class="w-4 h-4 rounded bg-gray-700 border-gray-600 checked:bg-primary-accent checked:border-primary-accent cursor-pointer" />
                <label for="remember_me" class="ms-2 text-sm text-gray-400">
                    {{ __('Remember me') }}
                </label>
            </div>
            
            <!-- CAPTCHA -->
            <div class="mt-4 glass-card border border-gray-700/50 p-3 rounded-lg">
                {!! NoCaptcha::display() !!}
            </div>

            <!-- Error Messages -->
            <x-input-error :messages="$errors->get('captcha')" class="mt-2 text-red-400 text-sm" />

            <div class="flex flex-col gap-4 pt-4">
                <button type="submit" class="btn-primary w-full py-3">
                    {{ __('Sign In') }}
                </button>

                @if (Route::has('password.request'))
                    <a class="text-sm text-primary-accent hover:text-white text-center transition font-semibold" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
            </div>

            <div class="text-center text-gray-400 text-sm mt-6 pt-6 border-t border-gray-700">
                Don't have an account?
                <a href="{{ route('register') }}" class="text-primary-accent hover:text-white font-semibold transition">
                    Sign up here
                </a>
            </div>
        </form>
    </div>
</div>

</x-guest-layout>