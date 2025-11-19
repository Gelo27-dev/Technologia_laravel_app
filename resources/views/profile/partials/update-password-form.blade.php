<section>
    <header>
        <h2 class="text-2xl font-bold text-[var(--color-store-text)] mb-2">
            {{ __('Update Password') }}
        </h2>
        <p class="text-gray-400">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-8 space-y-6">
        @csrf
        @method('put')

        <div>
            <label for="update_password_current_password" class="block text-sm font-medium text-gray-300 mb-2">{{ __('Current Password') }}</label>
            <input id="update_password_current_password" name="current_password" type="password" 
                class="w-full px-4 py-2 bg-gray-800 border border-gray-700 rounded-lg text-white placeholder-gray-500 focus:border-primary-accent focus:ring focus:ring-primary-accent/50 transition" 
                autocomplete="current-password" />
            @error('updatePassword.current_password')<p class="text-red-400 text-sm mt-1">{{ $message }}</p>@enderror
        </div>

        <div>
            <label for="update_password_password" class="block text-sm font-medium text-gray-300 mb-2">{{ __('New Password') }}</label>
            <input id="update_password_password" name="password" type="password" 
                class="w-full px-4 py-2 bg-gray-800 border border-gray-700 rounded-lg text-white placeholder-gray-500 focus:border-primary-accent focus:ring focus:ring-primary-accent/50 transition" 
                autocomplete="new-password" />
            @error('updatePassword.password')<p class="text-red-400 text-sm mt-1">{{ $message }}</p>@enderror
        </div>

        <div>
            <label for="update_password_password_confirmation" class="block text-sm font-medium text-gray-300 mb-2">{{ __('Confirm Password') }}</label>
            <input id="update_password_password_confirmation" name="password_confirmation" type="password" 
                class="w-full px-4 py-2 bg-gray-800 border border-gray-700 rounded-lg text-white placeholder-gray-500 focus:border-primary-accent focus:ring focus:ring-primary-accent/50 transition" 
                autocomplete="new-password" />
            @error('updatePassword.password_confirmation')<p class="text-red-400 text-sm mt-1">{{ $message }}</p>@enderror
        </div>

        <div class="flex items-center gap-4 pt-4 border-t border-gray-700">
            <button type="submit" class="btn-primary btn-animated">{{ __('Update Password') }}</button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 3000)"
                    class="text-sm text-green-400 font-medium"
                >{{ __('Password updated successfully!') }}</p>
            @endif
        </div>
    </form>
</section>
