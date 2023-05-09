<?php

use App\Http\Controllers\ContactController;
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


Route::prefix('/')
    ->controller(\App\Http\Controllers\RestaurantController::class)
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/inner-page', 'inner')->name('index.inner');
    });


Route::prefix('contact')->controller(ContactController::class)->name('contact.')->group(function () {
    Route::post('/store', [ContactController::class, 'store'])->name('store');
});

