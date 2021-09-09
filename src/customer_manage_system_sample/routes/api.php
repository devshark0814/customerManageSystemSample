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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

/*-------------------------------------
 | 顧客情報
 |-------------------------------------
*/
Route::post('/customer_index',[App\Http\Controllers\TCustomerController::class, 'index']);
Route::post('/customer_store',[App\Http\Controllers\TCustomerController::class, 'store']);
Route::post('/customer_update',[App\Http\Controllers\TCustomerController::class, 'update']);
Route::post('/customer_destroy',[App\Http\Controllers\TCustomerController::class, 'destroy']);

/*-------------------------------------
 | かんばん
 |-------------------------------------
*/

Route::post('/kanban_index',[App\Http\Controllers\KanbanController::class, 'index']);