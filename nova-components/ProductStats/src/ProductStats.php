<?php

namespace User\ProductStats;

use Laravel\Nova\Card;

class ProductStats extends Card
{
    public $width = 'full';

    public function component(): string
    {
        return 'vinu-product-stats';
    }
}
