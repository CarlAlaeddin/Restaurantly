<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChefController;
use App\Http\Controllers\ChooseController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SpecialController;
use App\Http\Controllers\TagController;
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
    Route::prefix('/profile')
        ->controller(ProfileController::class)
        ->name('profile.')
        ->group(function () {
            Route::get('/'                   , 'index')      ->name('index');
            Route::get('/create'             , 'create')     ->name('create');
            Route::get('/show/{profile}'     , 'show')       ->name('show');
            Route::get('/edit/{profile}'     , 'edit')       ->name('edit');
            Route::post('/destroy/{profile}' , 'destroy')    ->name('destroy');
            Route::post('/update/{profile}'  , 'update')     ->name('update');
            Route::post('/store'             , 'store')      ->name('store');
        });

    #__________________________________________ Contact Form
    Route::prefix('/contact')
        ->controller(ContactController::class)
        ->name('contact.')
        ->group(function () {
            Route::get('/'                  , 'index')      ->name('index');
        });
    #__________________________________________ Menu
    Route::prefix('/menu')
        ->controller(MenuController::class)
        ->name('menu.')
        ->group(function () {
            Route::get('/'                  , 'index')      ->name('index');
            Route::get('/create'            , 'create')     ->name('create');
            Route::get('/show/{menu}'       , 'show')       ->name('show');
            Route::get('/edit/{menu}'       , 'edit')       ->name('edit');
            Route::post('/destroy/{menu}'   , 'destroy')    ->name('destroy');
            Route::post('/update/{menu}'    , 'update')     ->name('update');
            Route::post('/store'            , 'store')      ->name('store');
        });

    #___________________________________________ Tags
    Route::prefix('/tags')
        ->controller(TagController::class)
        ->name('tag.')
        ->group(function () {
            Route::get('/'                  , 'index')      ->name('index');
            Route::get('/create'            , 'create')     ->name('create');
            Route::get('/edit/{tag}'        , 'edit')       ->name('edit');
            Route::post('/destroy/{tag}'    , 'destroy')    ->name('destroy');
            Route::post('/update/{tag}'     , 'update')     ->name('update');
            Route::post('/store'            , 'store')      ->name('store');
        });

    #___________________________________________ Category

    Route::prefix('/categories')
        ->controller(CategoryController::class)
        ->name('category.')
        ->group(function () {
            Route::get('/'                   , 'index')     ->name('index');
            Route::get('/create'             , 'create')    ->name('create');
            Route::get('/edit/{category}'    , 'edit')      ->name('edit');
            Route::post('/destroy/{category}', 'destroy')   ->name('destroy');
            Route::post('/update/{category}' , 'update')    ->name('update');
            Route::post('/store'             , 'store')     ->name('store');
        });

    #___________________________________________ Chef
    Route::prefix('/chef')
        ->controller(ChefController::class)
        ->name('chef.')
        ->group(function () {
            Route::get('/'                  , 'index')      ->name('index');
            Route::get('/create'            , 'create')     ->name('create');
            Route::get('/show/{chef}'       , 'show')       ->name('show');
            Route::get('/edit/{chef}'       , 'edit')       ->name('edit');
            Route::post('/destroy/{chef}'   , 'destroy')    ->name('destroy');
            Route::post('/update/{chef}'    , 'update')     ->name('update');
            Route::post('/store'            , 'store')      ->name('store');
        });

    #___________________________________________ Gallery
    Route::prefix('/gallery')
        ->controller(GalleryController::class)
        ->name('gallery.')
        ->group(function () {
            Route::get('/'                  , 'index')      ->name('index');
            Route::get('/create'            , 'create')     ->name('create');
            Route::get('/show/{gallery}'    , 'show')       ->name('show');
            Route::get('/edit/{gallery}'    , 'edit')       ->name('edit');
            Route::post('/destroy/{gallery}', 'destroy')    ->name('destroy');
            Route::post('/update/{gallery}' , 'update')     ->name('update');
            Route::post('/store'            , 'store')      ->name('store');
        });

    #___________________________________________ Event
    Route::prefix('/event')
        ->controller(EventController::class)
        ->name('event.')
        ->group(function () {
            Route::get('/'                  , 'index')      ->name('index');
            Route::get('/create'            , 'create')     ->name('create');
            Route::get('/show/{event}'      , 'show')       ->name('show');
            Route::get('/edit/{event}'      , 'edit')       ->name('edit');
            Route::post('/destroy/{event}'  , 'destroy')    ->name('destroy');
            Route::post('/update/{event}'   , 'update')     ->name('update');
            Route::post('/store'            , 'store')      ->name('store');
        });

    #___________________________________________ Choose
    Route::prefix('/choose')
        ->controller(ChooseController::class)
        ->name('choose.')
        ->group(function () {
            Route::get('/'                   , 'index')      ->name('index');
            Route::get('/create'             , 'create')     ->name('create');
            Route::get('/show/{choose}'      , 'show')       ->name('show');
            Route::get('/edit/{choose}'      , 'edit')       ->name('edit');
            Route::post('/destroy/{choose}'  , 'destroy')    ->name('destroy');
            Route::post('/update/{choose}'   , 'update')     ->name('update');
            Route::post('/store'             , 'store')      ->name('store');
        });

    #___________________________________________ Special
    Route::prefix('/special')
        ->controller(SpecialController::class)
        ->name('special.')
        ->group(function () {
            Route::get('/'                   , 'index')      ->name('index');
            Route::get('/create'             , 'create')     ->name('create');
            Route::get('/show/{special}'     , 'show')       ->name('show');
            Route::get('/edit/{special}'     , 'edit')       ->name('edit');
            Route::post('/destroy/{special}' , 'destroy')    ->name('destroy');
            Route::post('/update/{special}'  , 'update')     ->name('update');
            Route::post('/store'             , 'store')      ->name('store');
        });

});
