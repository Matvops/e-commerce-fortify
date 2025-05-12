<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class headerSection extends Component
{

    public $text;
    public $type;
    /**
     * Create a new component instance.
     */
    public function __construct(string $text, string $type)
    {
        $text = $text;
        $type = $type;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.header-section');
    }
}
