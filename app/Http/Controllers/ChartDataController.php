<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ChartDataController extends Controller
{
    public function index(Request $request)
    {
        $filter = $request->query('filter', 'rating');

        if ($filter === 'stock') {
            return $this->stockData();
        } elseif ($filter === 'top_rated') {
            return $this->topRatedData();
        } else {
            return $this->ratingData();
        }
    }

    private function ratingData()
    {
        $data = Product::groupBy('rating')
            ->selectRaw('rating, count(*) as total')
            ->orderBy('rating')
            ->get();

        return response()->json([
            'labels' => $data->map(fn($item) => $item->rating . ' Star')->toArray(),
            'data'   => $data->pluck('total')->toArray(),
        ]);
    }

    private function stockData()
    {
        $high   = Product::where('stock', '>', 100)->count();
        $low    = Product::whereBetween('stock', [10, 100])->count();
        $out    = Product::where('stock', '<', 10)->count();

        return response()->json([
            'labels' => ['High Stock (>100)', 'Low Stock (10-100)', 'Out of Stock (<10)'],
            'data'   => [$high, $low, $out],
        ]);
    }

    private function topRatedData()
    {
        $data = Product::whereIn('rating', [4, 5])
            ->groupBy('rating')
            ->selectRaw('rating, count(*) as total')
            ->orderBy('rating')
            ->get();

        return response()->json([
            'labels' => $data->map(fn($item) => $item->rating . ' Star')->toArray(),
            'data'   => $data->pluck('total')->toArray(),
        ]);
    }

    public function productsByRating(Request $request)
{
    $rating = $request->query('rating', 0);

    $products = Product::where('rating', $rating)
        ->select('id', 'name', 'price', 'stock', 'rating')
        ->get();

    return response()->json([
        'products' => $products,
        'rating'   => $rating,
    ]);
}
}
