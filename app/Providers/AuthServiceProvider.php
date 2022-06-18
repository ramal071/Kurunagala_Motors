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
    protected $policies = [
         'App\brand' => 'App\Policies\BrandPolicy',
         'App\Product' => 'App\Policies\ProductPolicy',
         'App\Bike' => 'App\Policies\BikePolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('isManager', function ($user) {
            return $user->first()->slug == 'manager';
        });

        Gate::define('isCashier', function ($user) {
            return $user->first()->slug == 'cashier';
        });

        Gate::define('isCustomer', function ($user) {
            return $user->first()->slug == 'customer';
        });
    }
}
