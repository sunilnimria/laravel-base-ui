<?php

namespace App\View\Components\backend\menu;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class dropDown extends Component
{
    public $label, $icon;
    /**
     * Create a new component instance.
     */
    public function __construct($label, $icon=false)
    {
        $this->label = $label;
        $this->icon = $icon;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.backend.menu.drop-down');
    }
}
