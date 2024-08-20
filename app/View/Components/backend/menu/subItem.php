<?php

namespace App\View\Components\backend\menu;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class subItem extends Component
{
    public $array, $label;
    /**
     * Create a new component instance.
     */
    public function __construct( $array=[], $label)
    {
        $this->array = $array;
        $this->label = $label;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.backend.menu.sub-item');
    }
}
