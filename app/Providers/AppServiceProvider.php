<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
// ADD THIS LINE
use Illuminate\Support\Facades\Gate;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Register the Gate used in navigation.blade.php
        // This checks if the authenticated user has administrative privileges.
        Gate::define('view-admin-dashboard', function ($user) {
            // IMPORTANT: Ensure your user model has an 'is_admin' column 
            // or replace this with your actual logic to check admin status.
            return $user->is_admin ?? false; 
        });
    }
}