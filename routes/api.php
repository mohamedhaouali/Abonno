<?php

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['as' => 'api.', 'namespace' => 'Api'], function () {
    /*
     * Outlets Endpoints
     */
    Route::get('agences', 'AgenceController@index')->name('agences.index');
});
Route::group(['as' => 'api.', 'namespace' => 'Api'], function () {
    /*
     * Outlets Endpoints
     */
    Route::get('stations', 'StationController@index')->name('stations.index');

});
Route::group(['as' => 'api.', 'namespace' => 'Api'], function () {
    /*
     * Outlets Endpoints
     */
    Route::get('lines', 'LineController@index')->name('lines.index');

});
