<?php

use App\Http\Controllers\OrdenController;
use App\Http\Controllers\ProductoController;
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

Route::controller(ProductoController::class)
    ->prefix('/productos')
    ->group(function () {
        Route::get('/', 'index');
    });
    
    Route::controller(OrdenController::class)
    ->prefix('/ordenes')
    ->group(function () {
        Route::get('/', 'index');
        Route::post('/', 'store');
    });