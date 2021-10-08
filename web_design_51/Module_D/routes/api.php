<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\HouseController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\AdsController;

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

Route::prefix('v1')->group(function(){

    Route::prefix('user')->group(function(){
        Route::post('login', [UserController::class, 'login'])->middleware('type');
        Route::post('logout', [UserController::class, 'logout'])->middleware('role');
        Route::post('register', [UserController::class, 'register'])->middleware('type');
    });

    Route::get('houses', [HouseController::class, 'getHouses']);
    Route::get('house/{house_id}', [HouseController::class, 'getHouse']);

    Route::middleware('role:NORMAL')->group(function(){

        Route::post('house', [HouseController::class, 'postHouse'])->middleware('type');
        Route::put('house/{house_id}', [HouseController::class, 'putHouse'])->middleware('type');
        Route::delete('house/{house_id}', [HouseController::class, 'deleteHouse']);

        Route::get('collections', [CollectionController::class, 'getCollections']);

        Route::post('collection', [CollectionController::class, 'postCollection'])->middleware('type');
        Route::delete('collection/{collection_id}', [CollectionController::class, 'deleteCollection']);

        Route::post('ads', [AdsController::class, 'postAds'])->middleware('type');
    });

    Route::middleware('role:ADMIN')->group(function(){

        Route::get('ads', [AdsController::class, 'getAds']);
        Route::put('ads/{ads_id}', [AdsController::class, 'putAds'])->middleware('type');
        Route::delete('ads/{ads_id}', [AdsController::class, 'deleteAds']);

    });

});