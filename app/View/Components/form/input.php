<?php

namespace App\View\Components\form;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class input extends Component
{
    public $labelFor , $labelName, $desc;
    /**
     * Create a new component instance.
     */
    public function __construct( $labelFor = false, $labelName =false , $desc )
    {
        $this->labelFor = $labelFor;
        $this->labelName = $labelName;
        $this->desc = $desc;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form.input');
    }
}
