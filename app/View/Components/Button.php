<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Button extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $variant,
    ) {}
 

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): Closure
{
    return function (array $data) {
        return view('components.button', $data);
    };
}
}
