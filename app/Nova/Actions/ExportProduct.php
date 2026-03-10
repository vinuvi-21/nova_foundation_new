<?php

namespace App\Nova\Actions;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Collection;
use Laravel\Nova\Actions\Action;
use Laravel\Nova\Fields\ActionFields;
use Laravel\Nova\Http\Requests\NovaRequest;

class ExportProduct extends Action
{
    use InteractsWithQueue, Queueable;

    public $name = 'Export Products to CSV';

    public function handle(ActionFields $fields, Collection $models)
    {
        // Step 1: CSV headers matching your columns
        $csvContent = "ID,Name,Description,Price,Stock,Created At\n";

        // Step 2: Loop through selected products
        foreach ($models as $product) {
            // Step 3: Add each product as a line
            $csvContent .= "{$product->id},{$product->name},{$product->description},{$product->price},{$product->stock},{$product->created_at}\n";
        }

        // Step 4: Download the file
        return Action::download(
            'data:text/csv;base64,' . base64_encode($csvContent),
            'products.csv'
        );
    }

    public function fields(NovaRequest $request)
    {
        return [];
    }
}
