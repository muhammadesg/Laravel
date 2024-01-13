<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\CardController;
use App\Http\Controllers\Api\CompletedOrders;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\BannerController;
use App\Http\Controllers\Api\AccordionController;

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

Route::apiResource('categories', CategoryController::class);
Route::apiResource('completedorders', CompletedOrders::class);
Route::apiResource('cards', CardController::class);
Route::apiResource('accordions', AccordionController::class);
Route::apiResource('banners', BannerController::class);
Route::get('/categories/{categoryId}/cards', [CardController::class, 'getCardsForHome']);
Route::post('orders', [OrderController::class, 'store']);
Route::get('orders', [OrderController::class, 'index']);
Route::get('orders/{order}', [OrderController::class, 'show']);
Route::put('orders/{order}', [OrderController::class, 'update']);
Route::delete('orders/{order}', [OrderController::class, 'destroy']);

Route::post('messages', [\App\Http\Controllers\ChatController::class, 'message']);
Route::post('messagesid', [\App\Http\Controllers\ChatController::class, 'markAsRead']);
