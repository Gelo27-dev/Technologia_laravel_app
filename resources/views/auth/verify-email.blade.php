<x-guest-layout>
    <div class="pb-12 pt-8 min-h-screen flex items-center justify-center px-4">
        <div class="w-full max-w-md card-tech border border-gray-700 p-8 shadow-2xl">
            
            <h1 class="text-3xl font-extrabold text-[var(--color-store-text)] mb-2 text-center tracking-tight">
                Verify Email
            </h1>
            
            <div class="bg-blue-900/30 border border-blue-700 text-blue-300 p-4 rounded-lg mb-8 text-sm">
                {{ __('Thanks for signing up! Before getting started, please verify your email address by clicking on the link we just emailed to you.') }}
            </div>

            @if (session('status') == 'verification-link-sent')
                <div class="mb-6 font-medium text-sm text-green-400 bg-green-900/30 border border-green-700 p-3 rounded-lg">
                    {{ __('A new verification link has been sent to your email address.') }}
                </div>
            @endif

            <div class="space-y-3">
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf
                    <button type="submit" class="btn-primary w-full py-3">
                        {{ __('Resend Verification Email') }}
                    </button>
                </form>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full px-4 py-3 text-primary-accent border border-gray-700 rounded-lg hover:border-primary-accent hover:bg-gray-800 font-semibold transition">
                        {{ __('Log Out') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
