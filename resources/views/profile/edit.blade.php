<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center">
            <img src="/images/technologia-logo.svg" alt="Technologia Logo" class="h-8 w-auto mr-2" />
            <h2 class="font-semibold text-2xl text-white leading-tight">
                {{ __('Profile Settings') }}
            </h2>
        </div>
    </x-slot>

    <div class="pb-12 pt-8 min-h-screen">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="card-tech border border-gray-700 p-6 sm:p-8 rounded-lg">
                <div class="max-w-2xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="card-tech border border-gray-700 p-6 sm:p-8 rounded-lg">
                <div class="max-w-2xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="card-tech border border-gray-700 p-6 sm:p-8 rounded-lg">
                <div class="max-w-2xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
