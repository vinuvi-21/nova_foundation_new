<?php

namespace App\Nova\Actions;

use App\Models\Product;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Collection;
use Laravel\Nova\Actions\Action;
use Laravel\Nova\Fields\ActionFields;
use Laravel\Nova\Http\Requests\NovaRequest;

class ExportProduct extends Action
{
    use InteractsWithQueue, Queueable;

    public $name = '⬇ Export Products to CSV';
    public $standalone = true;

    public function handle(ActionFields $fields, Collection $models)
    {
        
        $products = Product::all();
        if ($products->isEmpty()) {
        return Action::danger('No products found to export!');
    }

        $csvContent = "ID,Name,Description,Price,Stock,Created At\n";

        foreach ($products as $product) {
            
            $csvContent .= "\"{$product->id}\","
                . "\"{$product->name}\","
                . "\"{$product->description}\","
                . "\"{$product->price}\","
                . "\"{$product->stock}\","
                . "\"{$product->created_at}\"\n";
        }

        // Step 3: Download the file
        return Action::download(
            'data:text/csv;base64,' . base64_encode($csvContent),
            'products_' . now()->format('Y_m_d') . '.csv'
        );
    }

    public function fields(NovaRequest $request)
    {
        return [];
    }
}
