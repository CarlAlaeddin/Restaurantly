<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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


Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::prefix('/home')->middleware(['auth', 'verified'])->group(function () {

    #__________________________________________ Users

    Route::prefix('/user')
        ->controller(UserController::class)
        ->name('user.')
        ->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/show/{user}', 'show')->name('show');
            Route::post('/destroy/{user}', 'destroy')->name('destroy');
        });

    #__________________________________________ Contact Form
    Route::prefix('/contact')
        ->controller(ContactController::class)
        ->name('contact.')
        ->group(function () {
            Route::get('/', 'index')->name('index');
        });
    #__________________________________________ Menu
    Route::prefix('/menu')
        ->controller(MenuController::class)
        ->name('menu.')
        ->group(function () {
            Route::get('/',  'index')->name('index');
            Route::get('/create',  'create')->name('create');
            Route::get('/show/{menu}','show')->name('show');
            Route::get('/edit/{menu}','edit')->name('edit');
            Route::post('/destroy/{menu}','destroy')->name('destroy');
            Route::post('/update/{menu}','update')->name('update');
            Route::post('/store','store')->name('store');

        });


});
