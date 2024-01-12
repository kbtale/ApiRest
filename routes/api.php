<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuxSettingsController;
use App\Http\Controllers\BackupController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\ExpenseTypeController;
use App\Http\Controllers\FoodCategoryController;
use App\Http\Controllers\FoodItemController;
use App\Http\Controllers\ImportExportController;
use App\Http\Controllers\IngredientController;
use App\Http\Controllers\InvoicePrintController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\Locale\LocaleController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\ModifierController;
use App\Http\Controllers\PaymentMethodController;
use App\Http\Controllers\PosController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\ServiceTableController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserRoleController;

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
|   GET           /customers                index   customers.index
|   POST          /customers                store   customers.store
|   GET           /customers/{customer}     show    customers.show
|   PUT|PATCH     /customers/{customer}     update  customers.update
|   DELETE        /customers/{customer}     destroy customers.destroy
*/

Route::group(['prefix'=>'v1', 'namespace' => 'App\Http\Controllers'], function(){

    Route::group(["prefix" => "files"], function () {
        Route::get("/{file}", [MediaController::class, 'show']);
        Route::post('save', [MediaController::class, 'store']);
        Route::post('store-signature', [MediaController::class, 'storeSignature']);
        Route::get("download/{uuid}", [MediaController::class, 'download']);
        Route::post('attachments', [MediaController::class, 'uploadAttachment']);
    });

    Route::group(["prefix" => "auth"], function () {
        Route::post('login', [AuthController::class, 'login'])->name('auth.login');
        Route::post('logout', [AuthController::class, 'logout'])->name('auth.logout');
        Route::post('register', [AuthController::class, 'register'])->name('auth.register');
        Route::post('recover', [AuthController::class, 'recover'])->name('auth.recover');
        Route::post('reset', [AuthController::class, 'reset'])->name('auth.reset');
        Route::get("user", [AuthController::class, 'user'])->name('auth.user');
        Route::post('check', [AuthController::class, 'check'])->name('auth.check');
    });

    Route::middleware(['auth:sanctum'])->group( function (){
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
            Route::post('submitted-sale', [PosController::class, 'submittedOrder']);
            Route::get('get-submitted-orders', [PosController::class, 'submittedOrders']);
        });
        Route::group(["prefix" => "account"], function () {
            Route::post('update', [AccountController::class, 'update']);
            Route::post('password', [AccountController::class, 'password']);
        });
    
        Route::group(["prefix" => "lang"], function () {
            Route::get('/', [LocaleController::class, 'languageList'])->name('language.list');
            Route::get('/{lang}', [LocaleController::class, 'get'])->name('language.get');
            Route::post('/set-language', [LocaleController::class, 'set'])->name('set-locale');
        });
        
        Route::group(["prefix" => "admin"], function () {
            Route::get('dashboard-states', [DashboardController::class, 'states'])->name('dashboard-states');
            Route::get('dashboard-graphical', [DashboardController::class, 'annualGraph'])->name('dashboard-ag');
    
            Route::get("backups", [BackupController::class, 'index'])->name('backup.index');
            Route::post('backups', [BackupController::class, 'generate'])->name('backup.generate');
            Route::patch('backups/{file}/restore', [BackupController::class, 'restore'])->name('backup.restore');
            Route::post('backups/{file}/remove', [BackupController::class, 'destroy'])->name("backup.destroy");
            Route::get('users/user-roles', [UserController::class, 'userRoles'])->name('users.user-roles');
            Route::get('roles/permissions', [UserRoleController::class, 'permissions'])->name('user-roles.permissions');
            Route::post('languages/sync', [LanguageController::class, 'sync'])->name('language.sync');
    
            Route::group(["prefix" => "settings"], function () {
                Route::get('all', [SettingsController::class, 'getAll'])->name('settings.all');
                Route::get('user-roles', [SettingsController::class, 'userRoles'])->name('settings.user-roles');
                Route::get('languages', [SettingsController::class, 'languages'])->name('settings.languages');
                Route::get('general', [SettingsController::class, 'getGeneral'])->name('settings.get.general');
                Route::post('general', [SettingsController::class, 'setGeneral'])->name('settings.set.general');
                Route::get('appearance', [SettingsController::class, 'getAppearance'])->name('settings.get.appearance');
                Route::post('appearance', [SettingsController::class, 'setAppearance'])->name('settings.set.appearance');
                Route::get('localization', [SettingsController::class, 'getLocalization'])->name('settings.get.localization');
                Route::post('localization', [SettingsController::class, 'setLocalization'])->name('settings.set.localization');
                Route::post('optimize', [SettingsController::class, 'optimize'])->name('settings.optimize');
                Route::get('authentication', [AuxSettingsController::class, 'getAuthentication'])->name('settings.get.authentication');
                Route::post('authentication', [AuxSettingsController::class, 'setAuthentication'])->name('settings.set.authentication');
                Route::get('outgoing/mail', [AuxSettingsController::class, 'getOutgoingMail'])->name('settings.get.outgoing.mail');
                Route::post('outgoing/mail', [AuxSettingsController::class, 'setOutgoingMail'])->name('settings.set.outgoing.mail');
                Route::get('captcha', [AuxSettingsController::class, 'getCaptcha'])->name('settings.get.captcha');
                Route::post('captcha', [AuxSettingsController::class, 'setCaptcha'])->name('settings.set.captcha');
                Route::get('tax', [AuxSettingsController::class, 'getTax'])->name('settings.get.tax');
                Route::post('tax', [AuxSettingsController::class, 'setTax'])->name('settings.set.tax');
                Route::get('currency', [AuxSettingsController::class, 'getCurrency'])->name('settings.get.currency');
                Route::post('currency', [AuxSettingsController::class, 'setCurrency'])->name('settings.set.currency');
            });
            Route::get('food-ingredients', [IngredientController::class, 'getList'])->name('food.ingredients');
            Route::get('food-categories-list', [FoodCategoryController::class, 'categories'])->name('food.categories');
            Route::get('sale-filters', [SaleController::class, 'filters'])->name('sale.filters');
            Route::get('sale-report', [ReportController::class, 'generate'])->name('sale.report');
    
            Route::post('exports', [ImportExportController::class, 'export'])->name('exports');
            Route::post('imports', [ImportExportController::class, 'imports'])->name('imports');
    
            Route::delete('modifiers-rows-destroy', [ModifierController::class, 'destroyBatch'])->name('modifiers.rows.destroy');
            Route::delete('food-category-rows-destroy', [FoodCategoryController::class, 'destroyBatch'])->name('food-category.rows.destroy');
            Route::delete('food-items-rows-destroy', [FoodItemController::class, 'destroyBatch'])->name('products.rows.destroy');
            Route::delete('ingredients-rows-destroy', [IngredientController::class, 'destroyBatch'])->name('ingredients.rows.destroy');
            Route::delete('expense-rows-destroy', [ExpenseController::class, 'destroyBatch'])->name('expenses.rows.destroy');
            Route::get('expense-types-list', [ExpenseTypeController::class, 'expenseTypes'])->name('expense-types.list');
    
            Route::post('report-tax', [ReportController::class, 'tax'])->name('tax.report');
            Route::post('report-expense', [ReportController::class, 'expense'])->name('expense.report');
            Route::get('stock-alerts', [ReportController::class, 'stockAlerts'])->name('stock.alerts');
    
            Route::apiResource('customers', CustomerController::class);
            Route::apiResource('expenses', ExpenseController::class);
            Route::apiResource('expense-types', ExpenseTypeController::class);
            Route::apiResource('payment-methods', PaymentMethodController::class);
            Route::apiResource('modifiers', ModifierController::class);
            Route::apiResource('sales', SaleController::class);
            Route::apiResource('food-items', FoodItemController::class);
            Route::apiResource('ingredients', IngredientController::class);
            Route::apiResource('food-categories', FoodCategoryController::class);
            Route::apiResource('service-tables', ServiceTableController::class);
            Route::apiResource("users", UserController::class);
            Route::apiResource("user-roles", UserRoleController::class);
            Route::apiResource("languages", LanguageController::class);
        });
    });
});