<x-guest-layout>
    <div class="pb-12 pt-8 min-h-screen flex items-center justify-center px-4">
        <div class="w-full max-w-md card-tech border border-gray-700 p-8 shadow-2xl">
            
            <h1 class="text-3xl font-extrabold text-[var(--color-store-text)] mb-2 text-center tracking-tight">
                Create New Password
            </h1>
            <p class="text-gray-400 text-center mb-8">Enter your email and new password below</p>

            <form method="POST" action="{{ route('password.store') }}" class="space-y-6">
                @csrf
                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-300 mb-2">{{ __('Email Address') }}</label>
                    <input id="email" type="email" name="email" value="{{ old('email', $request->email) }}"
                        class="w-full px-4 py-2 bg-gray-800 border border-gray-700 rounded-lg text-white placeholder-gray-500 focus:border-primary-accent focus:ring focus:ring-primary-accent/50 transition"
                        required autofocus autocomplete="username" />
                    @error('email')<p class="text-red-400 text-sm mt-1">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-300 mb-2">{{ __('New Password') }}</label>
                    <input id="password" type="password" name="password"
                        class="w-full px-4 py-2 bg-gray-800 border border-gray-700 rounded-lg text-white placeholder-gray-500 focus:border-primary-accent focus:ring focus:ring-primary-accent/50 transition"
                        required autocomplete="new-password" />
                    @error('password')<p class="text-red-400 text-sm mt-1">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-300 mb-2">{{ __('Confirm Password') }}</label>
                    <input id="password_confirmation" type="password" name="password_confirmation"
                        class="w-full px-4 py-2 bg-gray-800 border border-gray-700 rounded-lg text-white placeholder-gray-500 focus:border-primary-accent focus:ring focus:ring-primary-accent/50 transition"
                        required autocomplete="new-password" />
                    @error('password_confirmation')<p class="text-red-400 text-sm mt-1">{{ $message }}</p>@enderror
                </div>

                <div class="flex flex-col gap-4 pt-4">
                    <button type="submit" class="btn-primary w-full py-3">
                        {{ __('Reset Password') }}
                    </button>

                    <a class="text-sm text-primary-accent hover:text-white text-center transition font-semibold" href="{{ route('login') }}">
                        {{ __('Back to Sign In') }}
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
