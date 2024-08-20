<?php

namespace App\View\Components\modal;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class modalHeader extends Component
{
    public $modalTitle ;
    /**
     * Create a new component instance.
     */
    public function __construct( $modalTitle = false )
    {
        $this->modalTitle = $modalTitle;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.modal.modal-header');
    }
}
