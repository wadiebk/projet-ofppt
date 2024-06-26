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



Route::view('/', 'welcome');

Route::group(['prefix' => ''], function () {
    require __DIR__ . '/auth.php';
});
Route::group(['prefix' => 'admin'], function () {
    require __DIR__ . '/admin.php';
});
Route::group(['prefix' => 'stagiaire'], function () {
    require __DIR__ . '/user.php';
});