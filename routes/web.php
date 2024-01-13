<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\AccordionController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CompletedOrderController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\EnterCodeController;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', function () {
    return view('admin.index');
})->name('dashboard');

// Auth::routes();

// Route::middleware(['auth', 'verified', 'App\Http\Middleware\EnsureEmailIsVerified'])->group(function () {
//     // Добавлено имя маршрута для дашборда
//     Route::get('/dashboard', [EnterCodeController::class, 'dashboard'])->name('dashboard');
// });


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('abouts', AboutController::class);
Route::resource('categories', CategoryController::class);
Route::resource('cards', CardController::class);
Route::resource('accordions', AccordionController::class);
Route::resource('orders', OrderController::class);
Route::resource('completedOrders', CompletedOrderController::class);
Route::resource('banners', BannerController::class);
Route::resource('chats', ChatController::class);

Route::get('lang/{lang}', function ($lang) {
    session(['lang' => $lang]);
    return back();
})->name('language');

// web.php
Route::get('/enter-code', [EnterCodeController::class, 'showCodeForm'])->middleware(['auth', 'verified'])->name('enter-code');
Route::post('/verify-code', [EnterCodeController::class, 'verifyCode'])->middleware(['auth', 'verified'])->name('verify-code');

require __DIR__.'/auth.php';
