<?php

namespace App\Providers;

use App\Models\SubscriptionPlan;
use App\Models\SubscriptionPlanFeature;
use Illuminate\Support\ServiceProvider;
use App\Observers\SubscriptionPlanObserver;
use App\Observers\SubscriptionPlanFeatureObserver;

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
        //
    }
}
