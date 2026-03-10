<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Product;

use App\Http\Controllers\ChartDataController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/product-stats', function () {
    return response()->json([
        'totalProducts' => Product::count(),
        'totalStock'    => Product::sum('stock'),
        'totalValue'    => Product::sum('price'),
    ]);
});

Route::get('/chart-data', [ChartDataController::class, 'index']);
Route::get('/products-by-rating', [ChartDataController::class, 'productsByRating']);
