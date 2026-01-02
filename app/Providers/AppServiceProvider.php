<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use App\Models\Registrant;

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
        Gate::define('viewRegistrant', function (User $user, Registrant $registrant) {
            // Example logic: only allow if the user's type ID matches a specific value
            return $user->user_type_id === 1; // Adjust the condition as needed
        });
    }
}
