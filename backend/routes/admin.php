<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DemandController;
use App\Http\Controllers\StageFileController;
use App\Http\Controllers\TimeTableController;
use App\Http\Controllers\UserController;
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



// Route::view('/', 'welcome');

Route::middleware(['auth:admin'])->group(function () {
    Route::apiResources([
        'users' => UserController::class,
        'demands' => DemandController::class,
        'stage-files' => StageFileController::class, // progresse
        'time-tables' => TimeTableController::class, // done //email
    ]);
    Route::group(['prefix' => 'demand'], function () {
        Route::post('{demandId}/accept', [DemandController::class, 'accept']); //email
        Route::post('{demandId}/not-accept', [DemandController::class, 'notAccept']); //email
    });
});
