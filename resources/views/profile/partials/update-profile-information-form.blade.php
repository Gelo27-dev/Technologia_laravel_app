<section>
    <header>
        <h2 class="text-2xl font-bold text-[var(--color-store-text)] mb-2">
            {{ __('Profile Information') }}
        </h2>
        <p class="text-gray-400">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-8 space-y-6">
        @csrf
        @method('patch')

        <div>
            <label for="name" class="block text-sm font-medium text-gray-300 mb-2">{{ __('Full Name') }}</label>
            <input id="name" name="name" type="text" value="{{ old('name', $user->name) }}" 
                class="w-full px-4 py-2 bg-gray-800 border border-gray-700 rounded-lg text-white placeholder-gray-500 focus:border-primary-accent focus:ring focus:ring-primary-accent/50 transition" 
                required autofocus autocomplete="name" />
            @error('name')<p class="text-red-400 text-sm mt-1">{{ $message }}</p>@enderror
        </div>

        <div>
            <label for="email" class="block text-sm font-medium text-gray-300 mb-2">{{ __('Email Address') }}</label>
            <input id="email" name="email" type="email" value="{{ old('email', $user->email) }}" 
                class="w-full px-4 py-2 bg-gray-800 border border-gray-700 rounded-lg text-white placeholder-gray-500 focus:border-primary-accent focus:ring focus:ring-primary-accent/50 transition" 
                required autocomplete="username" />
            @error('email')<p class="text-red-400 text-sm mt-1">{{ $message }}</p>@enderror

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="mt-3 p-3 bg-yellow-900/30 border border-yellow-700 rounded-lg">
                    <p class="text-sm text-yellow-300">
                        {{ __('Your email address is unverified.') }}
                        <button form="send-verification" class="text-primary-accent hover:text-white underline font-semibold">
                            {{ __('Resend verification email') }}
                        </button>
                    </p>
                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-semibold text-sm text-green-400">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4 pt-4 border-t border-gray-700">
            <button type="submit" class="btn-primary btn-animated">{{ __('Save Changes') }}</button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 3000)"
                    class="text-sm text-green-400 font-medium"
                >{{ __('Profile updated successfully!') }}</p>
            @endif
        </div>
    </form>
</section>
