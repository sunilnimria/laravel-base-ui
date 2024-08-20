<?php

namespace App\View\Components\backend\menu;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class heading extends Component
{
    public $title, $icon;
    /**
     * Create a new component instance.
     */
    public function __construct($title, $icon = false)
    {
        $this->title = $title;
        $this->icon = $icon;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.backend.menu.heading');
    }
}
