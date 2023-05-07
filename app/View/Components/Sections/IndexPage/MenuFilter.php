<?php

namespace App\View\Components\Sections\IndexPage;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class MenuFilter extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.sections.index-page.menu-filter');
    }
}
