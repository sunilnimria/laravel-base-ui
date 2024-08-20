<?php

namespace App\View\Components\modal;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class modalFooter extends Component
{
    public $btnLabel ;
    /**
     * Create a new component instance.
     */
    public function __construct( $btnLabel ="Add" )
    {
        $this->btnLabel =$btnLabel;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.modal.modal-footer');
    }
}
