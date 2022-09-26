<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\HomeApplianceController;
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
Route::prefix('v1')->group(function() {
    Route::get('/home-appliances/brands', [HomeApplianceController::class,'brands'])->name('home-appliance.brands');
    Route::apiResource('/home-appliances', HomeApplianceController::class)->except(['edit', 'create']);
});
