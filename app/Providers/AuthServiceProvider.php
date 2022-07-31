<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Product;
use App\Policies\BrandPolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */


    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('isManager', function ($user) {
            return $user->roles->slug == 'manager';
        });

        Gate::define('isCashier', function ($user) {
            return $user->roles->slug == 'cashier';
        });

        Gate::define('isCustomer', function ($user) {
            return $user->first()->roles->slug == 'customer';
        });
    }
}
