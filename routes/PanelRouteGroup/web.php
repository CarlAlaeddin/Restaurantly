<?php


use App\Http\Controllers\PanelController;
use Illuminate\Support\Facades\Route;

Route::prefix('/panel')
    ->middleware(['auth', 'verified','check.client'])
    ->controller(PanelController::class)
    ->group(function () {
        Route::get('/','index')->name('index');
    });
