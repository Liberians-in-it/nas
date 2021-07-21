<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\Address\Http\Controllers\Api\V1\{
    AddressController,
    CountryController,
    DivisionTypeController,
    DivisionController,
    StreetController
};

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

Route::middleware('auth:api')->get('/address', function (Request $request) {
    return $request->user();
});


Route::middleware('auth:api')->prefix('v1/address')->group(function () {

    // country
    Route::resource('countries', CountryController::class);

    // division type
    Route::resource('division-types', DivisionTypeController::class);

    // division
    Route::resource('divisions', DivisionController::class);

    // street
    Route::resource('streets', StreetController::class);

    // address
    Route::resource('addresses', AddressController::class);

});
