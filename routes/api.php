<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->group(function () {
    Route::get('user-profiles', [AuthController::class, 'getProfiles']);


    Route::group(['prefix' => 'customer'], function () {
        Route::get('get-customers', [CustomerController::class, 'getAllCustomers']);
        Route::get('get-customer-by-id/{id}', [CustomerController::class, 'getCustomerById']);
        Route::post('create-customer', [CustomerController::class, 'createCustomer']);
        Route::patch('update-customer/{id}', [CustomerController::class, 'updateCustomer']);
    });

    Route::group(['prefix'=> 'product'], function () {
        Route::get('get-products', [ProductController::class,'getAllProducts']);
        Route::get('get-product-by-id/{id}', [ProductController::class,'getProductById']);
        Route::post('create-product', [ProductController::class,'createProduct']);
        Route::patch('update-product/{id}', [ProductController::class,'updateProduct']);
    });

});
Route::post('create-user', [AuthController::class, 'createUser']);
Route::post('login', [AuthController::class, 'auth']);
