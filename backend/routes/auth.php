<?php

use App\Http\Controllers\AuthController;
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

Route::post('{guard}/login', [AuthController::class, 'login'])->middleware(['guest']);
Route::get('{guard}/logout', [AuthController::class, 'logout'])->middleware(['auth']);
