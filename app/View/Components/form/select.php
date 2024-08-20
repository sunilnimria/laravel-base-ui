<?php

namespace App\View\Components\form;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class select extends Component
{
    public $labelFor , $labelName, $desc, $options;
    /**
     * Create a new component instance.
     */
    public function __construct( $labelFor=false, $labelName=false , $desc=false, $options )
    {
        $this->labelFor = $labelFor;
        $this->labelName = $labelName;
        $this->desc = $desc;
        $this->options = $options;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form.select');
    }
}
/* Sample Blade.php Code
    @php
        $data = [];
        foreach ($roles as $role) {
            $selected = false;
            foreach ($admin->roles as $key) {
                if ($key->name === $role->name) {
                    $selected = true;
                }
            }
            $data[] = [
                'value' => $role->name,
                'label' => $role->name,
                'selected' => $selected,
            ];
        }
    @endphp
    <x-form.select id="roles" name="roles[]" class="" multiple labelFor="roles"
        labelName="Assign Roles" :options="$data"
        desc="Select roles that you wants to give this user." />

*/
