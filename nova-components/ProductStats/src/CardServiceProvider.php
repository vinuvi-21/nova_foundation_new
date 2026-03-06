<?php

namespace User\ProductStats;

use Illuminate\Support\ServiceProvider;
use Laravel\Nova\Events\ServingNova;
use Laravel\Nova\Nova;

class CardServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        Nova::serving(function (ServingNova $event) {
            Nova::script('user-product-stats', __DIR__.'/../dist/js/card.js');
            Nova::style('user-product-stats', __DIR__.'/../dist/css/card.css');
        });
    }

    public function register(): void
    {
        //
    }
}
