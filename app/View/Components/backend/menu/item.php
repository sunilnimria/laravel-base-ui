<?php

namespace App\View\Components\backend\menu;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class item extends Component
{
    public $title, $icon, $link, $successCount, $unsuccessCount;
    /**
     * Create a new component instance.
     */
    public function __construct($title = "Title", $icon = false, $link = "#", $successCount = false, $unsuccessCount = false)
    {
        $this->title = $title;
        $this->icon = $icon;
        $this->link = $link;
        $this->successCount = $successCount;
        $this->unsuccessCount = $unsuccessCount;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.backend.menu.item');
    }
}
