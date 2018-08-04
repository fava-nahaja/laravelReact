<?php

use Illuminate\Http\Request;
use App\Product;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('products', function() {
    return response(Product::all(), 200);
});

Route::get('products/{product}', function($productId) {
    return response(Product::find($productId), 200);
});

Route::post('products', function(Request $request) {
    $resp = Product::create($request->all());
    return $resp;
});
 
Route::put('products/{product}', function(Request $request, $productId) {
    $product = Product::findOrFail($productId);
    $product->update($request->all());
    return $product;
});
 
Route::delete('products/{product}',function($productId) {
    Product::find($productId)->delete();
    return 204;
});