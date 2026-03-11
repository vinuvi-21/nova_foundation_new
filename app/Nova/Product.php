<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Http\Requests\NovaRequest;

use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\Number;

use App\Nova\Actions\ExportProduct;
use Vendor\ImagePreviewField\ImagePreviewField;
use Vendor\StarRatingField\StarRatingField;
use App\Nova\Filters\ProductCategory;

class Product extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\Product>
     */
    public static $model = \App\Models\Product::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'id';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
        'name',
        'description',
        'price',
        'stock'
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function fields(NovaRequest $request)
    {
        return [
            ID::make()->sortable(),
            Text::make('name')->sortable()->rules('required'),
            Text::make('description')->sortable()->rules('required'),
            Number::make('price')->rules('required'),
            Number::make('stock')->rules('required'),
            ImagePreviewField::make('Image'),
            StarRatingField::make('Rating')->maxStars(5),
        ];
    }

  public static function fill(NovaRequest $request, $model)
{
    [$model, $callbacks] = parent::fill($request, $model);

    if ($request->hasFile('image')) {
        $path = $request->file('image')->store('products', 'public');
        $model->image = $path;
        $model->save();
    }

    return [$model, $callbacks];
}


    /**
     * Get the cards available for the request.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function cards(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function filters(NovaRequest $request)
    {
        return [
        new ProductCategory(),  
    ];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function lenses(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
public function actions(NovaRequest $request)
{
    return [
        (new ExportProduct)->standalone()->showOnIndex()->showOnDetail(),
         
    ];
}

 
}
