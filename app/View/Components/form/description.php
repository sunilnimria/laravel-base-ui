<?php

namespace App\View\Components\form;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class description extends Component
{
    public $desc ;
    /**
     * Create a new component instance.
     */
    public function __construct( $desc)
    {
        $this->desc = $desc ;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form.description');
    }
}
