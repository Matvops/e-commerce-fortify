<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class toast extends Component
{
    public $status;
    public $message;
    /**
     * Create a new component instance.
     */
    public function __construct(bool $status, string $message) 
    {
        $this->status = $status;
        $this->message = $message;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.toast');
    }
}
