<?php

namespace App\Nova\Filters;

use Illuminate\Http\Request;
use Laravel\Nova\Filters\Filter;

class ProductCategory extends Filter
{
    public $name = 'Category';

    public function apply(Request $request, $query, $value)
    {
        return $query->where('category', $value);
    }

    public function options(Request $request)
    {
        return [
            'Electronics'            => 'Electronics',
            'Furniture'              => 'Furniture',
            'Kitchen'                => 'Kitchen',
            'Sports & Fitness'       => 'Sports & Fitness',
            'Books & Stationery'     => 'Books & Stationery',
            'Clothing & Accessories' => 'Clothing & Accessories',
            'Health & Beauty'        => 'Health & Beauty',
            'Outdoor & Garden'       => 'Outdoor & Garden',
        ];
    }
}