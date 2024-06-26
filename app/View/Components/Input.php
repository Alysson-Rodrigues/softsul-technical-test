<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Input extends Component
{
    public $type;
    public $class;

    /**
     * Create a new component instance.
     *
     * @param string $type
     * @param string $class
     * @return void
     */
    public function __construct($type = 'text', $class = '')
    {
        $this->type = $type;
        $this->class = $class;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.input');
    }
}
