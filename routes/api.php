<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
|   Here you can find all the API Routes created for this software.
|   All routes are loaded by the RouteServiceProvider and all of them are
|   assigned to the "api" middleware group. Good luck!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

/*  
|   Each apiResource creates the following for each controller ("customers" as an example):
|   Verb          Path                      Action  Route Name
|   GET           /customers                index   users.index
|   POST          /customers                store   users.store
|   GET           /customers/{customer}     show    users.show
|   PUT|PATCH     /customers/{customer}     update  users.update
|   DELETE        /customers/{customer}     destroy users.destroy
*/

Route::group(['prefix'=>'v1', 'namespace' => 'App\Http\Controllers'], function(){
    Route::apiResource('customers',CustomerController::class);
    Route::apiResource('expenses',ExpenseController::class);
    Route::apiResource('expense-types',ExpenseTypeController::class);
    Route::apiResource('food-categories',FoodCategoryController::class);
    Route::apiResource('food-items',FoodItemController::class);
    Route::apiResource('ingredients',IngredientController::class);
    Route::apiResource('media',mediaController::class);
    Route::apiResource('modifiers',mediaController::class);
    Route::apiResource('payment-methods',PaymentMethodController::class);
    Route::apiResource('sales',SaleController::class);
    Route::apiResource('service-tables',ServiceTableController::class);
    Route::apiResource('settings',SettingsController::class);
    Route::apiResource('users',UserController::class);
    Route::apiResource('user-roles',UserRoleController::class);

    Route::group(["prefix" => "files"], function () {
        Route::get("/{file}", [MediaController::class, 'show']);
        Route::post('save', [MediaController::class, 'store']);
        Route::get("download/{uuid}", [MediaController::class, 'download']);
        Route::post('attachments', [MediaController::class, 'uploadAttachment']);
    });

    Route::group(['prefix' => 'pos'], function () {
        Route::get('sale/{sale}', [InvoicePrintController::class, 'sale']);
        Route::get('categories', [PosController::class, 'categories']);
        Route::get('payment-methods', [PosController::class, 'paymentMethods']);
        Route::get('avl-service-tables', [PosController::class, 'serviceTables']);
        Route::get('products', [PosController::class, 'products']);
        Route::get('modifiers', [PosController::class, 'modifiers']);
        Route::get('kitchen-orders', [PosController::class, 'kitchenOrders']);
        Route::post('order-progress/{sale}', [PosController::class, 'orderProgressUpdate']);
        Route::get('customers', [PosController::class, 'customers']);
        Route::post('checkout/{sale}', [PosController::class, 'checkout']);
        Route::post('submited-sale', [PosController::class, 'submitedOrder']);
        Route::get('get-submitted-orders', [PosController::class, 'submiitedOrders']);
    });
});