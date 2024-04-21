<?php

use App\Models\Demand;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DemandController;
use App\Http\Controllers\StageFileController;
use App\Http\Controllers\TimeTableController;

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

Route::middleware(['auth:user'])->group(function () {
    Route::post('/{userId}/demand', [DemandController::class, 'store'])->name('demand');
    Route::get('stage-file/{id}/download', [StageFileController::class, 'download'])->name('downloadStageFile');
});  
Route::get('time-table/{id}/download', [TimeTableController::class, 'download'])->name('downloadTimeTable');