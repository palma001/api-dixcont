<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\PaymentReportController;
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

Route::group([
    'prefix' => 'authentication',
], function ($router) {
    // Routes
    $router->post('/login', 'Login\Login@authentication');
    $router->post('/refresh-token', 'Login\RefreshToken@refreshToken');
});

Route::group([
    'middleware' => 'auth:api',
], function ($router) {
    $router->post('free-tables', 'TableController@freeTables');

    $router->resource('users', UserController::class);
    $router->resource('roles', RoleController::class);
    $router->resource('products', ProductController::class);
    $router->resource('invoices', InvoiceController::class);
    $router->resource('categories', CategoryController::class);
    $router->resource('payment-methods', PaymentMethodController::class);
    $router->resource('coins', CoinController::class);
    $router->resource('invoice-types', InvoiceTypeController::class);
    $router->resource('clients', ClientController::class);
    $router->resource('sellers', SellerController::class);
    $router->resource('tables', TableController::class);
    $router->resource('modules', ModuleController::class);
    $router->resource('living-rooms', LivingRoomController::class);
    $router->resource('invoice-payments', InvoicePaymentController::class);
    $router->resource('taxes', TaxeController::class);
    $router->resource('product-images', ProductImageController::class);
    $router->resource('type-of-services', TypeOfServiceController::class);
    $router->get('exchange-rate', [ApiController::class, 'exchangeRate']);
    $router->get('get-documents/{documentType}/{documentNumber}', [ApiController::class, 'getDocuments']);
    $router->group(['prefix' => 'reports'], function ($router) {
        $router->get('payment-totals', [PaymentReportController::class, 'getPaymentTotals']);
    });
});


$router->get('print-invoice/{id}', [InvoiceController::class, 'printInvoice']);
