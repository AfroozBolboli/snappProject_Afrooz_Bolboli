<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Customer;
use App\Models\CustomerAddress;
use App\Models\Order;
use App\Models\Restaurant;
use App\Models\User;
use App\Policies\CustomerAddressPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        CustomerAddress::class => CustomerAddressPolicy::class
    ];
    public function boot()
    {
        $this->registerPolicies();

        // Gate::define('show-Address', function (Customer $customer, CustomerAddress $customerAddress) {
        //     return $customerAddress->user_id == $customer->id;
        // });

        Gate::define(('customerAddress'), fn(Customer $customer, CustomerAddress $customerAddress) => $customerAddress->user_id == $customer->id);
        Gate::define(('customercart'), fn(Customer $customer, Order $order) => $order->customer_id == $customer->id);
        Gate::define(('isAdmin'), fn(User $user) => $user->role == 1);
        //Gate::define(('retaurantOwner'), fn(User $user, Restaurant $restaurant) => $restaurant->owner_id == $user->id);
    }
}
