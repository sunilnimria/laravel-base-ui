<?php

namespace App\View\Components\form;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class radio extends Component
{
    public $options, $labelName ;
    /**
     * Create a new component instance.
     */
    public function __construct(array $options, string $labelName="Label")
    {
        $this->options = $options;
        $this->labelName = $labelName;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form.radio');
    }
}
