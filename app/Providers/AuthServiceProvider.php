<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // Define a gate to check if the user is an admin
        Gate::define('isAdmin', function (User $user) {
            return $user->role === User::ROLE_ADMIN; // Pastikan model User memiliki konstanta ROLE_ADMIN
        });
    }
}
