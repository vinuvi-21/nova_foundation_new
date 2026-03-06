<?php

namespace App\Nova\Dashboards;

use Laravel\Nova\Dashboard;
use User\ProductStats\ProductStats;

class Main extends Dashboard
{
    public function cards(): array
    {
        return [
            new ProductStats(),
        ];
    }
}
