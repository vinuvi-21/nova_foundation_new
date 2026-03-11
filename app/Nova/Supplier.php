<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\Badge;
use Laravel\Nova\Http\Requests\NovaRequest;

class Supplier extends Resource
{
    public static $model = \App\Models\Supplier::class;

    public static $title = 'name';

    public static $search = [
        'id', 'name', 'email', 'city', 'country'
    ];

    public function fields(NovaRequest $request)
    {
        return [
            ID::make()->sortable(),

            Text::make('Name')
                ->sortable()
                ->rules('required', 'max:255'),

            Text::make('Email')
                ->sortable()
                ->rules('required', 'email', 'unique:suppliers,email,{{resourceId}}'),

            Text::make('Phone')
                ->rules('required'),

            Text::make('Address')
                ->rules('required'),

            Text::make('City')
                ->sortable()
                ->rules('required'),

            Text::make('Country')
                ->sortable()
                ->rules('required'),

            Select::make('Status')
                ->options([
                    'active'   => 'Active',
                    'inactive' => 'Inactive',
                ])
                ->rules('required'),

            Badge::make('Status')->map([
                'active'   => 'success',
                'inactive' => 'danger',
            ]),

             
            HasMany::make('Products'),
        ];
    }

    public function filters(NovaRequest $request)
    {
        return [];
    }

    public function actions(NovaRequest $request)
    {
        return [];
    }
}
