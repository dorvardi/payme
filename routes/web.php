<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SalesFormController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('salesForm');
//});

Route::get('/sales', [SalesFormController::class, 'createForm']);


Route::post('/sales', [SalesFormController::class, 'sendFormData'])->name('sales.store');

Route::get('/sales-table', [SalesFormController::class, 'getSalesData']);

Route::group(['middleware' => 'web'], function () {
    Route::get('api/documentation', '\L5Swagger\Http\Controllers\SwaggerController@api')->name('l5swagger.api');
});


