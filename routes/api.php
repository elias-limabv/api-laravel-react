<?php

use App\Models\Product;
use App\Http\Controllers\ProductController;
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

// Route::resource('products', ProductController::class);

// Public routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/products', [ProductController::class, 'index']);

/*Route::get('/products', function() {
    return Product::all();
});
//Route::get('/products', function() {
    return 'products';
//});

Route::post('/products', function() {
    return Product::create([
        'nome' => 'Product one',
        'descricao' => 'this is product one',
        'categoria' => 'this is categoria one',
        'imagem' => 'this is imagem one',
        'preco' => '99.99',
        'material' => 'this is material one',
        'departamento' => 'this is departamento one'
    ]);
});*/

//Route::resource('products', ProductController::class);

Route::get('/products/{id}', [ProductController::class, 'show']);
Route::get('/products/search/{nome}', [ProductController::class, 'search']);


// Protected routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/products', [ProductController::class, 'store']);
    Route::put('/products/{id}', [ProductController::class, 'update']);
    Route::delete('/products/{id}', [ProductController::class, 'destroy']);
    Route::post('/logout', [AuthController::class, 'logout']);
});



Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});