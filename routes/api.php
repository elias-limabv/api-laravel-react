<?php

use App\Models\Product;
use App\Http\Resources\ProductResource;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Api\ProductListAll;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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


// Public routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/products', [ProductController::class, 'index']);

Route::resource('products', ProductController::class);

Route::get('/products/{provider}/{id}', [ProductController::class, 'show']);
Route::get('/products/search/{nome}', [ProductController::class, 'search']);

//Route::apiResource('products', 'api\ProductController');

// list product by id
Route::get('/products/{id}', function ($id) {
    return new ProductResource(User::findOrFail($id));
});

// list all products
Route::get('/products', [ProductController::class, 'index']);


// Protected routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/products', [ProductController::class, 'store']);
    Route::put('/products/{id}', [ProductController::class, 'update']);
    Route::delete('/products/{id}', [ProductController::class, 'destroy']);
    Route::post('/logout', [AuthController::class, 'logout']);
});


/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/