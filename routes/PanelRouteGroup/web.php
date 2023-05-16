<?php


use App\Http\Controllers\PanelController;
use Illuminate\Support\Facades\Route;

Route::prefix('/home/panel')
    ->middleware(['auth', 'verified','check.client'])
    ->controller(PanelController::class)
    ->name('panel.')
    ->group(function () {
        Route::get('/','index')->name('index');
        Route::get('/event','event')->name('event');
        Route::get('/all-event','all_event')->name('all-event');
    });
