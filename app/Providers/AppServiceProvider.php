<?php

namespace App\Providers;

use App\Models\Invoice;
use App\Models\LivingRoom;
use App\Models\Product;
use App\Models\Role;
use App\Observers\InvoiceObserver;
use App\Observers\LivingRoomObserver;
use App\Observers\ProductObserver;
use App\Observers\RoleObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Product::observe(ProductObserver::class);
        Invoice::observe(InvoiceObserver::class);
        Role::observe(RoleObserver::class);
        LivingRoom::observe(LivingRoomObserver::class);
    }
}
