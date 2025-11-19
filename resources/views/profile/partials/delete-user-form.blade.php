<section class="space-y-6">
    <header>
        <h2 class="text-2xl font-bold text-red-400 mb-2">
            {{ __('Delete Account') }}
        </h2>
        <p class="text-gray-400">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. This action cannot be undone.') }}
        </p>
    </header>

    <button
        type="button"
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
        class="px-6 py-2 bg-red-900/30 text-red-300 border border-red-700 rounded-lg hover:bg-red-900/50 font-semibold transition"
    >{{ __('Delete Account') }}</button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-8">
            @csrf
            @method('delete')

            <h2 class="text-2xl font-bold text-red-400 mb-4">
                {{ __('Delete Your Account?') }}
            </h2>

            <p class="text-gray-400 mb-6">
                {{ __('This action cannot be undone. All your data will be permanently deleted. Please enter your password to confirm.') }}
            </p>

            <div class="mb-6">
                <label for="password" class="block text-sm font-medium text-gray-300 mb-2">{{ __('Password') }}</label>
                <input
                    id="password"
                    name="password"
                    type="password"
                    class="w-full px-4 py-2 bg-gray-800 border border-gray-700 rounded-lg text-white placeholder-gray-500 focus:border-primary-accent focus:ring focus:ring-primary-accent/50 transition"
                    placeholder="{{ __('Enter your password') }}"
                />
                @error('userDeletion.password')<p class="text-red-400 text-sm mt-1">{{ $message }}</p>@enderror
            </div>

            <div class="flex justify-end gap-3 pt-4 border-t border-gray-700">
                <button type="button" x-on:click="$dispatch('close')" class="px-4 py-2 bg-gray-800 text-gray-300 rounded-lg hover:bg-gray-700 font-semibold transition">
                    {{ __('Cancel') }}
                </button>

                <button type="submit" class="px-4 py-2 bg-red-900/30 text-red-300 border border-red-700 rounded-lg hover:bg-red-900/50 font-semibold transition">
                    {{ __('Delete Account') }}
                </button>
            </div>
        </form>
    </x-modal>
</section>
