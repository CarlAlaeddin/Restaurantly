<?php

namespace App\View\Components\Sections\IndexPage;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ChooseBox extends Component
{
    public mixed $choose;
    /**
     * Create a new component instance.
     */
    public function __construct($choose)
    {
        $this->choose = $choose;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.sections.index-page.choose-box');
    }
}
