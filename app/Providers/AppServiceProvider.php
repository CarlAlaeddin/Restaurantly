<?php

namespace App\Providers;

use App\View\Components\Admin\Breadcrumb\Breadcrumb;
use App\View\Components\Admin\Breadcrumb\Nav;
use App\View\Components\Admin\Breadcrumb\NavItem;
use App\View\Components\Admin\Breadcrumb\Title;
use App\View\Components\Alert\Error;
use App\View\Components\Forms\Button;
use App\View\Components\Forms\Form;
use App\View\Components\Section\IndexPage\MenuFilter;
use App\View\Components\Sections\IndexPage\ChooseBox;
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
        Blade::component('form', Form::class);
        Blade::component('input', Form\Input::class);
        Blade::component('textarea', Form\Textarea::class);
        Blade::component('button', Button::class);
        #__________________________________________________ Alerts
        Blade::component('error', Error::class);
        #__________________________________________________ Element
        Blade::component('choose-box', ChooseBox::class);
        Blade::component('menu-filter', MenuFilter::class);

        #__________________________________________________ Admin
        Blade::component('breadcrumb', Breadcrumb::class);
        Blade::component('title', Title::class);
        Blade::component('nav', Nav::class);
        Blade::component('nav-item', NavItem::class);
    }
}
