<?php

namespace App\Providers;

use App\View\Components\Alert\Error;
use App\View\Components\Forms\Button;
use App\View\Components\Forms\Form;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        #__________________________________________________ Forms
        Blade::component('form',Form::class);
        Blade::component('input',Form\Input::class);
        Blade::component('textarea',Form\Textarea::class);
        Blade::component('button',Button::class);
        #__________________________________________________ Alerts
        Blade::component('error',Error::class);

    }
}
