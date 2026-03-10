<?php

namespace Vendor\RatingChart;

use Laravel\Nova\Card;
use App\Models\Product;

class RatingChart extends Card
{
    public $width = '1/2';

    public function component()
    {
        return 'rating-chart';
    }

    public function jsonSerialize(): array
    {
        $data = Product::groupBy('rating')
            ->selectRaw('rating, count(*) as total')
            ->orderBy('rating')
            ->get();

        return array_merge(parent::jsonSerialize(), [
            'ratings' => $data->pluck('total')->toArray(),
            'labels' => $data->map(fn($item) => $item->rating . ' Star')->toArray(),
        ]);
    }
}
